@extends('auth.layouts')

@section('content')
<div class="row justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-8">
        <div class="row mb-3 text-center">
            <span>Account already exist <a href="{{ route('login')}}">Login</a></span>
        </div>
        <div class="card">
            <div class="card-header">
                <span style="font-size: 28px;font-family: cursive; background: -webkit-linear-gradient(45deg, #2b286c, #3c85a3); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Register Form</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                        <div class="col-md-8">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Mobile Number') }}</label>

                        <div class="col-md-8">
                            <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>

                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-8">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Register as') }}</label>

                        <div class="col-md-8">
                            <input id="type2" type="radio" class="form-check-input" name="type" value="{{ encrypt(2) }}">
                            <label class="form-check-label" for="type2">
                                Broker
                            </label>
                            <input id="type3" type="radio" class="form-check-input" name="type" value="{{ encrypt(3) }}">
                            <label class="form-check-label" for="type3">
                                Owner
                            </label>
                            <input id="type4" type="radio" class="form-check-input" name="type" value="{{ encrypt(4) }}">
                            <label class="form-check-label" for="type4">
                                User
                            </label>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
