@extends('layouts.portal')

@section('title', 'Payment History')
@section('page_title', 'PAYMENT HISTORY')

@section('content')
<div id="payment-history-page">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark m-0" style="font-size:18px;">Payment History</h4>
  </div>

  <div class="form-container">
    <div class="form-header" style="background: transparent !important; border-bottom: 2px solid #e5e7eb !important;">
      <h5 class="m-0" style="color: #1f2937 !important;"><i class="ri-bank-card-line me-2"></i>Transaction History</h5>
    </div>

    <div class="form-steps-container">
      @if(isset($payments) && $payments->count() > 0)
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              <th>Receipt #</th>
              <th>Date</th>
              <th>Description</th>
              <th>Method</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Receipt</th>
            </tr>
          </thead>
          <tbody>
            @foreach($payments as $payment)
            <tr>
              <td>
                <span class="fw-bold" style="font-size:12px;">{{ $payment->receipt_number ?? '—' }}</span>
              </td>
              <td>{{ $payment->confirmed_at ? $payment->confirmed_at->format('d M Y') : $payment->created_at->format('d M Y') }}</td>
              <td>
                {{ ucfirst($payment->service_type ?? 'Application') }} Fee
                @if($payment->application)
                  <div class="text-muted small">{{ $payment->application->reference ?? '' }}</div>
                @endif
              </td>
              <td>
                @php
                  $methodLabels = [
                    'paynow_reference' => 'PayNow',
                    'paynow' => 'PayNow',
                    'proof' => 'Proof of Payment',
                    'proof_upload' => 'Proof of Payment',
                    'waiver' => 'Waiver',
                    'cash' => 'Cash',
                    'transfer' => 'Bank Transfer',
                    'general' => 'Other',
                  ];
                @endphp
                <span class="badge bg-light text-dark border">{{ $methodLabels[$payment->method] ?? ucfirst($payment->method ?? 'N/A') }}</span>
              </td>
              <td class="fw-bold">{{ $payment->currency ?? 'USD' }} {{ number_format($payment->amount, 2) }}</td>
              <td>
                @if($payment->status === 'paid')
                  <span class="badge bg-success">Confirmed</span>
                @elseif($payment->status === 'pending')
                  <span class="badge bg-warning text-dark">Pending</span>
                @elseif($payment->status === 'rejected')
                  <span class="badge bg-danger">Rejected</span>
                @else
                  <span class="badge bg-secondary">{{ ucfirst($payment->status) }}</span>
                @endif
              </td>
              <td>
                @if($payment->status === 'paid' && $payment->receipt_number)
                  <a href="{{ route('portal.receipt.download', $payment->id) }}"
                     class="btn btn-sm btn-primary portal-link" target="_blank">
                    <i class="ri-download-line me-1"></i>Download
                  </a>
                @else
                  <button class="btn btn-sm btn-primary" disabled>Download</button>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @else
      <div class="text-center py-5">
        <i class="ri-bank-card-line" style="font-size:48px; color:#d1d5db;"></i>
        <div class="text-muted mt-3">No payment records found.</div>
        <div class="text-muted small">Payment records will appear here once you make a payment for your application.</div>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection
