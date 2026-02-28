@props(['variant' => 'primary', 'href' => null, 'type' => 'button'])
@if($href)
<a href="{{ $href }}" {{ $attributes->merge(['class' => $variant === 'primary' ? 'btn-primary' : 'btn-outline']) }}>{{
    $slot }}</a>
@else
<button type="{{ $type }}" {{ $attributes->merge(['class' => $variant === 'primary' ? 'btn-primary' : 'btn-outline'])
    }}>{{ $slot }}</button>
@endif