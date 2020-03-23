@extends('layouts.web')
@section('page-title', __('Confirm Password'))

@section('content')
<div class="container text text-center margin-large-bottom">
    {{ __('Please confirm your password before continuing.') }}
</div>
<div class="container grid">
    <div class="column-2-6"></div>
    <div class="column-2-6">
        <form class="form" method="POST" action="{{ route('password.confirm') }}">
            @csrf

            @authPassword
            @authSubmit
        </form>
    </div>
</div>
@endsection
