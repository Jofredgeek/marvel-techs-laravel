@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-1 pt-1 border-b-2 border-[var(--primary)] text-sm font-medium leading-5
text-[var(--text)] focus:outline-none transition duration-150 ease-in-out'
: 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[var(--muted)]
hover:text-[var(--text)] hover:border-[var(--border)] focus:outline-none focus:text-[var(--text)]
focus:border-[var(--border)] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>