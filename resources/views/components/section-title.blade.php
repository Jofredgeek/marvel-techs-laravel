@props(['tag' => 'span', 'text' => '', 'title' => '', 'class' => ''])
<div {{ $attributes->merge(['class' => "text-center mb-14 $class"]) }}>
    @if($tag)
    <div class="inline-flex items-center gap-2 mb-4">
        <span class="badge badge-cyan">{{ $tag }}</span>
    </div>
    @endif
    @if($title)
    <h2 class="text-3xl sm:text-4xl font-extrabold text-[var(--heading)] mb-4 leading-tight">{{ $title }}</h2>
    @endif
    @if($slot->isNotEmpty())
    <p class="text-[var(--muted)] text-lg max-w-2xl mx-auto leading-relaxed">{{ $slot }}</p>
    @endif
</div>