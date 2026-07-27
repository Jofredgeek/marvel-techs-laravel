<x-admin.layout title="Vue d’ensemble">
    @php
        $trendMax = max(1, $activityTrend->max('value'));
        $authTotal = max(1, array_sum($authMethods));
        $routeLabels = [
            'home' => 'Accueil',
            'services.index' => 'Services',
            'services.show' => 'Détail service',
            'portfolio.index' => 'Portfolio',
            'portfolio.show' => 'Détail réalisation',
            'blog.index' => 'Blog',
            'blog.show' => 'Article',
            'contact' => 'Contact',
            'quote' => 'Devis',
            'login' => 'Connexion',
            'register' => 'Inscription',
        ];
        $categoryStyles = [
            'traffic' => ['#06b6d4', '↗'],
            'security' => ['#9061ff', '⌁'],
            'users' => ['#34d399', '+'],
            'content' => ['#fbbf24', '✦'],
            'inbox' => ['#fb7185', '↓'],
            'system' => ['#94a3b8', '•'],
        ];
    @endphp

    <section class="mb-8 flex flex-wrap items-end justify-between gap-4">
        <div>
            <p class="text-sm font-semibold text-[var(--primary)]">{{ now()->translatedFormat('l d F Y') }}</p>
            <h2 class="mt-1 text-2xl font-extrabold tracking-tight text-[var(--heading)] sm:text-3xl">
                Bonjour, {{ Str::before(auth()->user()->name, ' ') }}.
            </h2>
            <p class="mt-2 text-sm text-[var(--muted)]">Voici ce qui se passe aujourd’hui sur Marvel Tech's.</p>
        </div>
        <div class="flex items-center gap-2 rounded-full border border-[var(--success)]/25 bg-[var(--success)]/10 px-3 py-2 text-xs font-bold text-[var(--success)]">
            <span class="h-2 w-2 rounded-full bg-[var(--success)] shadow-[0_0_10px_var(--success)]"></span>
            Site opérationnel
        </div>
    </section>

    <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <a href="{{ route('admin.users.index') }}" class="admin-kpi-card group">
            <div class="flex items-start justify-between">
                <span class="admin-kpi-icon bg-[#9061ff]/10 text-[#9061ff]">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m7-10a4 4 0 100-8 4 4 0 000 8zm13 10v-2a4 4 0 00-3-3.87" /></svg>
                </span>
                <span class="text-xs font-bold text-[var(--success)]">+{{ $stats['newUsers'] }} ce mois</span>
            </div>
            <strong class="mt-5 block text-3xl font-extrabold text-[var(--heading)]">{{ number_format($stats['users']) }}</strong>
            <span class="mt-1 block text-sm text-[var(--muted)]">Utilisateurs inscrits</span>
        </a>

        <a href="{{ route('admin.activities.index', ['category' => 'traffic', 'period' => 'today']) }}" class="admin-kpi-card group">
            <div class="flex items-start justify-between">
                <span class="admin-kpi-icon bg-[#06b6d4]/10 text-[#06b6d4]">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18M7 16l4-5 4 3 5-7" /></svg>
                </span>
                <span class="text-xs font-bold text-[var(--muted)]">Aujourd’hui</span>
            </div>
            <strong class="mt-5 block text-3xl font-extrabold text-[var(--heading)]">{{ number_format($stats['pageViewsToday']) }}</strong>
            <span class="mt-1 block text-sm text-[var(--muted)]">Pages consultées</span>
        </a>

        <a href="{{ route('admin.contacts.index') }}" class="admin-kpi-card group">
            <div class="flex items-start justify-between">
                <span class="admin-kpi-icon bg-[#34d399]/10 text-[#34d399]">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                </span>
                <span class="text-xs font-bold {{ $stats['newContacts'] ? 'text-[#fb7185]' : 'text-[var(--muted)]' }}">{{ $stats['newContacts'] }} non lu(s)</span>
            </div>
            <strong class="mt-5 block text-3xl font-extrabold text-[var(--heading)]">{{ number_format($stats['contacts']) }}</strong>
            <span class="mt-1 block text-sm text-[var(--muted)]">Messages reçus</span>
        </a>

        <a href="{{ route('admin.quotes.index') }}" class="admin-kpi-card group">
            <div class="flex items-start justify-between">
                <span class="admin-kpi-icon bg-[#fbbf24]/10 text-[#d99a00]">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M7 3h7l5 5v11a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z" /></svg>
                </span>
                <span class="text-xs font-bold {{ $stats['newQuotes'] ? 'text-[#fb7185]' : 'text-[var(--muted)]' }}">{{ $stats['newQuotes'] }} nouveau(x)</span>
            </div>
            <strong class="mt-5 block text-3xl font-extrabold text-[var(--heading)]">{{ number_format($stats['quotes']) }}</strong>
            <span class="mt-1 block text-sm text-[var(--muted)]">Demandes de devis</span>
        </a>
    </section>

    <section class="mt-6 grid gap-6 xl:grid-cols-[minmax(0,1.45fr)_minmax(320px,.55fr)]">
        <div class="admin-panel">
            <div class="admin-panel-header">
                <div>
                    <h3 class="font-extrabold text-[var(--heading)]">Activité des 7 derniers jours</h3>
                    <p class="mt-1 text-xs text-[var(--muted)]">{{ $stats['activityToday'] }} événement(s) aujourd’hui</p>
                </div>
                <a href="{{ route('admin.activities.index') }}" class="text-xs font-bold text-[var(--primary)] hover:underline">Journal complet</a>
            </div>
            <div class="px-5 pb-5 pt-7 sm:px-6">
                <div class="flex h-56 items-end justify-between gap-2 sm:gap-4">
                    @foreach($activityTrend as $day)
                        <div class="group flex h-full flex-1 flex-col items-center justify-end gap-2">
                            <span class="text-[10px] font-bold text-[var(--muted)] opacity-0 transition group-hover:opacity-100">{{ $day['value'] }}</span>
                            <div class="relative flex h-[175px] w-full max-w-12 items-end overflow-hidden rounded-lg bg-[var(--surface-2)]">
                                <div class="w-full rounded-lg bg-gradient-to-t from-[#7040e0] to-[#06b6d4] transition-all duration-500 group-hover:brightness-110"
                                    style="height: {{ max(4, round(($day['value'] / $trendMax) * 100)) }}%"></div>
                            </div>
                            <span class="text-[10px] font-bold uppercase text-[var(--muted)]">{{ $day['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="admin-panel">
            <div class="admin-panel-header">
                <div>
                    <h3 class="font-extrabold text-[var(--heading)]">Méthodes de connexion</h3>
                    <p class="mt-1 text-xs text-[var(--muted)]">Répartition des comptes</p>
                </div>
            </div>
            <div class="space-y-5 p-5 sm:p-6">
                @foreach([
                    ['E-mail', $authMethods['email'], '#9061ff'],
                    ['Google', $authMethods['google'], '#06b6d4'],
                    ['Téléphone', $authMethods['phone'], '#34d399'],
                ] as [$label, $count, $color])
                    <div>
                        <div class="mb-2 flex items-center justify-between text-sm">
                            <span class="font-semibold text-[var(--text)]">{{ $label }}</span>
                            <span class="font-extrabold text-[var(--heading)]">{{ $count }}</span>
                        </div>
                        <div class="h-2 overflow-hidden rounded-full bg-[var(--surface-2)]">
                            <div class="h-full rounded-full" style="width: {{ round(($count / $authTotal) * 100) }}%; background: {{ $color }}"></div>
                        </div>
                    </div>
                @endforeach
                <a href="{{ route('admin.users.index') }}" class="btn-outline mt-2 w-full justify-center py-2.5 text-xs">Gérer les utilisateurs</a>
            </div>
        </div>
    </section>

    <section class="mt-6 grid gap-6 xl:grid-cols-[minmax(0,1.3fr)_minmax(320px,.7fr)]">
        <div class="admin-panel">
            <div class="admin-panel-header">
                <div>
                    <h3 class="font-extrabold text-[var(--heading)]">Activité récente</h3>
                    <p class="mt-1 text-xs text-[var(--muted)]">Connexions, contenus et demandes</p>
                </div>
            </div>
            <div class="divide-y divide-[var(--border)]">
                @forelse($recentActivities as $activity)
                    @php([$activityColor, $activityIcon] = $categoryStyles[$activity->category] ?? $categoryStyles['system'])
                    <div class="flex items-center gap-3 px-5 py-3.5 sm:px-6">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl text-sm font-extrabold"
                            style="background: {{ $activityColor }}18; color: {{ $activityColor }}">{{ $activityIcon }}</span>
                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm font-semibold text-[var(--heading)]">{{ $activity->description }}</p>
                            <p class="mt-0.5 truncate text-[11px] text-[var(--muted)]">
                                {{ $activity->user?->name ?? 'Visiteur' }}
                                @if($activity->route) · {{ $routeLabels[$activity->route] ?? $activity->route }} @endif
                            </p>
                        </div>
                        <time class="shrink-0 text-[10px] font-semibold text-[var(--muted)]">{{ $activity->created_at->diffForHumans(short: true) }}</time>
                    </div>
                @empty
                    <div class="px-6 py-12 text-center text-sm text-[var(--muted)]">Les prochaines activités apparaîtront ici.</div>
                @endforelse
            </div>
        </div>

        <div class="admin-panel">
            <div class="admin-panel-header">
                <div>
                    <h3 class="font-extrabold text-[var(--heading)]">Pages populaires</h3>
                    <p class="mt-1 text-xs text-[var(--muted)]">Sur les 30 derniers jours</p>
                </div>
            </div>
            <div class="p-5 sm:p-6">
                <div class="space-y-4">
                    @forelse($topPages as $index => $page)
                        <div class="flex items-center gap-3">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-[var(--surface-2)] text-[11px] font-extrabold text-[var(--muted)]">{{ $index + 1 }}</span>
                            <span class="min-w-0 flex-1 truncate text-sm font-semibold text-[var(--text)]">{{ $routeLabels[$page->route] ?? $page->route }}</span>
                            <span class="text-sm font-extrabold text-[var(--heading)]">{{ $page->total }}</span>
                        </div>
                    @empty
                        <p class="py-7 text-center text-sm text-[var(--muted)]">Les visites commencent à être enregistrées.</p>
                    @endforelse
                </div>
                <div class="mt-6 grid grid-cols-3 gap-2 border-t border-[var(--border)] pt-5 text-center">
                    <a href="{{ route('admin.services.create') }}" class="rounded-xl p-2 text-xs font-bold text-[var(--muted)] hover:bg-[var(--surface-2)] hover:text-[var(--primary)]">+ Service</a>
                    <a href="{{ route('admin.projects.create') }}" class="rounded-xl p-2 text-xs font-bold text-[var(--muted)] hover:bg-[var(--surface-2)] hover:text-[var(--primary)]">+ Projet</a>
                    <a href="{{ route('admin.posts.create') }}" class="rounded-xl p-2 text-xs font-bold text-[var(--muted)] hover:bg-[var(--surface-2)] hover:text-[var(--primary)]">+ Article</a>
                </div>
            </div>
        </div>
    </section>
</x-admin.layout>
