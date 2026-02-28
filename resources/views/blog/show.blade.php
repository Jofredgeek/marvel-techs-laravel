<x-layout :title="$post->title . ' | Blog Marvel Tech\'s'" :description="$post->excerpt">
    <div class="pt-28 pb-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-sm text-[var(--muted)] mb-10" aria-label="Fil d'Ariane">
                <a href="{{ route('blog.index') }}" class="hover:text-neon-cyan transition-colors">Blog</a>
                <span>/</span>
                <span class="text-[var(--text)]">{{ Str::limit($post->title, 40) }}</span>
            </nav>

            {{-- Header --}}
            <div class="mb-8">
                <div class="flex flex-wrap gap-2 mb-4">
                    <x-badge color="violet">{{ $post->category }}</x-badge>
                    @foreach($post->tags ?? [] as $tag)
                    <x-badge color="cyan">{{ $tag }}</x-badge>
                    @endforeach
                </div>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-white mb-4 leading-tight">{{ $post->title }}</h1>
                <div class="flex items-center gap-3 text-[var(--muted)] text-sm">
                    <div
                        class="w-8 h-8 rounded-full bg-gradient-to-br from-neon-cyan to-neon-violet flex items-center justify-center text-dark-900 font-bold text-xs">
                        MT</div>
                    <span>Marvel Tech's</span>
                    @if($post->published_at)
                    <span>·</span>
                    <span>{{ $post->published_at->format('d M Y') }}</span>
                    @endif
                    <span>·</span>
                    <span>{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min de lecture</span>
                </div>
            </div>

            {{-- Cover --}}
            @if($post->cover_image && strlen($post->cover_image) <= 2) <div
                class="glass rounded-2xl h-64 flex items-center justify-center mb-10 text-8xl">{{ $post->cover_image }}
        </div>
        @endif

        {{-- Content --}}
        <article class="glass rounded-xl p-8 mb-10 text-[var(--text)] opacity-90 leading-relaxed">
            {!! nl2br(e($post->content)) !!}
        </article>

        {{-- Share --}}
        <div class="glass rounded-xl p-5 mb-10 flex flex-col sm:flex-row items-center gap-4">
            <span class="text-[var(--muted)] text-sm font-medium">Partager cet article</span>
            <div class="flex gap-3">
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(url()->current()) }}"
                    target="_blank" class="btn-outline text-xs py-1.5 px-4">𝕏 Twitter</a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                    target="_blank" class="btn-outline text-xs py-1.5 px-4">LinkedIn</a>
            </div>
        </div>

        {{-- Related --}}
        @if($relatedPosts->count())
        <div>
            <h2 class="text-xl font-bold text-white mb-5">Articles similaires</h2>
            <div class="grid sm:grid-cols-2 gap-4">
                @foreach($relatedPosts as $related)
                <a href="{{ route('blog.show', $related->slug) }}" class="glass glass-hover rounded-xl p-4 block group">
                    <x-badge color="violet" class="mb-2">{{ $related->category }}</x-badge>
                    <h3 class="font-semibold text-white text-sm group-hover:text-neon-cyan transition-colors mt-2">{{
                        $related->title }}</h3>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    </div>
</x-layout>