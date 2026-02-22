@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="auth-card">
  <div class="auth-header">
    <h1>Reset password</h1>
    <p>Choose a new password for your account.</p>
  </div>

  <form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
      @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="form-group mb-3">
      <label class="form-label">New password</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
      @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="form-group mb-3">
      <label class="form-label">Confirm password</label>
      <input type="password" class="form-control" name="password_confirmation" required>
    </div>

    <button class="btn btn-primary w-100" type="submit">Reset password</button>
  </form>

  <div class="text-center mt-3">
    <a href="{{ route('login') }}">Back to login</a>
  </div>
</div>
@endsection
