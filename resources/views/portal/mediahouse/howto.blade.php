@extends('layouts.portal')

@section('title', 'How to Get Registered')

@section('content')

<div id="how-to-page">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark m-0" style="font-size:18px;">How to Get Registered</h4>

    <a href="{{ route('mediahouse.new') }}" class="btn btn-primary">
      <i class="ri-file-add-line me-2"></i>Start AP1 Now
    </a>
  </div>

  <div class="form-container">
    <div class="form-header">
      <h5 class="m-0">
        <i class="ri-guide-line me-2"></i>Registration Process Guide
      </h5>
    </div>

    <div class="form-steps-container">
      <div class="mb-4">
        <h6 class="fw-bold mb-3" style="color:var(--sidebar); border-bottom: 2px solid var(--zmc-accent); display:inline-block; padding-bottom:5px;">
          Requirements for Registration (AP1)
        </h6>
        <div class="row g-3">
          <div class="col-12 col-md-6">
            <ul class="list-group list-group-flush small">
              <li class="list-group-item d-flex align-items-center gap-2"><i class="ri-checkbox-circle-line text-success"></i> 1. Projected cash flow statement for three years.</li>
              <li class="list-group-item d-flex align-items-center gap-2"><i class="ri-checkbox-circle-line text-success"></i> 2. Projected balance sheet for three years.</li>
              <li class="list-group-item d-flex align-items-center gap-2"><i class="ri-checkbox-circle-line text-success"></i> 3. Editorial charter.</li>
              <li class="list-group-item d-flex align-items-center gap-2"><i class="ri-checkbox-circle-line text-success"></i> 4. Code of ethics.</li>
              <li class="list-group-item d-flex align-items-center gap-2"><i class="ri-checkbox-circle-line text-success"></i> 5. Code of conduct for employees.</li>
              <li class="list-group-item d-flex align-items-center gap-2"><i class="ri-checkbox-circle-line text-success"></i> 6. Market analysis.</li>
            </ul>
          </div>
          <div class="col-12 col-md-6">
            <ul class="list-group list-group-flush small">
              <li class="list-group-item d-flex align-items-center gap-2"><i class="ri-checkbox-circle-line text-success"></i> 7. Certified I.Ds for directors.</li>
              <li class="list-group-item d-flex align-items-center gap-2"><i class="ri-checkbox-circle-line text-success"></i> 8. In-house style book.</li>
              <li class="list-group-item d-flex align-items-center gap-2"><i class="ri-checkbox-circle-line text-success"></i> 9. Attach dummy (copy of publication).</li>
              <li class="list-group-item d-flex align-items-center gap-2"><i class="ri-checkbox-circle-line text-success"></i> 10. Attach mission statement.</li>
              <li class="list-group-item d-flex align-items-center gap-2"><i class="ri-checkbox-circle-line text-success"></i> 11. Attach certificate of incorporation.</li>
              <li class="list-group-item d-flex align-items-center gap-2"><i class="ri-checkbox-circle-line text-success"></i> 12. Attach memorandum of association.</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="alert alert-warning border-0 shadow-sm mb-4" style="border-radius:12px;">
        <h6 class="fw-bold"><i class="ri-money-dollar-circle-line me-2"></i>Application & Registration Fees</h6>
        <p class="small mb-2">Fees are as per <strong>Statutory Instrument 65 of 2022</strong>.</p>
        <p class="small mb-0 fw-bold"><i class="ri-error-warning-line me-1"></i>NB: Fees are also payable in local currency at the prevailing official bank rate of the day of payment.</p>
      </div>

      <div class="zmc-card bg-light border-0" style="border-radius:12px;">
        <h6 class="fw-bold mb-3"><i class="ri-customer-service-2-line me-2"></i>For Further Information or Enquiries</h6>
        <div class="row g-3 small">
          <div class="col-12 col-md-4">
            <div class="fw-bold text-muted mb-1">WhatsApp Hotline</div>
            <div class="text-dark"><i class="ri-whatsapp-line me-1 text-success"></i> +263 719 299 150</div>
          </div>
          <div class="col-12 col-md-4">
            <div class="fw-bold text-muted mb-1">Email Support</div>
            <div class="text-dark">
              <i class="ri-mail-line me-1"></i> info@zmc.org.zw<br>
              <i class="ri-mail-line me-1"></i> zmcaccreditation@gmail.com
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="fw-bold text-muted mb-1">Telephone</div>
            <div class="text-dark">
              <i class="ri-phone-line me-1"></i> +263 242253509/10<br>
              <i class="ri-phone-line me-1"></i> +263 242253572/75/76
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
