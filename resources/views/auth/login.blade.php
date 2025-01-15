@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center  min-vh-100 ">
    <div class="card text-center p-4" style="max-width: 350px; width: 100%;">
            <img src="{{asset('build/assets/img/login.png')}}" alt="Login Icon" class="mx-auto mb-0" style="max-width: 80px;">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- email section  --}}
                    <div class=" mb-3 form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Enter Your Email" required
                            autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- password section  --}}
                    <div class="form-group mb-4">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Enter Password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- submit button and forgot password link --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                    {{-- register link --}}
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('register') }}"
                            class="link-danger">Register</a></p>
            </div>
            </form>
        </div>
        {{-- </div> --}}
        {{-- </div> --}}
    </div>
    </div>
@endsection
