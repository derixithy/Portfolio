<div class="field @error('email') is-invalid @enderror">
    <label for="name">{{ __('form.name') }}</label>
    <input type="text" name="name" value="{{ old('name') }}" required autocomplete="email" autofocus />
    @error('name')
        <span class="invalid" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @else
        <span>{{ __('form.enter', ['enter' => __('form.name')]) }}</span>
    @enderror
</div>