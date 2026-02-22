<div class="row g-4">
    <div class="col-xl-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-0 p-4">
                <h6 class="fw-bold m-0 text-primary"><i class="ri-shield-keyhole-line me-1"></i> Active Session Pulse</h6>
                <p class="text-slate-600 small m-0 fw-medium">Monitor live connections and authentication events</p>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle m-0">
                        <thead class="bg-slate-50 border-top border-bottom">
                            <tr>
                                <th class="ps-4 small text-slate-700 uppercase fw-bold py-3">IP Address</th>
                                <th class="small text-slate-700 uppercase fw-bold py-3">User Agent</th>
                                <th class="small text-slate-700 uppercase fw-bold py-3">Last Active</th>
                                <th class="small text-slate-700 uppercase fw-bold py-3 text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sessions as $session)
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-slate-900 small">{{ $session->ip_address }}</div>
                                    <div class="text-slate-600 fw-bold" style="font-size: 10px;">ID: {{ substr($session->id, 0, 8) }}...</div>
                                </td>
                                <td>
                                    <div class="text-slate-600 small text-truncate" style="max-width: 300px;">{{ $session->user_agent }}</div>
                                </td>
                                <td>
                                    <span class="small">{{ Carbon\Carbon::createFromTimestamp($session->last_activity)->diffForHumans() }}</span>
                                </td>
                                <td class="text-end pe-4">
                                    <form action="{{ route('staff.it.security.session.logout', $session->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-icon"><i class="ri-logout-box-r-line text-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="p-5 text-center text-slate-700 font-weight-bold">No active sessions tracked in database.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
            <h6 class="fw-bold mb-3 d-flex align-items-center gap-2">
                <i class="ri-fire-line text-danger"></i> Threat Indicators
            </h6>
            <div class="d-flex flex-column gap-3">
                <div class="p-3 bg-danger-subtle rounded-4 border border-danger-subtle">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="small fw-bold text-danger">Failed Logins</span>
                        <span class="badge bg-danger rounded-pill">Elevated</span>
                    </div>
                    <div class="fs-4 fw-bold text-danger">43</div>
                    <div class="text-danger small opacity-75">Last 15 minutes</div>
                </div>
                <div class="p-3 bg-slate-50 rounded-4 border border-slate-100">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="small fw-bold text-slate-600">Rate Limiting</span>
                        <span class="badge bg-success rounded-pill">Active</span>
                    </div>
                    <div class="fs-4 fw-bold text-slate-900">0</div>
                    <div class="text-slate-600 small fw-bold">IPs currently throttled</div>
                </div>
            </div>
        </div>
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-dark text-white">
             <h6 class="fw-bold mb-3">Firewall Controls</h6>
             <div class="d-grid gap-2">
                 <form action="{{ route('staff.it.security.ip.block') }}" method="POST" class="d-grid">
                     @csrf
                     <button type="submit" class="btn btn-white-10 text-white btn-sm border-0 py-2 rounded-pill fw-bold">Manual IP Block</button>
                 </form>
                 <form action="{{ route('staff.it.security.toggle_rate_limiting') }}" method="POST" class="d-grid">
                     @csrf
                     <button type="submit" class="btn btn-white-10 text-white btn-sm border-0 py-2 rounded-pill fw-bold">Toggle Rate Limiting</button>
                 </form>
                 <form action="{{ route('staff.it.security.ssl_audit') }}" method="POST" class="d-grid">
                     @csrf
                     <button type="submit" class="btn btn-white-10 text-white btn-sm border-0 py-2 rounded-pill fw-bold text-info">SSL/CSRF Audit</button>
                 </form>
             </div>
        </div>
    </div>
</div>
