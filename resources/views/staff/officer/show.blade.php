@extends('layouts.portal')
@section('title', 'Application Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-dark">
    <i class="ri-arrow-left-line me-1"></i> Back
  </a>
  <div>
    <h4 class="fw-bold mb-1">{{ $application->reference }}</h4>
    <div class="text-muted">
      {{ $application->application_type }} • {{ $application->request_type }} • {{ $application->journalist_scope ?? '—' }}
    </div>
  </div>
  <div class="d-flex align-items-center gap-2">
    <form action="{{ route('staff.officer.applications.unlock', $application) }}" method="POST" class="d-inline">
       @csrf
       <button class="btn btn-sm btn-outline-warning">
         <i class="ri-lock-unlock-line me-1"></i> Release & Back
       </button>
    </form>
    <a href="{{ route('staff.officer.dashboard') }}" class="btn btn-secondary d-none d-md-inline">Dashboard</a>
  </div>
</div>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row g-3">
  <div class="col-md-7">
    <div class="card">
      <div class="card-header fw-bold">Applicant</div>
      <div class="card-body">
        <div class="d-flex align-items-center gap-3">
          @php
            $passportPhoto = $application->documents->where('doc_type', 'passport_photo')->first();
          @endphp
          @if($passportPhoto)
            <div class="border rounded p-1 bg-light">
              <img src="{{ $passportPhoto->url }}" alt="Passport Photo" style="width: 100px; height: 120px; object-fit: cover;">
            </div>
          @endif
          <div>
            <div><b>Name:</b> {{ $application->applicant?->name ?? '—' }}</div>
            <div><b>Email:</b> {{ $application->applicant?->email ?? '—' }}</div>
            <div><b>Region for collection:</b> {{ $application->collection_region }}</div>
            <div class="mt-2">
              <b>Status:</b> <span class="badge bg-info">{{ str_replace('_',' ', $application->status) }}</span>
            </div>
          </div>
        </div>
        @if($application->decision_notes)
          <div class="mt-3">
            <b>Notes:</b>
            <div class="border rounded p-2 mt-1">{{ $application->decision_notes }}</div>
          </div>
        @endif
      </div>
    </div>

    <div class="card mt-3">
      <div class="card mt-3">
      <div class="card-header fw-bold">Documents</div>
      <div class="card-body">
        @if($application->documents && $application->documents->count())
          <div class="list-group">
            @foreach($application->documents as $doc)
              <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                 href="{{ $doc->url }}" target="_blank" rel="noopener">
                <div>
                  <div class="fw-semibold">{{ $doc->original_name ?? $doc->doc_type }}</div>
                  <div class="small text-muted">{{ strtoupper($doc->doc_type) }} • Uploaded {{ $doc->created_at?->format('Y-m-d H:i') }}</div>
                </div>
                <span class="badge bg-success-subtle text-success border border-success">View</span>
              </a>
            @endforeach
          </div>
        @else
          <div class="text-muted">No documents uploaded yet.</div>
        @endif
      </div>
    </div>
  </div>

  <div class="col-md-5">
    <div class="card">
      <div class="card-header fw-bold">Actions</div>
      <div class="card-body">

        @if(in_array($application->status, ['submitted','needs_correction','returned_from_payments','returned_from_registrar']))
          <form method="POST" action="{{ route('staff.officer.applications.approve', $application) }}" class="mb-3">
            @csrf
            @php
              $isRegistration = ($application->application_type ?? '') === 'registration';
              $cats = $isRegistration ? \App\Models\Application::massMediaCategories() : \App\Models\Application::accreditationCategories();
              $label = $isRegistration ? 'Mass Media Category' : 'Accreditation Category';
            @endphp

            <label class="form-label fw-semibold">{{ $label }} (required)</label>
            <select class="form-select mb-2" name="category_code" required>
              <option value="">-- Select category --</option>
              @foreach($cats as $code => $name)
                <option value="{{ $code }}" @selected(($isRegistration ? $application->media_house_category_code : $application->accreditation_category_code) === $code)>{{ $code }} - {{ $name }}</option>
              @endforeach
            </select>

            <label class="form-label fw-semibold">Approve notes (optional)</label>
            <textarea class="form-control mb-2" name="decision_notes" rows="3"></textarea>
            <button class="btn btn-success w-100">Approve & Send to Registrar</button>
          </form>

          <form method="POST" action="{{ route('staff.officer.applications.requestCorrection', $application) }}" class="mb-3">
            @csrf
            <label class="form-label fw-semibold">Request correction (required)</label>
            <textarea class="form-control mb-2" name="notes" rows="3" required></textarea>
            <button class="btn btn-warning w-100">Request Correction</button>
          </form>
        @else
          <div class="alert alert-light border">No actions available for this status.</div>
        @endif

        <hr>

        <form method="POST" action="{{ route('staff.officer.applications.message', $application) }}">
          @csrf
          <label class="form-label fw-semibold">Message applicant</label>
          <textarea class="form-control mb-2" name="message" rows="3" required></textarea>
          <button class="btn btn-primary w-100">Send Message</button>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
