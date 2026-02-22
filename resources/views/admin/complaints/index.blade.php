@extends('layouts.portal')
@section('title','Complaints & Appeals')
@section('content')
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Complaints & Appeals</h4>
      <div class="text-muted mt-1" style="font-size:13px;">Received from the website.</div>
    </div>
  </div>

  @if(session('success'))
    <div class="alert alert-success d-flex align-items-start gap-2">
      <i class="ri-checkbox-circle-line" style="font-size:18px;line-height:1;"></i>
      <div>{{ session('success') }}</div>
    </div>
  @endif

  <div class="zmc-card mb-3">
    <form class="row g-2 align-items-end" method="GET">
      <div class="col-12 col-md-3">
        <label class="form-label zmc-lbl">Type</label>
        <select class="form-select zmc-input" name="type">
          <option value="">All</option>
          <option value="complaint" @selected(($type ?? '')==='complaint')>Complaint</option>
          <option value="appeal" @selected(($type ?? '')==='appeal')>Appeal</option>
        </select>
      </div>
      <div class="col-12 col-md-3">
        <label class="form-label zmc-lbl">Status</label>
        <select class="form-select zmc-input" name="status">
          <option value="">All</option>
          @foreach(['open'=>'Open','in_progress'=>'In Progress','resolved'=>'Resolved','closed'=>'Closed'] as $k=>$v)
            <option value="{{ $k }}" @selected(($status ?? '')===$k)>{{ $v }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-12 col-md-3">
        <button class="btn btn-dark"><i class="ri-filter-3-line me-1"></i>Filter</button>
        <a class="btn btn-light" href="{{ route('admin.complaints.index') }}">Reset</a>
      </div>
    </form>
  </div>

  <div class="zmc-card">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0 zmc-mini-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Name</th>
            <th>Subject</th>
            <th>Status</th>
            <th>Attachment</th>
            <th class="text-end">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($items as $c)
          <tr>
            <td class="fw-bold">#{{ $c->id }}</td>
            <td class="text-uppercase small">{{ $c->type }}</td>
            <td>
              {{ $c->full_name }}
              <div class="small text-muted">{{ $c->email ?? '' }} {{ $c->phone ? '• '.$c->phone : '' }}</div>
            </td>
            <td>
              {{ $c->subject ?? '—' }}
              <div class="small text-muted" style="max-width:420px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $c->message }}</div>
            </td>
            <td>
              @php
                $map = ['open'=>'warning','in_progress'=>'primary','resolved'=>'success','closed'=>'secondary'];
              @endphp
              <span class="badge rounded-pill bg-{{ $map[$c->status] ?? 'secondary' }} px-3">{{ str_replace('_',' ', $c->status) }}</span>
            </td>
            <td class="small">
              @if($c->attachment_path)
                <a href="{{ asset('storage/'.$c->attachment_path) }}" target="_blank">{{ $c->attachment_original_name ?? 'Download' }}</a>
              @else
                —
              @endif
            </td>
            <td class="text-end">
              @if(auth()->user()->can('manage_complaints_appeals'))
                <form method="POST" action="{{ route('admin.complaints.update',$c) }}" class="d-inline">@csrf @method('PUT')
                  <select name="status" class="form-select form-select-sm d-inline" style="width:160px; display:inline-block;" onchange="this.form.submit()">
                    @foreach(['open'=>'Open','in_progress'=>'In Progress','resolved'=>'Resolved','closed'=>'Closed'] as $k=>$v)
                      <option value="{{ $k }}" @selected($c->status===$k)>{{ $v }}</option>
                    @endforeach
                  </select>
                </form>
              @else
                —
              @endif
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div class="mt-3">{{ $items->links() }}</div>
  </div>
</div>
@endsection
