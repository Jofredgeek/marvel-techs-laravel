@props(['color' => 'cyan'])
<span {{ $attributes->merge(['class' => "badge badge-$color"]) }}>{{ $slot }}</span>