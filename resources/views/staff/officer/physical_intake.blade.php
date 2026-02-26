@extends('layouts.portal')
@section('title', 'Physical Intake')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="fw-bold mb-0">Physical / Walk-in Intake</h4>
  <a href="{{ route('staff.officer.dashboard') }}" class="btn btn-secondary btn-sm">Back to Dashboard</a>
</div>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="card">
  <div class="card-header fw-bold">Record Physical Intake</div>
  <div class="card-body">
    <form method="POST" action="{{ route('staff.officer.physical-intake.process') }}">
      @csrf

      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">Application Type <span class="text-danger">*</span></label>
          <select name="application_type" class="form-select" required>
            <option value="">-- Select --</option>
            <option value="accreditation" @selected(old('application_type') === 'accreditation')>Accreditation (Journalist)</option>
            <option value="registration" @selected(old('application_type') === 'registration')>Registration (Media House)</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Request Type <span class="text-danger">*</span></label>
          <select name="request_type" class="form-select" required>
            <option value="">-- Select --</option>
            <option value="new" @selected(old('request_type') === 'new')>New</option>
            <option value="renewal" @selected(old('request_type') === 'renewal')>Renewal</option>
            <option value="replacement" @selected(old('request_type') === 'replacement')>Replacement</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Accreditation / Registration Number <span class="text-danger">*</span></label>
          <input type="text" name="lookup_number" class="form-control" value="{{ old('lookup_number') }}" required placeholder="e.g. J12345678E or MC00001234">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Receipt Number <span class="text-danger">*</span></label>
          <input type="text" name="receipt_number" class="form-control" value="{{ old('receipt_number') }}" required placeholder="Enter receipt number">
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Applicant Name</label>
          <input type="text" name="applicant_name" class="form-control" value="{{ old('applicant_name') }}" placeholder="Full name (optional)">
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Notes</label>
          <textarea name="notes" class="form-control" rows="3" placeholder="Any additional notes...">{{ old('notes') }}</textarea>
        </div>
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-primary">
          <i class="ri-check-line me-1"></i> Record & Add to Production Queue
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
