@extends('layouts.app')

@section('content')
<div class="bg-light d-flex justify-content-center align-items-center min-vh-100">
    <div class="card text-center p-4" style="max-width: 350px; width: 100%;">
        <img src="{{ asset('build/assets/img/login.png') }}" alt="Register Icon" class="mx-auto" style="max-width: 80px;">

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="form-group mb-3">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Your Name" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="form-group mb-3">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                </div>

                {{-- Submit Button --}}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary w-100">{{ __('Register') }}</button>
                </div>
            </form>
        </div>

        {{-- Already Have Account --}}
        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="{{ route('login') }}" class="link-danger">Login</a></p>
    </div>
</div>
@endsection
