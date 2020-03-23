<li class="no-border checkbox">
    @if(isset($label))<label for="{{ $name }}">{{ $label }}</label>@endif
    <input type="checkbox" name="{{ $name }}" id="remember" {{ isset($checked) and $checked ? 'checked' : '' }}>
    <span class="checkmark"></span>
</li>