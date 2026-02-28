<x-layout :title="$service->title . ' | Marvel Tech\'s'" :description="$service->excerpt">
    <div class="pt-28 pb-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-2 text-sm text-[var(--muted)] mb-10" aria-label="Fil d'Ariane">
                <a href="{{ route('services.index') }}"
                    class="hover:text-[var(--primary)] transition-colors">Services</a>
                <span>/</span>
                <span class="text-[var(--text)] opacity-80">{{ $service->title }}</span>
            </nav>

            <div class="grid lg:grid-cols-3 gap-12">
                {{-- Main content --}}
                <div class="lg:col-span-2">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 rounded-2xl flex items-center justify-center text-4xl"
                            style="background: var(--surface-2); border: 1px solid var(--border);">
                            {{ $service->icon }}
                        </div>
                        <div>
                            <h1 class="text-3xl sm:text-4xl font-extrabold text-[var(--heading)]">{{ $service->title }}
                            </h1>
                        </div>
                    </div>

                    <p class="text-lg text-[var(--text)] opacity-90 leading-relaxed mb-8">{{ $service->excerpt }}</p>

                    <div
                        class="prose prose-invert prose-slate max-w-none text-[var(--text)] opacity-90 leading-relaxed mb-10">
                        {!! nl2br(e($service->content)) !!}
                    </div>

                    {{-- Benefits --}}
                    @if($service->features)
                    <div class="mb-10">
                        <h2 class="text-xl font-bold text-[var(--heading)] mb-4">✅ Ce que vous obtenez</h2>
                        <div class="grid sm:grid-cols-2 gap-3">
                            @foreach($service->features ?? [] as $feature)
                            <div class="flex items-start gap-3 glass rounded-xl p-4">
                                <svg class="w-5 h-5 text-[var(--success)] shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-[var(--text)] opacity-90 text-sm">{{ $feature }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Technologies --}}
                    @if($service->technologies)
                    <div class="mb-10">
                        <h2 class="text-xl font-bold text-[var(--heading)] mb-4">🛠️ Technologies utilisées</h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach($service->technologies ?? [] as $tech)
                            <x-badge color="violet">{{ $tech }}</x-badge>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                {{-- Sidebar --}}
                <div class="space-y-5">
                    {{-- CTA card --}}
                    <div class="glass rounded-xl p-6 border border-[var(--primary)]/20">
                        <h3 class="font-bold text-[var(--heading)] mb-2">Intéressé par ce service ?</h3>
                        <p class="text-[var(--muted)] text-sm mb-4">Obtenez un devis personnalisé en 24h. Audit initial
                            gratuit.</p>
                        <a href="{{ route('quote') }}?service={{ $service->slug }}"
                            class="btn-primary w-full justify-center mb-3">Demander un devis</a>
                        <a href="{{ route('contact') }}" class="btn-outline w-full justify-center text-sm">Poser une
                            question</a>
                    </div>

                    {{-- Other services --}}
                    <div class="glass rounded-xl p-5">
                        <h3 class="font-semibold text-[var(--heading)] text-sm mb-3">Autres services</h3>
                        <ul class="space-y-2">
                            @foreach($otherServices as $s)
                            <li>
                                <a href="{{ route('services.show', $s->slug) }}"
                                    class="flex items-center gap-2 text-[var(--muted)] hover:text-[var(--primary)] transition-colors text-sm py-1">
                                    <span>{{ $s->icon }}</span>
                                    {{ $s->title }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Guarantee --}}
                    <div class="glass rounded-xl p-5">
                        <div class="text-2xl mb-2">🛡️</div>
                        <h3 class="font-semibold text-[var(--heading)] text-sm mb-2">Notre garantie</h3>
                        <p class="text-[var(--muted)] text-xs leading-relaxed">Satisfaction garantie ou remboursement.
                            Nous
                            ne facturons que les résultats livrés.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>