<li class="no-border checkbox">
    @if(isset($label))<label for="{{ $name }}">{{ $label }}</label>@endif
    <input type="checkbox" name="{{ $name }}" {{ isset($checked) and $checked ? 'checked' : '' }}>
    <span class="checkmark"></span>
</li>