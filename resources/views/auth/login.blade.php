@extends('layouts.web')
@section('page-title', __('Login'))

@section('content')
<div class="container grid">
    <div class="column-2-6"></div>
    <div class="column-2-6">
        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf

                @authEmail
                @authPassword
                @authRemember
                @authSubmit(['title' => 'login', 'request'=>true])
        </form>
    </div>
</div>
@endsection
