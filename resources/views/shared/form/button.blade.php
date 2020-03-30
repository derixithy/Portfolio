
@isset($href)
	<a @isset($type)role="{{$type}}"@endif @isset($class)class="{{$class}}"@endif href="{{$href}}"><strong>{{ $title }}</strong></a>
@else
	<input @isset($type)role="{{$type}}" @endif @isset($class)class="{{$class}}"@endif type="button" value="{{ $title }}" />
@endif
