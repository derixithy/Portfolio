<div class="field @error('name') is-invalid @enderror @error('email') is-invalid @enderror">
    <label for="email">{{ __('form.login') }}</label>
    <input type="text" name="email" value="{{ old('username') ?: old('email') }}" required autocomplete="email" autofocus />
    @error('name')
        <span class="invalid" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @else
	    @error('email')
	        <span class="invalid" role="alert">
	            <strong>{{ $message }}</strong>
	        </span>
	    @else
	        <span>{{ __('form.enter', ['enter' => __('form.username')]) }}</span>
	    @enderror
    @enderror
</div>