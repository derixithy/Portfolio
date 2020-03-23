<div class="field">
@if ( Route::has('password.request') and isset($request) )
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('auth.forgot') }}
        </a>
@endif
    <input type="submit" value="{{ __('auth.'.($title ?? 'confirm')) }}" />
</div>