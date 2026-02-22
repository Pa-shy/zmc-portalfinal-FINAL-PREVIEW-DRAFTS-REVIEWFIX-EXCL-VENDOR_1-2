<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white border-0 p-4">
        <h6 class="fw-bold m-0">Communication Templates</h6>
        <p class="text-slate-600 small m-0 fw-bold">Edit system emails and SMS notifications</p>
    </div>
    <div class="card-body p-4 pt-0">
        <div class="accordion accordion-flush" id="notificationAccordion">
            @foreach($templates as $key => $content)
            <div class="accordion-item border-slate-100">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed fw-bold text-slate-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $key }}">
                        {{ strtoupper(str_replace('_',' ', $key)) }}
                    </button>
                </h2>
                <div id="collapse-{{ $key }}" class="accordion-collapse collapse" data-bs-parent="#notificationAccordion">
                    <div class="accordion-body bg-slate-50 rounded-3 m-3 border border-slate-100">
                        <form action="{{ route('staff.it.notifications.template.save') }}" method="POST">
                            @csrf
                            <input type="hidden" name="template_key" value="{{ $key }}">
                            <textarea name="content" class="form-control border-0 bg-transparent mb-3" rows="4">{{ $content }}</textarea>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-2">
                                    <span class="badge bg-slate-200 text-slate-600 small">{ref}</span>
                                    <span class="badge bg-slate-200 text-slate-600 small">{name}</span>
                                    <span class="badge bg-slate-200 text-slate-600 small">{reason}</span>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm rounded-pill px-4 fw-bold shadow-sm">Save Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

