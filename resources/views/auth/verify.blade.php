@extends('auth.layouts')

@section('content')
<div class="row justify-content-center align-items-center hight">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <span style="font-size: 28px;font-family: cursive; background: -webkit-linear-gradient(45deg, #2b286c, #3c85a3); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Verify</span>
            </div>
            <div class="card-body">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
