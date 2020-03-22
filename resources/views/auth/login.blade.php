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
                    <label for="email">{{ __('auth.login') }}</label>
                    <input type="text" name="email" value="{{ old('email') }}" equired autocomplete="email" autofocus />
                    @error('email')
                        <span class="invalid" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @else
                        <span>{{ __('auth.enter-email') }}</span>
                    @enderror
                </li>
                <li @error('password') class="is-invalid" @enderror>
                    <label for="password">{{ __('auth.password') }}</label>
                    <input type="text" name="password" equired autocomplete="current-password" />
                    @error('password')
                        <span class="invalid" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @else
                        <span>{{ __('auth.enter-password') }}</span>
                    @enderror
                </li>
                <li class="no-border">
                    <label for="remember">{{ __('auth.remember') }}</label>
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                </li>
                @if (Route::has('password.request'))
                <li class="no-border">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('auth.forgot') }}
                        </a>
                </li>
                @endif
                <li>
                    <input type="submit" value="{{ __('auth.login') }}" />
                </li>
            </ul>
        </form>
    </div>
</div>
@endsection
