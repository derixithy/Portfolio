<div class="field @error('email') is-invalid @enderror">
    <label for="password_confirmation">{{ __('form.confirm-password') }}</label>
    <input type="password" name="password_confirmation" required autocomplete="new-password" />
    @error('password')
        <span class="invalid" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @else
        <span>{{ __('form.confirm', ['enter' => __('form.password')]) }}</span>
    @enderror
</div>