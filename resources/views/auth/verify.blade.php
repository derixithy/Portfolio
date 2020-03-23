@extends('layouts.web')
@section('page-title', __('Verify Your Email Address'))

@section('content')
<div class="container margin-large-bottom">
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif
    <div class="text text-center">
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
    </div>
</div>
<div class="container grid">
    <div class="column-2-6"></div>
    <div class="column-2-6">
        <form class="form" method="POST" action="{{ route('verification.resend') }}">
            @csrf

            <ul>
                @authSubmit(['title' => 'request-another', 'request'=>true])
            </ul>
        </form>
    </div>
</div>
@endsection
