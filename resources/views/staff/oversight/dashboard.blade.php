@extends('layouts.portal')
@section('title', 'Oversight Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <div>
    <h4 class="fw-bold m-0">Oversight</h4>
    <div class="text-muted small">Read-only visibility across the entire process. Search + filters + view logs.</div>
  </div>
</div>

<div class="card mb-3">
  <div class="card-body">
    <form class="row g-2" method="GET">
      <div class="col-md-3">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Search ref / name">
      </div>
      <div class="col-md-3">
        <select name="status" class="form-select">
          <option value="">All statuses</option>
          @foreach($statuses as $s)
            <option value="{{ $s }}" @selected(request('status')===$s)>{{ str_replace('_',' ', $s) }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-3">
        <select name="region" class="form-select">
          <option value="">All regions</option>
          @foreach($regions as $r)
            <option value="{{ $r }}" @selected(request('region')===$r)>{{ $r }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-3 d-grid">
        <button class="btn btn-dark" type="submit">Filter</button>
      </div>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header fw-bold">All Applications (Read-only)</div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Reference</th>
            <th>Applicant</th>
            <th>Type</th>
            <th>Status</th>
            <th>Region</th>
            <th>Last Action</th>
            <th class="text-end">View</th>
          </tr>
        </thead>
        <tbody>
        @forelse($applications as $i => $app)
          <tr>
            <td>{{ $applications->firstItem() + $i }}</td>
            <td class="fw-semibold">{{ $app->reference }}</td>
            <td>{{ $app->applicant?->name ?? '—' }}</td>
            <td class="text-capitalize">{{ $app->application_type }}</td>
            <td><span class="badge bg-info">{{ str_replace('_',' ', $app->status) }}</span></td>
            <td class="text-capitalize">{{ $app->collection_region ?? '—' }}</td>
            <td class="small text-muted">
              {{ $app->last_action_at ? $app->last_action_at->format('d M Y H:i') : '—' }}
            </td>
            <td class="text-end">
              <a href="{{ route('staff.oversight.applications.show', $app) }}" class="btn btn-sm btn-primary">View</a>
            </td>
          </tr>
        @empty
          <tr><td colspan="8" class="text-center py-4 text-muted">No records found.</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="mt-3">
  {{ $applications->links() }}
</div>
@endsection
