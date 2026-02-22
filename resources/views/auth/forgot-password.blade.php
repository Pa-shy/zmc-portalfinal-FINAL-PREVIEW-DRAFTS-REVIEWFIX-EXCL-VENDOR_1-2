@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
<div class="auth-card">
  <div class="auth-header">
    <h1>Forgot your password?</h1>
    <p>Enter your email address and we'll send you a reset link.</p>
  </div>

  @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif

  <form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
      @error('email')
        <div class="text-danger small mt-1">{{ $message }}</div>
      @enderror
    </div>

    <button class="btn btn-primary w-100" type="submit">Send reset link</button>
  </form>

  <div class="text-center mt-3">
    <a href="{{ route('login') }}">Back to sign in</a>
  </div>
</div>
@endsection
