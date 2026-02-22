@extends('layouts.portal')

@section('title', 'Downloads')
@section('page_title', 'DOWNLOADS')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="fw-bold text-dark m-0" style="font-size:18px;">Downloads</h4>
  <a class="btn btn-secondary" href="{{ url()->previous() }}"><i class="ri-arrow-left-line me-1"></i>Back</a>
</div>

<div class="card shadow-sm border-0">
  <div class="card-body">
    <p class="text-muted mb-3">Download your uploaded documents and any generated files associated with your applications.</p>

    @if($docs->count() === 0)
      <div class="alert alert-info mb-0">No downloadable files yet.</div>
    @else
      <div class="table-responsive">
        <table class="table align-middle">
          <thead>
            <tr>
              <th>Application</th>
              <th>Type</th>
              <th>File</th>
              <th>Uploaded</th>
              <th class="text-end">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($docs as $doc)
              <tr>
                <td><span class="badge bg-light text-dark">{{ $doc->application->reference }}</span></td>
                <td>{{ $doc->document_type }}</td>
                <td class="text-truncate" style="max-width:280px;">{{ $doc->original_name ?: basename($doc->file_path) }}</td>
                <td class="text-muted">{{ $doc->created_at?->format('d M Y H:i') }}</td>
                <td class="text-end">
                  <a class="btn btn-sm btn-primary" href="{{ route(str_starts_with(Route::currentRouteName(),'mediahouse.') ? 'mediahouse.downloads.file' : 'accreditation.downloads.file', $doc) }}">
                    <i class="ri-download-2-line me-1"></i>Download
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>
</div>
@endsection
