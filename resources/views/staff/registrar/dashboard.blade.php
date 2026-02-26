@extends('layouts.portal')
@section('title', 'Registrar Dashboard')

@section('content')
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">

  {{-- Header --}}
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">
        Registrar Dashboard
      </h4>
      <div class="text-muted mt-1" style="font-size:13px;">
        <i class="ri-information-line me-1"></i>
        Approve / reject applications from Accounts. Approved items are pushed to <b>Production</b>.
      </div>
    </div>

    <div class="d-flex align-items-center gap-2">
      <a href="{{ route('staff.registrar.accounts-oversight') }}" class="btn btn-outline-secondary btn-sm" title="Accounts Oversight">
        <i class="ri-eye-line me-1"></i> Accounts Oversight
      </a>
      <a href="{{ route('staff.registrar.reminders.index') }}" class="btn btn-outline-info btn-sm" title="Reminders">
        <i class="ri-alarm-line me-1"></i> Reminders
      </a>
      <a href="{{ route('staff.registrar.notices-events') }}" class="btn btn-outline-primary btn-sm" title="Notices & Events">
        <i class="ri-notification-line me-1"></i> Notices & Events
      </a>
      <a href="{{ route('staff.registrar.news') }}" class="btn btn-outline-primary btn-sm" title="News & Press Statements">
        <i class="ri-newspaper-line me-1"></i> News
      </a>
      <span class="zmc-pill zmc-pill-dark">
        <i class="ri-map-pin-user-line"></i>
        <span>Region: {{ auth()->user()->region ?? 'NOT SET' }}</span>
      </span>
      <a href="{{ url()->current() }}" class="btn btn-white border shadow-sm btn-sm px-3" title="Refresh">
        <i class="ri-refresh-line me-1"></i> Refresh
      </a>
    </div>
  </div>

  @if(session('success'))
    <div class="alert alert-success d-flex align-items-start gap-2">
      <i class="ri-checkbox-circle-line" style="font-size:18px;line-height:1;"></i>
      <div>{{ session('success') }}</div>
    </div>
  @endif

  @php
    $k = $kpis ?? [
      'todays_applications' => 0,
      'pending_reviews' => 0,
      'renewals_due' => 0,
      'payments_pending' => 0,
    ];

    $detailsUrlTemplate = route('staff.applications.details', ['application' => '__ID__']);

    $returnUrl = fn($id) => route('staff.registrar.applications.return', $id);
    $approveUrl = fn($id) => route('staff.registrar.applications.approve', $id);
    $approveForPaymentUrl = fn($id) => route('staff.registrar.applications.approve-for-payment', $id);
    $rejectUrl = fn($id) => route('staff.registrar.applications.reject', $id);
@endphp

  {{-- KPIs --}}
  <div class="row g-3 mb-3">
    <div class="col-12 col-md-3">
      <div class="zmc-card h-100">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <div class="text-muted small fw-bold">Awaiting Registrar</div>
            <div class="h3 fw-black mb-0">{{ $k['awaiting_registrar'] ?? 0 }}</div>
          </div>
          <div class="icon-box text-primary"><i class="ri-folders-line"></i></div>
        </div>
        <div class="mt-2">
            <a href="{{ route('staff.registrar.incoming-queue') }}" class="btn btn-sm btn-outline-primary w-100">
                <i class="ri-eye-line me-1"></i> Open Queue
            </a>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-3">
      <div class="zmc-card h-100 border-success">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <div class="text-muted small fw-bold">Approved Today</div>
            <div class="h3 fw-black mb-0">{{ $k['approved_today'] ?? 0 }}</div>
          </div>
          <div class="icon-box text-success"><i class="ri-check-double-line"></i></div>
        </div>
        <div class="mt-2 small text-muted">Week: {{ $k['approved_this_week'] ?? 0 }}</div>
      </div>
    </div>

    <div class="col-12 col-md-3">
      <div class="zmc-card h-100 border-warning">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <div class="text-muted small fw-bold">Returned for Correction</div>
            <div class="h3 fw-black mb-0">{{ $k['returned_to_officer'] ?? 0 }}</div>
          </div>
          <div class="icon-box text-warning"><i class="ri-arrow-go-back-line"></i></div>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-3">
      <div class="zmc-card h-100">
        <div class="d-flex justify-content-between align-items-start">
          <div>
            <div class="text-muted small fw-bold">Category Mismatches</div>
            <div class="h3 fw-black mb-0">{{ $k['category_mismatches'] ?? 0 }}</div>
          </div>
          <div class="icon-box text-danger"><i class="ri-alert-line"></i></div>
        </div>
        <div class="mt-2 small text-muted">Found this week</div>
      </div>
    </div>
  </div>

  {{-- Second row of KPIs --}}
  <div class="row g-3 mb-4">
    <div class="col-12 col-md-3">
        <div class="zmc-card h-100 border-primary">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-muted small fw-bold">Awaiting Payment Approval</div>
                    <div class="h3 fw-black mb-0 text-primary">{{ $k['awaiting_payment_approval'] ?? 0 }}</div>
                </div>
                <div class="icon-box text-primary"><i class="ri-money-dollar-circle-line"></i></div>
            </div>
            <div class="mt-2 small text-muted">After officer approval</div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="zmc-card h-100 border-info">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-muted small fw-bold">Forwarded to Registrar</div>
                    <div class="h3 fw-black mb-0 text-info">{{ $k['forwarded_to_registrar'] ?? 0 }}</div>
                </div>
                <div class="icon-box text-info"><i class="ri-share-forward-line"></i></div>
            </div>
            <div class="mt-2 small text-muted">Waiver / special cases</div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="zmc-card h-100 border-warning">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-muted small fw-bold">Fix Requests</div>
                    <div class="h3 fw-black mb-0 text-warning">{{ $k['fix_requests'] ?? 0 }}</div>
                </div>
                <div class="icon-box text-warning"><i class="ri-tools-line"></i></div>
            </div>
            <div class="mt-2 small text-muted">Sent back to officer</div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="zmc-card h-100 border-danger">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-muted small fw-bold">Flagged Reprints</div>
                    <div class="h2 fw-black mb-0 text-danger">{{ $k['flagged_reprints'] ?? 0 }}</div>
                </div>
                <div class="icon-box text-danger"><i class="ri-error-warning-fill"></i></div>
            </div>
            <div class="mt-1 small text-muted">Prints > Threshold</div>
        </div>
    </div>
  </div>

  {{-- Third row of KPIs --}}
  <div class="row g-3 mb-4">
    <div class="col-12 col-md-3">
        <div class="zmc-card h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-muted small fw-bold">Certificates Generated</div>
                    <div class="h3 fw-black mb-0">{{ $k['certificates_generated_today'] ?? 0 }}</div>
                </div>
                <div class="icon-box text-info"><i class="ri-file-shield-line"></i></div>
            </div>
            <div class="mt-2 small text-muted">Today</div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="zmc-card h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-muted small fw-bold">Print Jobs Today</div>
                    <div class="h3 fw-black mb-0">{{ $k['prints_today'] ?? 0 }}</div>
                </div>
                <div class="icon-box text-primary"><i class="ri-printer-line"></i></div>
            </div>
        </div>
    </div>
  </div>

  {{-- Quick Filters --}}
  <div class="zmc-card mb-4 bg-light border-0">
    <form action="{{ url()->current() }}" method="GET" class="row g-2 align-items-end">
        <div class="col-md-2">
            <label class="small fw-bold text-muted">Type</label>
            <select name="type" class="form-select form-select-sm">
                <option value="">All Types</option>
                <option value="accreditation" {{ request('type') == 'accreditation' ? 'selected' : '' }}>Accreditation</option>
                <option value="registration" {{ request('type') == 'registration' ? 'selected' : '' }}>Registration</option>
            </select>
        </div>
        <div class="col-md-2">
            <label class="small fw-bold text-muted">Status</label>
            <select name="status" class="form-select form-select-sm">
                <option value="">All Statuses</option>
                <option value="paid_confirmed" {{ request('status') == 'paid_confirmed' ? 'selected' : '' }}>Paid Confirmed</option>
                <option value="registrar_review" {{ request('status') == 'registrar_review' ? 'selected' : '' }}>Registrar Review</option>
                <option value="approved_awaiting_payment" {{ request('status') == 'approved_awaiting_payment' ? 'selected' : '' }}>Awaiting Payment</option>
                <option value="forwarded_to_registrar" {{ request('status') == 'forwarded_to_registrar' ? 'selected' : '' }}>Forwarded to Registrar</option>
                <option value="registrar_fix_request" {{ request('status') == 'registrar_fix_request' ? 'selected' : '' }}>Fix Request</option>
                <option value="registrar_approved" {{ request('status') == 'registrar_approved' ? 'selected' : '' }}>Approved</option>
                <option value="returned_to_officer" {{ request('status') == 'returned_to_officer' ? 'selected' : '' }}>Returned to Officer</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="small fw-bold text-muted">Search</label>
            <input type="text" name="search" class="form-control form-control-sm" placeholder="Name, ID, Media House..." value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-dark btn-sm w-100">Filter</button>
        </div>
        <div class="col-md-1">
            <a href="{{ url()->current() }}" class="btn btn-outline-dark btn-sm w-100">Reset</a>
        </div>
    </form>
  </div>

  {{-- Activity feed --}}
  <div class="zmc-card mb-4">
    <div class="d-flex justify-content-between align-items-center mb-2">
      <div class="fw-bold"><i class="ri-pulse-line me-1"></i> Activity feed</div>
      <div class="small text-muted">Latest submissions / approvals</div>
    </div>
    <div class="table-responsive">
      <table class="table table-sm mb-0">
        <thead>
          <tr class="text-muted small">
            <th style="width:170px;">Time</th>
            <th style="width:180px;">Action</th>
            <th>Reference</th>
            <th style="width:160px;">From → To</th>
          </tr>
        </thead>
        <tbody>
        @forelse(($activity ?? []) as $log)
          @php
            $ref = null;
            try { $ref = optional($log->entity)->reference; } catch (\Throwable $e) {}
            $ref = $ref ?: ('APP-' . str_pad((int)($log->entity_id ?? 0), 5, '0', STR_PAD_LEFT));
          @endphp
          <tr>
            <td class="small text-muted">{{ \Carbon\Carbon::parse($log->created_at)->format('d M Y H:i') }}</td>
            <td class="small fw-bold">{{ str_replace('_',' ', (string)$log->action) }}</td>
            <td class="small">{{ $ref }}</td>
            <td class="small text-muted">{{ ($log->from_status ?? '—') }} → {{ ($log->to_status ?? '—') }}</td>
          </tr>
        @empty
          <tr><td colspan="4" class="text-muted small">No recent activity.</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>

  {{-- Table --}}
  <div class="zmc-card p-0 shadow-sm border-0">
    <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
      <h6 class="fw-bold m-0">
        <i class="ri-list-check-2 me-2" style="color:var(--zmc-accent)"></i> Registrar queue
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
            <th><i class="ri-hashtag me-1"></i> Ref</th>
            <th><i class="ri-user-line me-1"></i> Applicant</th>
            <th><i class="ri-file-text-line me-1"></i> Type</th>
            <th><i class="ri-calendar-line me-1"></i> Date</th>
            <th><i class="ri-flag-line me-1"></i> Status</th>
            <th class="text-end" style="min-width:210px;">Action</th>
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
              'forwarded_to_registrar' => 'warning',
              'approved_awaiting_payment' => 'primary',
              'registrar_fix_request' => 'dark',
              default => 'info',
            };

            $canDecide = in_array($status, ['registrar_review','paid_confirmed','accounts_review','returned_to_accounts','approved_awaiting_payment','forwarded_to_registrar'], true);
            $canApproveForPayment = $status === 'registrar_review' && $app->payment_status !== 'paid' && !$app->registrar_reviewed_at;
            $canFixRequest = in_array($status, ['registrar_review','approved_awaiting_payment','forwarded_to_registrar'], true);
            $canPushToAccounts = $status === 'forwarded_to_registrar';

            $rowNo = method_exists($applications,'firstItem') && $applications->firstItem()
              ? ($applications->firstItem() + $i)
              : ($i + 1);

            $ref = $app->reference ?? ('APP-' . str_pad((int)$app->id, 5, '0', STR_PAD_LEFT));
            $type = $app->application_type ?? '—';
            
            // Category variables for reassign modal
            $isRegistration = ($app->application_type ?? '') === 'registration';
            $cats = $isRegistration ? \App\Models\Application::massMediaCategories() : \App\Models\Application::accreditationCategories();
            $currentCat = $isRegistration ? $app->media_house_category_code : $app->accreditation_category_code;
          @endphp

          <tr>
            <td class="text-muted small">{{ $rowNo }}</td>
            <td class="fw-bold text-dark">{{ $ref }}</td>
            <td>{{ $app->applicant?->name ?? '—' }}</td>
            <td>
              <span class="small fw-bold text-uppercase">{{ $type }}</span>
              @php
                $reqType = $app->request_type ?? 'new';
                $reqBadge = match($reqType) { 'renewal' => 'warning', 'replacement' => 'info', default => 'success' };
              @endphp
              <span class="badge bg-{{ $reqBadge }} ms-1">{{ ucfirst($reqType) }}</span>
            </td>
            <td class="small">{{ !empty($app->created_at) ? \Carbon\Carbon::parse($app->created_at)->format('d M Y') : '—' }}</td>
            <td>
              <span class="badge rounded-pill bg-{{ $badge }} px-3">
                {{ ucwords(str_replace('_',' ', $status ?: '—')) }}
              </span>
            </td>

            <td class="text-end">
              <div class="zmc-action-strip">

                {{-- Reassign Category --}}
                <button
                  type="button"
                  class="btn btn-sm zmc-icon-btn btn-outline-warning js-open-modal"
                  data-target="#reassignModal{{ $app->id }}"
                  data-bs-toggle="tooltip" data-bs-placement="top"
                  title="Reassign Category"
                >
                  <i class="fa-solid fa-award"></i>
                </button>

                {{-- View --}}
                <button
                  type="button"
                  class="btn btn-sm zmc-icon-btn btn-outline-primary js-view-more"
                  data-app-id="{{ $app->id }}"
                  data-bs-toggle="tooltip" data-bs-placement="top"
                  title="View application"
                >
                  <i class="fa-regular fa-eye"></i>
                </button>

                {{-- Approve (dynamically opens appropriate modal) --}}
                <button
                  type="button"
                  class="btn btn-sm zmc-icon-btn btn-outline-success js-open-modal"
                  data-target="{{ $canApproveForPayment ? '#approveForPaymentModal' . $app->id : '#approveModal' . $app->id }}"
                  data-bs-toggle="tooltip" data-bs-placement="top"
                  title="{{ $canApproveForPayment ? 'Approve for Payment' : 'Approve (send to Production)' }}"
                >
                  <i class="fa-solid fa-check"></i>
                </button>

                {{-- Return --}}
                <button
                  type="button"
                  class="btn btn-sm zmc-icon-btn btn-outline-dark js-open-modal"
                  data-target="#returnModal{{ $app->id }}"
                  data-bs-toggle="tooltip" data-bs-placement="top"
                  title="Return to Accounts"
                >
                  <i class="fa-regular fa-comment-dots"></i>
                </button>

                {{-- Fix Request --}}
                @if($canFixRequest)
                <button
                  type="button"
                  class="btn btn-sm zmc-icon-btn btn-outline-secondary js-open-modal"
                  data-target="#fixRequestModal{{ $app->id }}"
                  data-bs-toggle="tooltip" data-bs-placement="top"
                  title="Raise Fix Request"
                >
                  <i class="fa-solid fa-wrench"></i>
                </button>
                @endif

                {{-- Push to Accounts (waiver cases) --}}
                @if($canPushToAccounts)
                <button
                  type="button"
                  class="btn btn-sm zmc-icon-btn btn-outline-info js-open-modal"
                  data-target="#pushToAccountsModal{{ $app->id }}"
                  data-bs-toggle="tooltip" data-bs-placement="top"
                  title="Push to Accounts"
                >
                  <i class="fa-solid fa-share"></i>
                </button>
                @endif

                {{-- Reject --}}
                <button
                  type="button"
                  class="btn btn-sm zmc-icon-btn btn-outline-danger js-open-modal"
                  data-target="#rejectModal{{ $app->id }}"
                  data-bs-toggle="tooltip" data-bs-placement="top"
                  title="Reject"
                >
                  <i class="fa-solid fa-xmark"></i>
                </button>

              </div>
            </td>
          </tr>

          {{-- Modals --}}
          @push('zmc_modals')
            {{-- Reassign Category Modal --}}
            <div class="modal fade" id="reassignModal{{ $app->id }}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content" method="POST" action="{{ route('staff.registrar.applications.reassign-category', $app) }}">
                  @csrf
                  <div class="modal-header zmc-modal-header">
                    <div>
                      <div class="zmc-modal-title">
                        <i class="fa-solid fa-award me-2" style="color:var(--zmc-accent-dark)"></i>
                        Reassign Category
                        <span class="ms-2 text-muted" style="font-weight:800;font-size:12px;">{{ $ref }}</span>
                      </div>
                      <div class="zmc-modal-sub">Change the assigned category for this application.</div>
                    </div>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label zmc-lbl">Current Category</label>
                      <input type="text" class="form-control zmc-input" value="{{ $currentCat ?? 'NOT ASSIGNED' }}" readonly>
                    </div>

                    <div class="mb-3">
                      <label class="form-label zmc-lbl">New Category <span class="text-danger">*</span></label>
                      <select name="category_code" class="form-select zmc-input" required>
                        <option value="">-- Select new category --</option>
                        @foreach($cats as $code => $name)
                          <option value="{{ $code }}" {{ $currentCat == $code ? 'selected' : '' }}>
                            {{ $code }} - {{ $name }}
                          </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="mb-3">
                      <label class="form-label zmc-lbl">Reason for Reassignment <span class="text-danger">*</span></label>
                      <textarea name="reason" class="form-control zmc-input" rows="3" required placeholder="State why the category is being changed..."></textarea>
                    </div>
                  </div>
                  <div class="modal-footer zmc-modal-footer">
                    <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning fw-bold">
                      <i class="fa-solid fa-rotate me-1"></i>Reassign Category
                    </button>
                  </div>
                </form>
              </div>
            </div>

            {{-- Return Modal --}}
            <div class="modal fade zmc-chat-modal" id="returnModal{{ $app->id }}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <form class="modal-content" method="POST" action="{{ $returnUrl($app->id) }}">
                  @csrf
                  <div class="modal-header zmc-modal-header">
                    <div class="d-flex align-items-center gap-2">
                      <div class="zmc-avatar"><i class="fa-solid fa-user"></i></div>
                      <div>
                        <div class="zmc-modal-title">
                          Return / Notes
                          <span class="ms-2 text-muted" style="font-weight:800;font-size:12px;">{{ $ref }}</span>
                        </div>
                        <div class="zmc-modal-sub">Send back to Accounts/Payments with clear notes.</div>
                      </div>
                    </div>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                    <label class="form-label zmc-lbl">Return reason / notes <span class="text-danger">*</span></label>
                    <textarea name="decision_notes" class="form-control zmc-input" rows="4" required placeholder="State what needs to be corrected / verified…"></textarea>
                  </div>

                  <div class="modal-footer zmc-modal-footer">
                    <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-dark fw-bold">
                      <i class="fa-solid fa-paper-plane me-1"></i>Return to Accounts
                    </button>
                  </div>
                </form>
              </div>
            </div>

            {{-- Approve Modal --}}
            <div class="modal fade" id="approveModal{{ $app->id }}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content" method="POST" action="{{ $approveUrl($app->id) }}" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-header zmc-modal-header">
                    <div>
                      <div class="zmc-modal-title">
                        <i class="fa-solid fa-check me-2" style="color:var(--zmc-accent-dark)"></i>
                        Approve application
                        <span class="ms-2 text-muted" style="font-weight:800;font-size:12px;">{{ $ref }}</span>
                      </div>
                      <div class="zmc-modal-sub">
                        @if($isRegistration)
                          This will approve pending registration fee. Official letter required.
                        @else
                          This will forward to Accounts for payment.
                        @endif
                      </div>
                    </div>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                    @php
                      $isRegistration = ($app->application_type ?? '') === 'registration';
                      $cats = $isRegistration ? \App\Models\Application::massMediaCategories() : \App\Models\Application::accreditationCategories();
                      $label = $isRegistration ? 'Mass Media Category' : 'Accreditation Category';
                      $currentCat = $isRegistration ? $app->media_house_category_code : $app->accreditation_category_code;
                    @endphp

                    <div class="mb-3">
                      <label class="form-label zmc-lbl">{{ $label }} <span class="text-danger">*</span></label>
                      <select name="category_code" class="form-select zmc-input" required>
                        <option value="">-- Select category --</option>
                        @foreach($cats as $code => $name)
                          <option value="{{ $code }}" {{ $currentCat == $code ? 'selected' : '' }}>{{ $code }} - {{ $name }}</option>
                        @endforeach
                      </select>
                    </div>

                    @if($isRegistration)
                    <div class="mb-3">
                      <label class="form-label zmc-lbl">Official Registrar Letter <span class="text-danger">*</span></label>
                      @if($app->registrar_letter_path)
                        <div class="small text-success mb-1"><i class="ri-check-line"></i> Letter already uploaded</div>
                      @endif
                      <input type="file" name="registrar_letter" class="form-control zmc-input" accept=".pdf,.jpg,.jpeg,.png" {{ empty($app->registrar_letter_path) ? 'required' : '' }}>
                      <div class="form-text">PDF, JPG or PNG. Required for media house registration.</div>
                    </div>
                    @endif

                    <label class="form-label zmc-lbl">Notes (optional)</label>
                    <textarea name="decision_notes" class="form-control zmc-input" rows="4" placeholder="Add any notes (optional)"></textarea>
                    <div class="form-text mt-2">
                      @if($isRegistration)
                        Next stage: <b>Pending Registration Fee</b>
                      @else
                        Next stage: <b>Accounts</b> (payment processing)
                      @endif
                    </div>
                  </div>

                  <div class="modal-footer zmc-modal-footer">
                    <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success fw-bold">
                      <i class="fa-solid fa-check me-1"></i>Approve
                    </button>
                  </div>
                </form>
              </div>
            </div>

            {{-- Approve For Payment Modal --}}
            <div class="modal fade" id="approveForPaymentModal{{ $app->id }}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content" method="POST" action="{{ $approveForPaymentUrl($app->id) }}">
                  @csrf
                  <div class="modal-header zmc-modal-header">
                    <div>
                      <div class="zmc-modal-title">
                        <i class="fa-solid fa-money-bill me-2" style="color:var(--zmc-accent-dark)"></i>
                        Approve for Payment
                        <span class="ms-2 text-muted" style="font-weight:800;font-size:12px;">{{ $ref }}</span>
                      </div>
                      <div class="zmc-modal-sub">This will forward the application to Accounts for payment processing.</div>
                    </div>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                    <label class="form-label zmc-lbl">Notes (optional)</label>
                    <textarea name="decision_notes" class="form-control zmc-input" rows="4" placeholder="Add any notes for Accounts..."></textarea>
                  </div>

                  <div class="modal-footer zmc-modal-footer">
                    <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success fw-bold">
                      <i class="fa-solid fa-check me-1"></i>Forward to Accounts
                    </button>
                  </div>
                </form>
              </div>
            </div>

            {{-- Reject Modal --}}
            <div class="modal fade" id="rejectModal{{ $app->id }}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content" method="POST" action="{{ $rejectUrl($app->id) }}">
                  @csrf
                  <div class="modal-header zmc-modal-header">
                    <div>
                      <div class="zmc-modal-title">
                        <i class="fa-solid fa-xmark me-2" style="color:var(--zmc-accent-dark)"></i>
                        Reject application
                        <span class="ms-2 text-muted" style="font-weight:800;font-size:12px;">{{ $ref }}</span>
                      </div>
                      <div class="zmc-modal-sub">Reason will be visible to the applicant.</div>
                    </div>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                    <label class="form-label zmc-lbl">Reason / notes <span class="text-danger">*</span></label>
                    <textarea name="decision_notes" class="form-control zmc-input" rows="4" required placeholder="Provide a clear reason for rejection"></textarea>
                  </div>

                  <div class="modal-footer zmc-modal-footer">
                    <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger fw-bold">
                      <i class="fa-solid fa-xmark me-1"></i>Reject
                    </button>
                  </div>
                </form>
              </div>
            </div>

            {{-- Fix Request Modal --}}
            <div class="modal fade" id="fixRequestModal{{ $app->id }}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content" method="POST" action="{{ route('staff.registrar.applications.fix-request', $app) }}">
                  @csrf
                  <div class="modal-header zmc-modal-header">
                    <div>
                      <div class="zmc-modal-title">
                        <i class="fa-solid fa-wrench me-2" style="color:var(--zmc-accent-dark)"></i>
                        Raise Fix Request
                        <span class="ms-2 text-muted" style="font-weight:800;font-size:12px;">{{ $ref }}</span>
                      </div>
                      <div class="zmc-modal-sub">Send back to Accreditation Officer with instructions.</div>
                    </div>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                    <label class="form-label zmc-lbl">Message to Officer <span class="text-danger">*</span></label>
                    <textarea name="message" class="form-control zmc-input" rows="4" required placeholder="Describe what needs to be fixed..."></textarea>
                  </div>

                  <div class="modal-footer zmc-modal-footer">
                    <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-secondary fw-bold">
                      <i class="fa-solid fa-wrench me-1"></i>Send Fix Request
                    </button>
                  </div>
                </form>
              </div>
            </div>

            {{-- Push to Accounts Modal --}}
            <div class="modal fade" id="pushToAccountsModal{{ $app->id }}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content" method="POST" action="{{ route('staff.registrar.applications.push-to-accounts', $app) }}">
                  @csrf
                  <div class="modal-header zmc-modal-header">
                    <div>
                      <div class="zmc-modal-title">
                        <i class="fa-solid fa-share me-2" style="color:var(--zmc-accent-dark)"></i>
                        Push to Accounts
                        <span class="ms-2 text-muted" style="font-weight:800;font-size:12px;">{{ $ref }}</span>
                      </div>
                      <div class="zmc-modal-sub">Forward this waiver/special case to Accounts for processing.</div>
                    </div>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                    <label class="form-label zmc-lbl">Notes (optional)</label>
                    <textarea name="notes" class="form-control zmc-input" rows="4" placeholder="Add any notes for Accounts..."></textarea>
                  </div>

                  <div class="modal-footer zmc-modal-footer">
                    <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info fw-bold">
                      <i class="fa-solid fa-share me-1"></i>Push to Accounts
                    </button>
                  </div>
                </form>
              </div>
            </div>
          @endpush

        @empty
          <tr>
            <td colspan="7" class="text-center py-5 text-muted">No applications in registrar queue.</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <div class="mt-3">
    {{ $applications->links() }}
  </div>

  @stack('zmc_modals')
</div>

{{-- Global Details Modal (View) --}}
<div class="modal fade zmc-modal-pop" id="appDetailsModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header zmc-modal-header">
        <div>
          <div class="zmc-modal-title">
            <i class="fa-regular fa-file-lines me-2" style="color:var(--zmc-accent-dark)"></i>
            Application Review
          </div>
          <div class="zmc-modal-sub" id="mdl_meta">—</div>
        </div>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div id="mdl_loading" class="d-none text-center py-5">
          <div class="spinner-border" style="color:var(--zmc-accent-dark)"></div>
          <div class="text-muted mt-2" style="font-size:12px;">Loading…</div>
        </div>

        <div id="mdl_error" class="alert alert-danger d-none"></div>

        <div id="mdl_content_area" class="d-none"></div>
      </div>

      <div class="modal-footer zmc-modal-footer">
        <button type="button" class="btn btn-light fw-bold px-4" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  const ZMC_DETAILS_URL = @json($detailsUrlTemplate);

  function zmcFmt(v){
    if(v === null || v === undefined) return '—';
    const s = String(v).trim();
    return s === '' ? '—' : s;
  }

  function zmcOpenModal(selector){
    const el = document.querySelector(selector);
    if(!el) return;
    if (window.bootstrap && typeof bootstrap.Modal === 'function') {
      bootstrap.Modal.getOrCreateInstance(el).show();
      return;
    }
  }

  function zmcBlock(titleHtml, bodyHtml){
    return `
      <div class="zmc-mdl-block">
        <div class="zmc-mdl-title">${titleHtml}</div>
        ${bodyHtml}
      </div>
    `;
  }

  function zmcInput(label, value, col = 4){
    return `
      <div class="col-12 col-md-${col}">
        <label class="form-label zmc-lbl">${label}</label>
        <input type="text" class="form-control zmc-input" value="${zmcFmt(value)}" readonly>
      </div>
    `;
  }

  function zmcTextarea(label, value, col = 12){
    return `
      <div class="col-12 col-md-${col}">
        <label class="form-label zmc-lbl">${label}</label>
        <textarea class="form-control zmc-input" rows="3" readonly>${zmcFmt(value)}</textarea>
      </div>
    `;
  }

  async function loadApplicationDetails(appId) {
    const loader = document.getElementById('mdl_loading');
    const area   = document.getElementById('mdl_content_area');
    const meta   = document.getElementById('mdl_meta');
    const errBox = document.getElementById('mdl_error');

    if (errBox){ errBox.classList.add('d-none'); errBox.textContent = ''; }
    if (loader) loader.classList.remove('d-none');
    if (area){ area.classList.add('d-none'); area.innerHTML = ''; }
    if (meta) meta.textContent = '—';

    try {
      const url = ZMC_DETAILS_URL.replace('__ID__', appId);
      const res = await fetch(url, { headers: { 'Accept': 'application/json' } });
      const data = await res.json().catch(() => ({}));
      if (!res.ok || data.ok === false) throw new Error(data.message || 'Failed to load details');

      const app = data.application || {};
      const formCode = String(app.form_code || '').toUpperCase();
      const ref = app.reference || ('APP-' + (app.id || appId));
      const status = app.status || '—';

      if (meta) {
        meta.innerHTML = `
          <span class="badge bg-light text-dark border me-2">${zmcFmt(formCode || 'Form')}</span>
          Ref: <span class="fw-bold">${zmcFmt(ref)}</span> •
          Status: <span class="fw-bold" style="color:var(--zmc-accent-dark)">${zmcFmt(status)}</span>
        `;
      }

      let html = '';

      if (formCode === 'AP3') {
        const body = `
          <div class="row g-3">
            ${zmcInput('Title', app.title)}
            ${zmcInput('First name', app.first_name)}
            ${zmcInput('Surname', app.surname)}
            ${zmcInput('Other names', app.other_names)}
            ${zmcInput('Date of birth', app.dob)}
            ${zmcInput('Sex', app.sex)}
            ${zmcInput('Birth place', app.birth_place)}
            ${zmcInput('Origin', app.origin)}
            ${zmcInput('Nationality', app.nationality)}
            ${zmcInput('ID / Passport', app.id_passport_number)}
            ${zmcInput('Employer', app.employer_name)}
            ${zmcInput('Medium type', app.medium_type)}
            ${zmcInput('Designation', app.designation)}
            ${zmcTextarea('Assignment brief', app.assignment_brief)}
            ${zmcInput('Arrival date', app.arrival_date)}
            ${zmcInput('Departure date', app.departure_date)}
            ${zmcInput('Port of entry', app.port_entry)}
            ${zmcTextarea('Local address', (app.zim_local_address || app.zim_address))}
          </div>
        `;
        html += zmcBlock(`<i class="fa-regular fa-id-card"></i> Journalist details`, body);
      }

      if (formCode === 'AP1') {
        const s = data.ap1 || {};

        html += zmcBlock(
          `<i class="fa-regular fa-building"></i> Organisation details`,
          `
          <div class="row g-3">
            ${zmcInput('Category', s.category)}
            ${zmcInput('Service name', s.service_name)}
            ${zmcInput('Operating model', s.operating_model)}
            ${zmcInput('Organisation', s.org_name)}
            ${zmcInput('Reg no', s.reg_no)}
            ${zmcInput('Website', s.website)}
            ${zmcTextarea('Head office', s.head_office, 6)}
            ${zmcTextarea('Postal address', s.postal_address, 6)}
          </div>
          `
        );

        html += zmcBlock(
          `<i class="fa-regular fa-address-book"></i> Contact`,
          `
          <div class="row g-3">
            ${zmcInput('Contact person', s.contact_person, 4)}
            ${zmcInput('Contact email', s.contact_email, 4)}
            ${zmcInput('Contact phone', s.contact_phone, 4)}
          </div>
          `
        );

        const directors = Array.isArray(data.directors) ? data.directors : [];
        const managers  = Array.isArray(data.managers) ? data.managers : [];

        let dRows = directors.length ? '' : `<tr><td colspan="5" class="text-muted text-center">—</td></tr>`;
        directors.forEach(d => {
          dRows += `
            <tr>
              <td>${zmcFmt(d.full_name || d.name || (d.first_name ? (d.first_name + ' ' + (d.surname||'')) : ''))}</td>
              <td>${zmcFmt(d.id_passport || d.id || d.id_number)}</td>
              <td>${zmcFmt(d.nationality)}</td>
              <td>${zmcFmt(d.role || d.occupation)}</td>
              <td>${zmcFmt(d.shareholding || d.shares)}</td>
            </tr>
          `;
        });

        html += zmcBlock(
          `<i class="fa-solid fa-people-group"></i> Directors`,
          `
          <div class="table-responsive">
            <table class="table table-sm align-middle zmc-table-lite">
              <thead>
                <tr>
                  <th>Full name</th><th>ID / Passport</th><th>Nationality</th><th>Role</th><th>Shareholding</th>
                </tr>
              </thead>
              <tbody>${dRows}</tbody>
            </table>
          </div>
          `
        );

        let mRows = managers.length ? '' : `<tr><td colspan="4" class="text-muted text-center">—</td></tr>`;
        managers.forEach(m => {
          mRows += `
            <tr>
              <td>${zmcFmt(m.full_name || m.name)}</td>
              <td>${zmcFmt(m.position)}</td>
              <td>${zmcFmt(m.qualification)}</td>
              <td>${zmcFmt(m.experience)}</td>
            </tr>
          `;
        });

        html += zmcBlock(
          `<i class="fa-solid fa-user-gear"></i> Managers`,
          `
          <div class="table-responsive">
            <table class="table table-sm align-middle zmc-table-lite">
              <thead>
                <tr>
                  <th>Full name</th><th>Position</th><th>Qualification</th><th>Experience</th>
                </tr>
              </thead>
              <tbody>${mRows}</tbody>
            </table>
          </div>
          `
        );
      }

      const docs = Array.isArray(data.documents) ? data.documents : [];
      let docRows = docs.length ? '' : `<tr><td colspan="3" class="text-muted text-center">—</td></tr>`;
      docs.forEach(doc => {
        const open = doc.url
          ? `<a href="${doc.url}" target="_blank" class="btn btn-sm btn-outline-primary" title="Open document">
               <i class="fa-solid fa-arrow-up-right-from-square"></i>
             </a>`
          : `<span class="text-muted">—</span>`;
        docRows += `
          <tr>
            <td class="fw-bold">${zmcFmt(doc.document_type)}</td>
            <td>${zmcFmt(doc.original_name || doc.file_name)}</td>
            <td class="text-end">${open}</td>
          </tr>
        `;
      });

      html += zmcBlock(
        `<i class="fa-regular fa-folder-open"></i> Attachments`,
        `
        <div class="table-responsive">
          <table class="table table-sm align-middle zmc-table-lite">
            <thead>
              <tr><th>Type</th><th>File</th><th class="text-end">Open</th></tr>
            </thead>
            <tbody>${docRows}</tbody>
          </table>
        </div>
        `
      );

      if (area) {
        area.innerHTML = html;
        area.classList.remove('d-none');
      }

    } catch (e) {
      if (errBox) {
        errBox.textContent = 'Error loading details: ' + (e.message || 'Unknown error');
        errBox.classList.remove('d-none');
      }
    } finally {
      if (loader) loader.classList.add('d-none');
    }
  }

  document.addEventListener('DOMContentLoaded', function () {
    if (window.bootstrap && typeof bootstrap.Tooltip === 'function') {
      document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => new bootstrap.Tooltip(el));
    }

    document.addEventListener('click', function(e){
      const btn = e.target.closest('.js-open-modal');
      if(!btn) return;
      const target = btn.getAttribute('data-target');
      if(target) zmcOpenModal(target);
    });

    document.addEventListener('click', function(e){
      const btn = e.target.closest('.js-view-more');
      if(!btn) return;
      const appId = btn.getAttribute('data-app-id');
      if(!appId) return;

      zmcOpenModal('#appDetailsModal');
      loadApplicationDetails(appId);
    });
  });
</script>
@endpush
@endsection
