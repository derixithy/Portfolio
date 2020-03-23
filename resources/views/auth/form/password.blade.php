<div class="field @error('email') is-invalid @enderror">
    <label for="password">{{ __('auth.password') }}</label>
    <input type="password" name="password" required autocomplete="current-password" />
    @error('password')
        <span class="invalid" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @else
        <span>{{ __('form.enter', ['enter' => __('form.password')]) }}</span>
    @enderror
</div>