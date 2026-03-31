@extends('layouts.portal')
@section('title', $title ?? 'Applications')

@section('content')
<div class="zmc-dashboard-wrapper" style="font-family: var(--font-primary); color: var(--zmc-text-dark);">

  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size: var(--font-size-2xl); color: var(--zmc-text-dark);">{{ $title ?? 'Applications' }}</h4>
      <div class="text-muted mt-1" style="font-size: var(--font-size-base);">
        <i class="ri-information-line me-1"></i>
        Use this list to open an application and approve / reject / return it as needed.
      </div>
    </div>

    <div class="d-flex align-items-center gap-2">
      <a href="{{ route('staff.registrar.dashboard') }}" class="btn btn-white border shadow-sm btn-sm px-3">
        <i class="ri-arrow-left-line me-1"></i> Back
      </a>
    </div>
  </div>

  <div class="zmc-card p-0 shadow-sm border-0">
    <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
      <h6 class="fw-bold m-0">
        <i class="ri-list-check-2 me-2" style="color:var(--zmc-accent)"></i>
        {{ $title ?? 'Applications' }}
      </h6>
      @if(method_exists($applications, 'currentPage'))
        <div class="small text-muted">Page {{ $applications->currentPage() }} of {{ $applications->lastPage() }}</div>
      @endif
    </div>

    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0 zmc-mini-table">
        <thead>
          <tr>
            <th style="width:60px;">#</th>
            <th>Ref</th>
            <th>Applicant</th>
            <th>Type</th>
            <th>Date</th>
            <th>Status</th>
            <th class="text-end" style="min-width:130px;">Action</th>
          </tr>
        </thead>
        <tbody>
        @forelse($applications as $i => $app)
          @php
            $status = strtolower((string)($app->status ?? ''));
            $badge = match($status) {
              'registrar_rejected' => 'danger',
              'registrar_approved' => 'success',
              'returned_to_accounts' => 'secondary',
              'accounts_review' => 'warning',
              default => 'info',
            };
            $rowNo = method_exists($applications,'firstItem') && $applications->firstItem()
              ? ($applications->firstItem() + $i)
              : ($i + 1);
            $ref = $app->reference ?? ('APP-' . str_pad((int)$app->id, 5, '0', STR_PAD_LEFT));
            $type = $app->application_type ?? '—';
          @endphp
          <tr>
            <td class="text-muted small">{{ $rowNo }}</td>
            <td class="fw-bold text-dark">{{ $ref }}</td>
            <td>{{ $app->applicant?->name ?? '—' }}</td>
            <td><span class="small fw-bold text-uppercase">{{ $type }}</span></td>
            <td class="small">{{ !empty($app->created_at) ? \Carbon\Carbon::parse($app->created_at)->format('d M Y') : '—' }}</td>
            <td>
              <span class="badge rounded-pill bg-{{ $badge }} px-3">
                {{ ucwords(str_replace('_',' ', $status ?: '—')) }}
              </span>
            </td>
            <td class="text-end">
              <a class="btn btn-sm btn-outline-primary" href="{{ route('staff.registrar.applications.show', $app) }}">
                <i class="fa-regular fa-eye me-1"></i> Open
              </a>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" class="text-center text-muted py-4">No records found.</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>

    @if(method_exists($applications, 'links'))
      <div class="p-3 border-top">
        {{ $applications->links() }}
      </div>
    @endif
  </div>

</div>
@endsection
