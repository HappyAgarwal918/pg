@extends('auth.layouts')

@section('content')
<div class="row justify-content-center align-items-center hight">
    <div class="col-md-8">
        @if(Session::has('error'))
        <div class="alert alert-danger">
        {{ Session::get('error') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <span style="font-size: 28px;font-family: cursive; background: -webkit-linear-gradient(45deg, #2b286c, #3c85a3); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">OTP</span>
            </div>
            <div class="card-body">
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Thanks for signing up! Before getting started, you need to verify your mobile phone number.') }}
                </div>

                <div class="text-sm text-gray-600">
                    {{ __('Please enter the OTP sent to your number:') }} 
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verifymobile')}}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ $SentTo }}" required readonly autofocus>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror" name="otp" value="" required autofocus>

                                @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Verify') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection