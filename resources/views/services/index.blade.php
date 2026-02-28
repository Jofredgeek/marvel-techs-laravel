<x-layout title="Nos Services IT | Marvel Tech's"
    description="Découvrez tous les services de Marvel Tech's : maintenance IT, réseaux, cloud, cybersécurité, développement web, installation & déploiement.">
    <div class="pt-28 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-title tag="Services" title="Tout ce dont vous avez besoin">
                Des solutions IT sur mesure pour chaque besoin, chaque budget, chaque entreprise.
            </x-section-title>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($services as $service)
                <a href="{{ route('services.show', $service->slug) }}"
                    class="reveal group glass glass-hover rounded-xl p-7 flex flex-col">
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-5 text-3xl"
                        style="background: var(--surface-2); border: 1px solid var(--border);">
                        {{ $service->icon }}
                    </div>
                    <h2
                        class="text-xl font-bold text-[var(--heading)] mb-3 group-hover:text-[var(--primary)] transition-colors">
                        {{
                        $service->title }}</h2>
                    <p class="text-[var(--muted)] text-sm leading-relaxed flex-1 mb-5">{{ $service->excerpt }}</p>
                    <div class="flex flex-wrap gap-1.5 mb-5">
                        @foreach($service->technologies ?? [] as $tech)
                        <x-badge color="violet">{{ $tech }}</x-badge>
                        @endforeach
                    </div>
                    <span class="text-[var(--primary)] text-sm font-semibold flex items-center gap-1">
                        Découvrir ce service
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                </a>
                @endforeach
            </div>

            {{-- CTA --}}
            <div class="mt-20 text-center glass rounded-2xl p-10">
                <h3 class="text-2xl font-bold text-[var(--heading)] mb-3">Besoin d'un service sur mesure ?</h3>
                <p class="text-[var(--muted)] mb-6 max-w-xl mx-auto">Chaque entreprise est unique. Décrivez-nous votre
                    projet
                    et nous vous proposerons une solution adaptée.</p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="{{ route('quote') }}" class="btn-primary">Demander un devis gratuit</a>
                    <a href="{{ route('contact') }}" class="btn-outline">Poser une question</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>