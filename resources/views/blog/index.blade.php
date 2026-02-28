<x-layout title="Blog IT | Conseils, Guides & Actualités | Marvel Tech's"
    description="Explorez les articles de Marvel Tech's : conseils IT, tutorials réseaux, sécurité informatique, développement web et actualités technologiques.">
    <div class="pt-28 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-title tag="Blog" title="Actualités & Ressources IT">
                Conseils pratiques, tutoriels et insights pour rester à la pointe de la technologie.
            </x-section-title>

            <div class="grid lg:grid-cols-4 gap-8">
                {{-- Articles --}}
                <div class="lg:col-span-3">
                    @if($posts->isEmpty())
                    <div class="text-center py-16 glass rounded-xl">
                        <div class="text-5xl mb-4">📝</div>
                        <p class="text-[var(--muted)]">Aucun article disponible pour le moment.</p>
                    </div>
                    @else
                    <div class="grid gap-6 sm:grid-cols-2">
                        @foreach($posts as $post)
                        <a href="{{ route('blog.show', $post->slug) }}"
                            class="reveal group glass glass-hover rounded-xl overflow-hidden block">
                            <div
                                class="h-44 bg-gradient-to-br from-[var(--primary)]/10 via-[var(--secondary)]/10 to-[var(--success)]/10 flex items-center justify-center">
                                <span class="text-5xl">{{ $post->cover_image ?? '📰' }}</span>
                            </div>
                            <div class="p-5">
                                <div class="flex flex-wrap gap-1.5 mb-3">
                                    <x-badge color="violet">{{ $post->category }}</x-badge>
                                    @foreach($post->tags ?? [] as $tag)
                                    <x-badge color="cyan">{{ $tag }}</x-badge>
                                    @endforeach
                                </div>
                                <h2
                                    class="font-bold text-[var(--heading)] group-hover:text-[var(--primary)] transition-colors mb-2 leading-snug">
                                    {{ $post->title }}
                                </h2>
                                <p class="text-[var(--muted)] text-sm leading-relaxed mb-3 line-clamp-2">{{
                                    $post->excerpt }}
                                </p>
                                <div class="flex items-center justify-between text-xs text-[var(--muted)] opacity-70">
                                    <span>Marvel Tech's</span>
                                    @if($post->published_at)
                                    <span>{{ $post->published_at->format('d M Y') }}</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <div class="mt-10">
                        {{ $posts->links() }}
                    </div>
                    @endif
                </div>

                {{-- Sidebar --}}
                <div class="space-y-6">
                    {{-- Newsletter --}}
                    <div class="glass rounded-xl p-5 border border-[var(--primary)]/15">
                        <h3 class="font-bold text-[var(--heading)] mb-2">📬 Newsletter</h3>
                        <p class="text-[var(--muted)] text-xs mb-4">Recevez nos meilleurs articles chaque semaine.</p>
                        <input type="email" placeholder="votre@email.com" class="form-input mb-3 text-sm">
                        <button class="btn-primary w-full justify-center text-sm py-2">S'abonner</button>
                    </div>

                    {{-- Categories --}}
                    <div class="glass rounded-xl p-5">
                        <h3 class="font-semibold text-[var(--heading)] text-sm mb-3">Catégories</h3>
                        <ul class="space-y-2">
                            @foreach(['Cybersécurité', 'Réseaux', 'Cloud', 'Développement Web', 'Support IT', 'DevOps']
                            as $cat)
                            <li>
                                <a href="{{ route('blog.index', ['category' => $cat]) }}"
                                    class="flex items-center justify-between text-[var(--muted)] hover:text-[var(--primary)] text-sm transition-colors py-1">
                                    <span>{{ $cat }}</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- CTA --}}
                    <div class="glass rounded-xl p-5 border border-[var(--secondary)]/15">
                        <div class="text-2xl mb-2">🚀</div>
                        <h3 class="font-semibold text-[var(--heading)] text-sm mb-2">Besoin d'expertise ?</h3>
                        <p class="text-[var(--muted)] text-xs mb-4">Contactez-nous pour un audit gratuit de 15 min.</p>
                        <a href="{{ route('contact') }}" class="btn-outline w-full justify-center text-sm py-2">Nous
                            contacter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>