@props(['class' => ''])
<div {{ $attributes->merge(['class' => "glass glass-hover rounded-xl p-6 $class"]) }}>
    {{ $slot }}
</div>