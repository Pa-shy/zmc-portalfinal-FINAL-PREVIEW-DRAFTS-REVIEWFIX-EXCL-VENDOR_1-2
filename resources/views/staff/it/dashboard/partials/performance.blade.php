<div class="row g-4">
    <div class="col-xl-9">
        <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
            <h6 class="fw-bold mb-4">Real-time Performance Metrics</h6>
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="p-4 rounded-4 bg-slate-50 border border-slate-100 text-center">
                        <h2 class="fw-bold text-slate-900 mb-1">{{ number_format($load[0], 2) }}</h2>
                        <div class="small fw-bold text-slate-600 uppercase">CPU Load (1m)</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 rounded-4 bg-slate-50 border border-slate-100 text-center">
                        <h2 class="fw-bold text-slate-900 mb-1">{{ round($memory['usage'] / 1024 / 1024, 1) }} MB</h2>
                        <div class="small fw-bold text-slate-600 uppercase">Memory Usage</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 rounded-4 bg-slate-50 border border-slate-100 text-center">
                        <h2 class="fw-bold text-slate-900 mb-1">24ms</h2>
                        <div class="small fw-bold text-slate-600 uppercase">Avg Response</div>
                    </div>
                </div>
            </div>
            
            <div class="p-4 bg-slate-900 rounded-4 shadow-sm">
                <h6 class="text-white small fw-bold mb-3 border-bottom border-white-10 pb-2">Slow Query Monitor (Top 3)</h6>
                <div class="d-flex flex-column gap-2">
                    <div class="p-2 rounded bg-white-10 small text-white-50">
                        <code>SELECT * FROM applications WHERE status = 'issued' ORDER BY ...</code>
                        <div class="text-end text-warning">142ms</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
         <div class="card border-0 shadow-sm rounded-4 p-4 bg-white border-bottom border-5 border-success">
             <h6 class="fw-bold mb-3 small uppercase text-slate-600">Traffic Pulse</h6>
             <div id="trafficPulseChart" style="height: 120px;"></div>
             <div class="mt-3 text-center">
                 <div class="fw-bold text-slate-900">12 Active Users</div>
                 <div class="text-muted small">Current unique IP sessions</div>
             </div>
         </div>
    </div>
</div>
