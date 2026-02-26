@extends('layouts.portal')
@section('title', 'Settings')

@section('content')
<div id="settings-page">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark m-0" style="font-size:18px;">Settings</h4>
  </div>

  <div class="form-container">
    <div class="form-header">
      <h5 class="m-0"><i class="ri-settings-3-line me-2"></i>Account Settings</h5>
    </div>

    <div class="form-steps-container">
      <div class="form-row">
        <div class="form-field">
          <label class="form-label">Organization Display Name</label>
          <input type="text" class="form-control" value="Mass Media Service">
        </div>
        <div class="form-field">
          <label class="form-label">Notification Email</label>
          <input type="email" class="form-control" value="info@mediahouse.co.zw">
        </div>
      </div>

      <div class="form-row">
        <div class="form-field">
          <label class="form-label">Phone Number</label>
          <input type="text" class="form-control" value="{{ Auth::user()->phone_number ?? '' }}">
        </div>
        <div class="form-field">
          <label class="form-label">Theme</label>
          <div class="d-flex align-items-center gap-3">
            <select class="form-control" id="themeSelect" style="max-width:200px;">
              <option value="light" @selected((Auth::user()->theme ?? 'light') === 'light')>Light</option>
              <option value="dark" @selected((Auth::user()->theme ?? 'light') === 'dark')>Dark</option>
            </select>
            <span class="text-muted small" id="themeSaveStatus"></span>
          </div>
        </div>
      </div>

      <div class="form-buttons">
        <button type="button" class="btn btn-primary" onclick="alert('Demo: Settings saved')">
          Save Changes
        </button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  document.getElementById('themeSelect')?.addEventListener('change', function(){
    const theme = this.value;
    const status = document.getElementById('themeSaveStatus');
    fetch('{{ route("settings.theme.ajax") }}', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Accept': 'application/json'
      },
      body: JSON.stringify({ theme: theme })
    })
    .then(r => r.json())
    .then(data => {
      if(data.success){
        document.body.className = 'theme-' + theme;
        if(status) status.textContent = 'Saved!';
        setTimeout(() => { if(status) status.textContent = ''; }, 2000);
      }
    })
    .catch(() => {
      if(status) status.textContent = 'Error saving';
    });
  });
</script>
@endpush
