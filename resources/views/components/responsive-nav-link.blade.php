@props(['active'])

@php
$classes = ($active ?? false)
? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[var(--primary)] text-start text-base font-medium text-[var(--primary)]
bg-[var(--surface-2)] focus:outline-none transition duration-150 ease-in-out'
: 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-[var(--muted)]
hover:text-[var(--text)] hover:bg-[var(--surface-2)] hover:border-[var(--border)] focus:outline-none transition
duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>