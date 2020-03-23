<div class="field @error('email') is-invalid @enderror">
    <label for="email">{{ __('form.email') }}</label>
    <input type="text" name="email" value="{{ old('email') }}" equired autocomplete="email" autofocus />
    @error('email')
        <span class="invalid" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @else
        <span>{{ __('form.enter', ['enter' => __('form.email')]) }}</span>
    @enderror
</div>