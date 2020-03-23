<div class="field no-border checkbox">
    <label for="remember">{{ __('form.remember') }}</label>
    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    <span class="checkmark"></span>
</div>