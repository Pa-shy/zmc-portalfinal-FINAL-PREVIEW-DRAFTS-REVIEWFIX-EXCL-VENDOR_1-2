@extends('layouts.portal')

@section('title', 'Profile')
@section('page_title', 'PROFILE')

@section('content')
@php
  $user = Auth::user();
  $profileData = $user->profile_data ?? [];
  $journalistScope = $profileData['journalist_scope'] ?? 'local';
  $isLocal = $journalistScope === 'local';
@endphp

<div id="profile-page">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark m-0" style="font-size:18px;">Media Practitioner Profile</h4>
  </div>

  @if(session('success'))
    <div class="alert alert-success d-flex align-items-start gap-2 mb-3">
      <i class="ri-checkbox-circle-line" style="font-size:18px;"></i>
      <div>{{ session('success') }}</div>
    </div>
  @endif

  @if($errors->any())
    <div class="alert alert-danger mb-3">
      <ul class="mb-0">
        @foreach($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('accreditation.profile.update') }}">
    @csrf

    <div class="form-container">
      <div class="form-header">
        <h5 class="m-0"><i class="ri-user-settings-line me-2"></i>Personal Information</h5>
      </div>

      <div class="form-steps-container">
        <div class="text-center mb-4">
          <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name ?? 'User') }}&size=120&background=facc15&color=000&bold=true"
               class="rounded-circle" alt="Profile" width="120" height="120">
          <h5 class="mt-3 mb-1">{{ $user->name ?? 'User' }}</h5>
          <p class="text-muted">Accredited Media Practitioner</p>
        </div>

        <div class="form-row">
          <div class="form-field">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}">
          </div>
          <div class="form-field">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}">
          </div>
        </div>

        <div class="form-row">
          <div class="form-field" id="id-number-field">
            <label class="form-label required">ID Number</label>
            <input type="text" name="id_number" class="form-control" value="{{ old('id_number', $user->id_number ?? '') }}" placeholder="National ID Number">
            <small class="text-muted">Required for local practitioners</small>
          </div>
          <div class="form-field" id="passport-number-field">
            <label class="form-label required">Passport Number</label>
            <input type="text" name="passport_number" class="form-control" value="{{ old('passport_number', $user->passport_number ?? '') }}" placeholder="Passport Number">
            <small class="text-muted">Required for foreign practitioners</small>
          </div>
        </div>

        <div class="form-row">
          <div class="form-field">
            <label class="form-label required">Phone Number (Primary)</label>
            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $user->phone_number ?? '') }}" placeholder="+263...">
          </div>
          <div class="form-field">
            <label class="form-label required">Phone Number (Secondary)</label>
            <input type="text" name="phone2" class="form-control" value="{{ old('phone2', $user->phone2 ?? '') }}" placeholder="+263...">
            <small class="text-muted">At least two phone numbers are required</small>
          </div>
        </div>

        <div class="form-buttons">
          <button type="submit" class="btn btn-primary">
            <i class="ri-save-line me-2"></i>Save Profile
          </button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
