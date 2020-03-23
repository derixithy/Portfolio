<div class="field border @error($name ?? 'text') is-invalid @enderror">
	@if( isset($title) )
    	<label for="{{ $name ?? 'text' }}">{{ $title }}</label>
    @endif

@if(isset($type) and $type == 'textarea')
    <textarea name="{{ $name ?? 'text' }}" value="{{ old($name ?? 'text') }}" @if(isset($required) and $required)required @endif @if(isset($focus) and $focus)autofocus @endif onkeyup="adjust_textarea(this)"></textarea>
@else
    <input type="{{ $type ?? 'text' }}" name="{{ $name ?? 'text' }}" value="{{ old($name ?? 'text') }}" @if(isset($required) and $required)required @endif @if(isset($focus) and $focus)autofocus @endif {!! $append ?? '' !!} />
@endif
    
    @error($name ?? 'text')
        <span class="invalid" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @else
        <span>{{ $description ?? ''}}</span>
    @enderror
</div>