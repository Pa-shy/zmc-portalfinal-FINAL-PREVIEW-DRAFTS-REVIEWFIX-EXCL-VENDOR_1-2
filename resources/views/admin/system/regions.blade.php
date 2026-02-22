@extends('layouts.portal')

@section('title', 'Regions & Offices')

@section('content')
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Regions & Offices</h4>
      <div class="text-muted mt-1" style="font-size:13px;">Catalogue of offices used for assignments and reporting.</div>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-secondary"><i class="ri-arrow-left-line me-1"></i>Back</a>
  </div>

  <div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0">
      <div class="fw-semibold">Regional Offices</div>
      <div class="text-muted" style="font-size:12px;">We can wire this to a database table (regional_offices) when you're ready.</div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-sm align-middle">
          <thead>
            <tr>
              <th>Office</th>
              <th>Code</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($offices as $o)
              <tr>
                <td class="fw-semibold">{{ $o['name'] }}</td>
                <td><span class="badge bg-secondary">{{ $o['code'] }}</span></td>
                <td><span class="badge {{ $o['status']==='Active' ? 'bg-success' : 'bg-warning text-dark' }}">{{ $o['status'] }}</span></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="alert alert-info mt-3 mb-0" style="font-size:13px;">
        If you want, we can add: assigned officers per office, office schedules, and regional performance KPIs.
      </div>
    </div>
  </div>
</div>
@endsection
