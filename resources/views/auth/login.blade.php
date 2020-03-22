@extends('layouts.web')
@section('page-title', __('Login'))

@section('content')
<div class="container grid">
    <div class="column-2-6"></div>
    <div class="column-2-6">
        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf

            <ul>
                <li @error('email') class="is-invalid" @enderror>
                    <label for="name">{{ __('E-Mail Address') }}</label>
                    <input type="text" name="name" value="{{ old('email') }}" equired autocomplete="email" autofocus />
                    <span>{{ __('Enter your E-Mail here') }}</span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
                <li @error('password') class="is-invalid" @enderror>
                    <label for="password">{{ __('Password') }}</label>
                    <input type="text" name="password" equired autocomplete="current-password" />
                    <span>{{ __('Enter your Password here') }}</span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
                <li class="last">
                    <label for="remember">{{ __('Remember Me') }}</label>
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                </li>
                @if (Route::has('password.request'))
                <li class="last">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                </li>
                @endif
                <li>
                    <input type="submit" value="{{ __('Login') }}" />
                </li>
            </ul>
        </form>
    </div>
</div>
@endsection
