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
          <input type="text" class="form-control" value="+263 77 000 0000">
        </div>
        <div class="form-field">
          <label class="form-label">Language Preference</label>
          <select class="form-control">
            <option>English</option>
            <option>Shona</option>
            <option>Ndebele</option>
          </select>
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
