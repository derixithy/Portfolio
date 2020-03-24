@extends('layouts.web')
@section('page-title', __('Register'))

@section('content')
<div class="container grid">
    <div class="column-2-6"></div>
    <div class="column-2-6">
        <form class="form" method="POST" action="{{ route('register') }}">
            @csrf

                
                @text([
                    'title' => __('Username'),
                    'name' => 'username',
                    'focus' => true,
                    'required' => true,
                    'description' => __('form.enter', ['enter' => 'gebruikersnaam'])
                ])
                @authName
                @authEmail
                @authPassword
                @authConfirm
                @authSubmit(['title' => 'register'])
        </form>
    </div>
</div>
@endsection
