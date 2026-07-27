<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <p class="text-xs font-bold uppercase tracking-[.14em] text-[var(--primary)]">Espace client</p>
                <h1 class="mt-1 text-2xl font-extrabold text-[var(--heading)]">Bonjour, {{ Auth::user()->name }}</h1>
            </div>
            <span class="badge badge-emerald">
                <span class="h-2 w-2 rounded-full bg-[var(--success)]"></span>
                Compte actif
            </span>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">
            <section class="cta-section p-7 sm:p-10">
                <div class="relative z-10 max-w-2xl">
                    <span class="section-label">Bienvenue chez Marvel Tech's</span>
                    <h2 class="text-3xl font-extrabold tracking-tight text-[var(--heading)]">Votre espace est prêt.</h2>
                    <p class="mt-3 leading-7 text-[var(--muted)]">
                        Retrouvez ici vos prochains échanges et démarrez un projet avec notre équipe.
                    </p>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="{{ route('quote') }}" class="btn-primary">Demander un devis</a>
                        <a href="{{ route('contact') }}" class="btn-outline">Contacter l’équipe</a>
                    </div>
                </div>
            </section>

            <div class="grid gap-6 md:grid-cols-3">
                <a href="{{ route('profile.edit') }}" class="glass-card group p-6">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#9061ff]/10 text-[var(--primary)]">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.12 17.8A9 9 0 1118.88 17.8M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </span>
                    <h3 class="mt-4 font-bold text-[var(--heading)]">Mon profil</h3>
                    <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Mettez à jour vos informations et vos accès.</p>
                </a>
                <a href="{{ route('services.index') }}" class="glass-card group p-6">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#06b6d4]/10 text-[#0796ac]">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.43 12.98a7.5 7.5 0 00.05-.98 7.5 7.5 0 00-.05-.98l2.1-1.64-2-3.46-2.48 1a7.5 7.5 0 00-1.7-.98L15 3.3h-4l-.35 2.64a7.5 7.5 0 00-1.7.98l-2.48-1-2 3.46 2.1 1.64a7.5 7.5 0 00-.05.98c0 .33.02.66.05.98l-2.1 1.64 2 3.46 2.48-1c.52.4 1.09.73 1.7.98L11 20.7h4l.35-2.64a7.5 7.5 0 001.7-.98l2.48 1 2-3.46-2.1-1.64zM13 15a3 3 0 110-6 3 3 0 010 6z" />
                        </svg>
                    </span>
                    <h3 class="mt-4 font-bold text-[var(--heading)]">Nos services</h3>
                    <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Découvrez les solutions adaptées à vos besoins.</p>
                </a>
                <a href="{{ route('portfolio.index') }}" class="glass-card group p-6">
                    <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#34d399]/10 text-[var(--success)]">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8 8-4-4-4 4M4 5v14h16" />
                        </svg>
                    </span>
                    <h3 class="mt-4 font-bold text-[var(--heading)]">Nos réalisations</h3>
                    <p class="mt-2 text-sm leading-6 text-[var(--muted)]">Voyez comment nous transformons les projets IT.</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
