@props(['type' => 'success', 'dismissible' => false])
@php
$colors = [
'success' => 'border-neon-emerald/30 bg-neon-emerald/10 text-neon-emerald',
'error' => 'border-neon-rose/30 bg-neon-rose/10 text-neon-rose',
'warning' => 'border-neon-amber/30 bg-neon-amber/10 text-neon-amber',
'info' => 'border-neon-cyan/30 bg-neon-cyan/10 text-neon-cyan',
];
@endphp
<div {{ $attributes->merge(['class' => "border rounded-xl p-4 flex items-start gap-3 {$colors[$type]}"]) }}
    @if($dismissible) x-data="{ show: true }" x-show="show" @endif
    role="alert"
    >
    {{-- Icon --}}
    @if($type === 'success')
    <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    @elseif($type === 'error')
    <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    @elseif($type === 'warning')
    <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
    </svg>
    @else
    <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    @endif

    <div class="flex-1 text-sm">{{ $slot }}</div>

    @if($dismissible)
    <button @click="show = false" class="opacity-70 hover:opacity-100 transition-opacity" aria-label="Fermer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    @endif
</div>