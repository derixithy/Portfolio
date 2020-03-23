@extends('layouts.web')
@section('page-title', __('Reset Password'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        @authEmail
                        @authPassword
                        @authConfirm
                        @authSubmit(['title' => 'confirm'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
