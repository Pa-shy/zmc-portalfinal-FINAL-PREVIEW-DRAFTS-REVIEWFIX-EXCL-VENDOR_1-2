@extends('layouts.portal')
@section('title', 'Production Queue')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="fw-bold mb-0">Production Queue</h4>
  <a href="{{ route('staff.officer.dashboard') }}" class="btn btn-secondary btn-sm">Back to Dashboard</a>
</div>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
  <div class="card-header fw-bold">Payment Verified — Ready for Production</div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="bg-light">
          <tr>
            <th>#</th>
            <th>Reference</th>
            <th>Applicant</th>
            <th>Type</th>
            <th>Request</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          @forelse($applications as $i => $app)
            @php
              $rowNo = $applications->firstItem() + $i;
              $requestBadge = match($app->request_type) {
                'renewal' => 'warning',
                'replacement' => 'info',
                default => 'success',
              };
            @endphp
            <tr>
              <td class="text-muted small">{{ $rowNo }}</td>
              <td class="fw-bold">{{ $app->reference }}</td>
              <td>{{ $app->applicant?->name ?? '—' }}</td>
              <td class="text-capitalize">{{ $app->application_type ?? '—' }}</td>
              <td>
                <span class="badge bg-{{ $requestBadge }}">{{ ucfirst($app->request_type ?? 'new') }}</span>
              </td>
              <td><span class="badge bg-info">{{ ucwords(str_replace('_', ' ', $app->status)) }}</span></td>
              <td class="small">{{ optional($app->created_at)->format('d M Y') }}</td>
            </tr>
          @empty
            <tr><td colspan="7" class="text-center py-4 text-muted">No applications in the production queue.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@if(method_exists($applications, 'links'))
  <div class="mt-3">{{ $applications->links() }}</div>
@endif
@endsection
