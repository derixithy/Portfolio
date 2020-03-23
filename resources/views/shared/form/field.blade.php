<li @error($name ?? 'text') class="is-invalid" @enderror>
	@if( isset($title) )
    	<label for="{{ $name ?? 'password' }}">{{ $title }}</label>
    @endif

    <input type="{{ $type ?? 'text' }}" name="{{ $name ?? 'text' }}" value="{{ old($name ?? 'text') }}" {{ isset($required) and $required ? 'required'}} {{ isset($focus) and $focus ? 'autofocus' }} {{ $append ?? '' }} />
    
    @error($name ?? 'text')
        <span class="invalid" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @else
    	@if(isset($description))
        	<span>{{ $description}}</span>
        @endif
    @enderror
</li>