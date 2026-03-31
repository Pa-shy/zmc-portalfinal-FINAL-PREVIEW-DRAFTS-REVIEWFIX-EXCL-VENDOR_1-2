@extends('layouts.portal')

@section('title', 'Payment History')
@section('page_title', 'PAYMENT HISTORY')

@section('content')
<div id="payment-history-page">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark m-0" style="font-size:18px;">Payment History</h4>
    <button class="btn btn-primary" onclick="alert('Demo: Export to PDF/CSV')">
      <i class="ri-download-line me-2"></i>Export Records
    </button>
  </div>

  <div class="form-container">
    <div class="form-header" style="background: transparent !important; border-bottom: 2px solid #e5e7eb !important;">
      <h5 class="m-0" style="color: #1f2937 !important;"><i class="ri-bank-card-line me-2"></i>Transaction History</h5>
    </div>

    <div class="form-steps-container">
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>Invoice #</th>
              <th>Date</th>
              <th>Description</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Receipt</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>INV-2023-045</td>
              <td>15 Nov 2023</td>
              <td>New Accreditation Fee</td>
              <td>USD 50.00</td>
              <td><span class="badge bg-success">Paid</span></td>
              <td><button class="btn btn-sm btn-primary" onclick="alert('Demo: Download receipt')">Download</button></td>
            </tr>
            <tr>
              <td>INV-2023-128</td>
              <td>10 Dec 2023</td>
              <td>Renewal Fee</td>
              <td>USD 75.00</td>
              <td><span class="badge bg-warning">Pending</span></td>
              <td><button class="btn btn-sm btn-primary" disabled>Download</button></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="alert alert-info mt-3">
        <i class="ri-information-line me-2"></i>
        In production: invoice status, PayNow reference, receipts, and waivers will display here.
      </div>
    </div>
  </div>
</div>
@endsection
