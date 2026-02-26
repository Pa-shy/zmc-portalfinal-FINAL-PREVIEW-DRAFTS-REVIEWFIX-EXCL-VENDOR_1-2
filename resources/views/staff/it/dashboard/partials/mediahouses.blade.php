<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-0 p-4 d-flex justify-content-between align-items-center">
        <div>
            <h6 class="fw-bold m-0">Media House Oversight</h6>
            <p class="text-slate-600 small m-0 fw-medium">Manage registered entities and compliance status</p>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle m-0">
                <thead class="bg-slate-50 border-top border-bottom">
                    <tr>
                        <th class="ps-4 small text-slate-700 uppercase fw-bold py-3">Entity Name</th>
                        <th class="small text-slate-700 uppercase fw-bold py-3">Status</th>
                        <th class="small text-slate-700 uppercase fw-bold py-3 text-center">Staff Count</th>
                        <th class="small text-slate-700 uppercase fw-bold py-3 text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($houses as $house)
                    <tr>
                        <td class="ps-4">
                            <div class="fw-bold text-slate-900 small">{{ $house->name }}</div>
                            <div class="text-slate-600 small fw-bold" style="font-size: 11px;">#{{ $house->registration_number ?? 'PENDING' }}</div>
                        </td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3">COMPLIANT</span>
                        </td>
                        <td class="text-center font-monospace">{{ $house->staff_applications_count }}</td>
                        <td class="text-end pe-4">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-icon" data-bs-toggle="dropdown"><i class="ri-more-2-fill"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                    <li><a class="dropdown-item small" href="#"><i class="ri-links-line me-2"></i> Link Media Practitioners</a></li>
                                    <li><a class="dropdown-item small text-danger" href="#"><i class="ri-forbid-line me-2"></i> Suspend Membership</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-5 text-center text-slate-700 font-weight-bold">No media houses registered in system.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-top">
            {{ $houses->links() }}
        </div>
    </div>
</div>
