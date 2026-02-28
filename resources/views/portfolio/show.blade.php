<x-layout :title="$project->title . ' — Portfolio | Marvel Tech\'s'" :description="$project->excerpt">
    <div class="pt-28 pb-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-sm text-[var(--muted)] mb-10" aria-label="Fil d'Ariane">
                <a href="{{ route('portfolio.index') }}" class="hover:text-neon-cyan transition-colors">Portfolio</a>
                <span>/</span>
                <span class="text-[var(--text)]">{{ $project->title }}</span>
            </nav>

            {{-- Header --}}
            <div class="mb-10">
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach($project->tags ?? [] as $tag)
                    <x-badge color="cyan">{{ $tag }}</x-badge>
                    @endforeach
                </div>
                <h1 class="text-4xl font-extrabold text-white mb-3">{{ $project->title }}</h1>
                <div class="flex flex-wrap gap-4 text-[var(--muted)] text-sm">
                    <span>👤 Client : {{ $project->client }}</span>
                    <span>📅 Année : {{ $project->year }}</span>
                </div>
            </div>

            {{-- Cover --}}
            <div class="glass rounded-2xl h-64 flex items-center justify-center mb-10 overflow-hidden">
                <span class="text-8xl">{{ $project->cover_image ?? '🖥️' }}</span>
            </div>

            {{-- Content --}}
            <div class="glass rounded-xl p-8 mb-10 text-[var(--text)] opacity-90 leading-relaxed">
                {!! nl2br(e($project->content)) !!}
            </div>

            {{-- Gallery --}}
            @if($project->gallery)
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-10">
                @foreach($project->gallery ?? [] as $img)
                <div class="glass rounded-xl aspect-video flex items-center justify-center text-4xl">{{ $img }}</div>
                @endforeach
            </div>
            @endif

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('portfolio.index') }}" class="btn-outline">← Retour au portfolio</a>
                <a href="{{ route('quote') }}" class="btn-primary">Projet similaire ? Discutons-en</a>
            </div>
        </div>
    </div>
</x-layout>