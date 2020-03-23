@extends('layouts.web')
@section('page-title', __('Reset Password'))

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="container grid">
    <div class="column-2-6"></div>
    <div class="column-2-6">
        <form class="form" method="POST" action="{{ route('password.email') }}">
            @csrf

            <ul>
                @authEmail
                <li>
                    <input type="submit" value="{{ __('Send Password Reset Link') }}" />
                </li>
            </ul>
        </form>
    </div>
</div>
@endsection
