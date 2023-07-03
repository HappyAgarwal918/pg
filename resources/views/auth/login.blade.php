@extends('auth.layouts')

@section('content')
<div class="row justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-8">
        @if(Session::has('error'))
        <div class="alert alert-danger">
        {{ Session::get('error') }}
        </div>
        @endif
        <div class="row mb-3 text-center">
            <span>Don't have an account <a href="{{ route('register')}}">Register</a></span>
        </div>
        <div class="card">
            <div class="card-header">
                <span style="font-size: 28px;font-family: cursive; background: -webkit-linear-gradient(45deg, #2b286c, #3c85a3); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Login Form</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="email" class="col-md-12 col-form-label">{{ __('Email/Phone/Username') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
