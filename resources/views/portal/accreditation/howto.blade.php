@extends('layouts.portal')

@section('title', 'How to Get Accredited')
@section('page_title', 'HOW TO GET ACCREDITED')

@section('content')
<div id="how-to-page">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark m-0" style="font-size:18px;">How to Get Accredited</h4>
    <a class="btn btn-primary" href="{{ route('accreditation.new') }}">
      <i class="ri-file-add-line me-2"></i>Start Application Now
    </a>
  </div>

  <div class="form-container">
    <div class="form-header">
      <h5 class="m-0"><i class="ri-guide-line me-2"></i>Accreditation Process Guide</h5>
    </div>

    <div class="form-steps-container">
      <div class="guide-step">
        <div class="step-number-large">1</div>
        <div>
          <h5>Choose Application Type</h5>
          <p class="text-muted mb-2">Local or Foreign journalist.</p>
        </div>
      </div>

      <div class="guide-step">
        <div class="step-number-large">2</div>
        <div>
          <h5>Prepare Documents</h5>
          <p class="text-muted mb-2">ID/Passport, passport photo, employer letter, qualifications.</p>
        </div>
      </div>

      <div class="guide-step">
        <div class="step-number-large">3</div>
        <div>
          <h5>Submit AP3 / AP5</h5>
          <p class="text-muted mb-2">Fill in all required fields accurately.</p>
        </div>
      </div>

      <div class="guide-step">
        <div class="step-number-large">4</div>
        <div>
          <h5>Pay and Track</h5>
          <p class="text-muted mb-2">After review, you’ll receive payment instructions and can track status on Home.</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
