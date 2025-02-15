<div class="field border @if( !isset($description) ) no-help @endif @error($name ?? 'text') is-invalid @enderror">
	@if( isset($title) )
    	<label for="{{ $name ?? 'text' }}">{{ $title }}</label>
    @endif

@if(isset($type) and $type == 'textarea')
    @section('textarea')
    <textarea name="{{ $name ?? 'text' }}" id="{{ $name ?? 'text' }}" @if(isset($required) and $required)required @endif @if(isset($focus) and $focus)autofocus @endif onkeyup="resize(this)">{{ $value ?? old($name ?? 'text') }}</textarea>
    @show
@else
    @include('shared.form.input')
@endif
    
    @error($name ?? 'text')
        <span class="invalid" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    @isset( $description )
        <span>{{ $description ?? ''}}</span>
    @endif
</div>