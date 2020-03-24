<div class="field no-border">
	@isset($href)
		<a class="button @isset($type){{$type}}@endif" href="{{$href}}">{{ $title }}</a>
	@else
    	<input @isset($type)class="{{$type}}" @endif type="button" value="{{ $title }}" />
    @endif
</div>
