@extends('layouts.portal')

@section('title', $title)

@section('content')
@php
  $status = request('status');
  $statusList = [
    'draft','submitted','officer_review','officer_approved','correction_requested','officer_rejected',
    'registrar_review','registrar_approved','registrar_rejected','accounts_review','paid_confirmed',
    'production_queue','card_generated','certificate_generated','printed','issued'
  ];
@endphp

<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">{{ $title }}</h4>
      <div class="text-muted mt-1" style="font-size:13px;">Read-only oversight list. Processing is done by staff roles.</div>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-dark">
      <i class="ri-arrow-left-line me-1"></i> Back
    </a>
  </div>

  <div class="card border-0 shadow-sm mb-3">
    <div class="card-body d-flex flex-wrap gap-2 align-items-center justify-content-between">
      <form class="d-flex gap-2 flex-wrap align-items-center" method="GET">
        <div class="fw-bold me-2">Filter</div>
        <select name="status" class="form-select form-select-sm" style="width:220px;">
          <option value="">All statuses</option>
          @foreach($statusList as $s)
            <option value="{{ $s }}" @selected($status === $s)>{{ ucwords(str_replace('_',' ', $s)) }}</option>
          @endforeach
        </select>
        <button class="btn btn-sm btn-primary" type="submit"><i class="ri-filter-3-line me-1"></i>Apply</button>
        <a class="btn btn-sm btn-outline-secondary" href="{{ request()->url() }}">Reset</a>
      </form>
      <div class="text-muted small">Showing {{ $applications->firstItem() ?? 0 }}-{{ $applications->lastItem() ?? 0 }} of {{ $applications->total() }}</div>
    </div>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead class="bg-light">
            <tr>
              <th class="border-0 ps-4">Reference</th>
              <th class="border-0">Applicant</th>
              <th class="border-0">Status</th>
              <th class="border-0">Submitted</th>
              <th class="border-0 text-end pe-4">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($applications as $app)
              <tr>
                <td class="ps-4 fw-semibold">{{ $app->reference ?? 'N/A' }}</td>
                <td>
                  <div class="fw-semibold">{{ $app->applicant?->name ?? 'Applicant' }}</div>
                  <div class="text-muted small">{{ $app->applicant?->email }}</div>
                </td>
                <td>
                  <span class="badge bg-secondary">{{ ucwords(str_replace('_',' ', $app->status ?? 'unknown')) }}</span>
                </td>
                <td class="text-muted">{{ $app->submitted_at?->diffForHumans() ?? $app->created_at?->diffForHumans() }}</td>
                <td class="text-end pe-4">
                  <a href="{{ route('admin.applications.show', $app) }}" class="btn btn-sm btn-outline-primary">
                    <i class="ri-eye-line"></i>
                  </a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center py-4 text-muted">No applications found.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="mt-3">
    {{ $applications->links() }}
  </div>
</div>
@endsection
