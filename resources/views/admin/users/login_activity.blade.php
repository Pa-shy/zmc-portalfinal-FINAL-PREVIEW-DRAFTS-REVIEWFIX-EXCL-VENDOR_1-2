@extends('layouts.portal')

@section('title', 'Login Activity')

@section('content')
<div class="container-fluid py-3">
  <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold mb-0">Login Activity</h4>
      <div class="text-muted" style="font-size:13px;">Failed logins and last active sessions (from audit logs).</div>
    </div>
    <form class="d-flex gap-2" method="GET" action="{{ route('admin.users.login_activity') }}">
      <input class="form-control form-control-sm" name="q" value="{{ $q }}" placeholder="Search (email, IP, etc.)" style="width:260px;"/>
      <button class="btn btn-sm btn-primary">Search</button>
    </form>
  </div>

  <div class="row g-3">
    <div class="col-lg-6">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-semibold">Failed logins</div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-sm mb-0">
              <thead class="table-light">
                <tr>
                  <th>Date</th>
                  <th>IP</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>
                @forelse($failedLogins as $l)
                  <tr>
                    <td class="text-nowrap">{{ $l->created_at?->format('Y-m-d H:i') }}</td>
                    <td class="text-nowrap">{{ $l->ip }}</td>
                    <td style="font-size:12px;">{{ is_array($l->meta) ? json_encode($l->meta) : $l->meta }}</td>
                  </tr>
                @empty
                  <tr><td colspan="3" class="text-center text-muted py-3">No failed logins found.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer bg-white">{{ $failedLogins->links() }}</div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-semibold">Latest successful logins</div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-sm mb-0">
              <thead class="table-light">
                <tr>
                  <th>Date</th>
                  <th>Actor</th>
                  <th>IP</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse($lastLogins as $l)
                  <tr>
                    <td class="text-nowrap">{{ $l->created_at?->format('Y-m-d H:i') }}</td>
                    <td class="text-nowrap">{{ $l->actor_user_id ? ('#'.$l->actor_user_id) : '—' }}</td>
                    <td class="text-nowrap">{{ $l->ip }}</td>
                    <td class="text-nowrap">{{ $l->action }}</td>
                  </tr>
                @empty
                  <tr><td colspan="4" class="text-center text-muted py-3">No login activity found.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer bg-white">{{ $lastLogins->links() }}</div>
      </div>

      <div class="card border-0 shadow-sm mt-3">
        <div class="card-header bg-white fw-semibold">Last active sessions (approx.)</div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-sm mb-0">
              <thead class="table-light"><tr><th>User</th><th>Last seen</th></tr></thead>
              <tbody>
                @forelse($lastActive as $row)
                  <tr>
                    <td>{{ $row['user']?->name ?? ('User #'.($row['user']?->id ?? '')) }}</td>
                    <td class="text-nowrap">{{ \Carbon\Carbon::parse($row['last_seen'])->format('Y-m-d H:i') }}</td>
                  </tr>
                @empty
                  <tr><td colspan="2" class="text-center text-muted py-3">No recent activity.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
