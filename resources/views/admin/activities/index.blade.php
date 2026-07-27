<x-admin.layout title="Journal d’activité">
    @php
        $categoryLabels = [
            'traffic' => 'Trafic',
            'security' => 'Sécurité',
            'users' => 'Utilisateurs',
            'content' => 'Contenu',
            'inbox' => 'Demandes',
            'system' => 'Système',
        ];
    @endphp

    <section class="mb-6">
        <h2 class="text-2xl font-extrabold tracking-tight text-[var(--heading)]">Tout ce qui se passe sur le site</h2>
        <p class="mt-2 text-sm text-[var(--muted)]">Visites, connexions, inscriptions et modifications du contenu.</p>
    </section>

    <section class="mb-6 grid grid-cols-2 gap-3 lg:grid-cols-4">
        @foreach([
            ['Événements aujourd’hui', $stats['today'], '#9061ff'],
            ['Pages consultées', $stats['views'], '#06b6d4'],
            ['Connexions réussies', $stats['logins'], '#34d399'],
            ['Tentatives échouées', $stats['failed'], '#fb7185'],
        ] as [$label, $value, $color])
            <div class="admin-mini-stat">
                <span class="h-2 w-2 rounded-full" style="background: {{ $color }}"></span>
                <div>
                    <strong class="block text-xl font-extrabold text-[var(--heading)]">{{ $value }}</strong>
                    <span class="text-[11px] text-[var(--muted)]">{{ $label }}</span>
                </div>
            </div>
        @endforeach
    </section>

    <form method="GET" class="mb-5 grid gap-3 rounded-2xl border border-[var(--border)] bg-[var(--surface)] p-4 md:grid-cols-[minmax(220px,1fr)_180px_180px_auto]">
        <input name="q" value="{{ $filters['q'] ?? '' }}" class="form-input py-2.5" placeholder="Rechercher une activité">
        <select name="category" class="form-input py-2.5">
            <option value="">Toutes les catégories</option>
            @foreach($categoryLabels as $value => $label)
                <option value="{{ $value }}" @selected(($filters['category'] ?? '') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        <select name="period" class="form-input py-2.5">
            <option value="">Toute la période</option>
            <option value="today" @selected(($filters['period'] ?? '') === 'today')>Aujourd’hui</option>
            <option value="7days" @selected(($filters['period'] ?? '') === '7days')>7 derniers jours</option>
            <option value="30days" @selected(($filters['period'] ?? '') === '30days')>30 derniers jours</option>
        </select>
        <button class="btn-primary justify-center px-5 py-2.5 text-sm">Filtrer</button>
    </form>

    <div class="admin-panel overflow-hidden">
        <div class="overflow-x-auto">
            <table class="admin-data-table">
                <thead>
                    <tr>
                        <th>Activité</th>
                        <th>Catégorie</th>
                        <th>Utilisateur</th>
                        <th>Route</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($activities as $activity)
                        <tr>
                            <td>
                                <p class="max-w-md font-semibold text-[var(--heading)]">{{ $activity->description }}</p>
                                <p class="mt-1 text-[10px] font-bold uppercase tracking-[.08em] text-[var(--muted)]">{{ str_replace('_', ' ', $activity->event) }}</p>
                            </td>
                            <td><span class="admin-category-badge {{ $activity->category }}">{{ $categoryLabels[$activity->category] ?? $activity->category }}</span></td>
                            <td class="text-xs text-[var(--muted)]">{{ $activity->user?->name ?? 'Visiteur' }}</td>
                            <td class="max-w-40 truncate font-mono text-[11px] text-[var(--muted)]">{{ $activity->route ?? '—' }}</td>
                            <td class="whitespace-nowrap text-xs text-[var(--muted)]">
                                {{ $activity->created_at->format('d/m/Y H:i') }}
                                <span class="block text-[10px]">{{ $activity->created_at->diffForHumans() }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="py-12 text-center text-sm text-[var(--muted)]">Aucune activité pour ces critères.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="border-t border-[var(--border)] px-5 py-4">{{ $activities->links() }}</div>
    </div>
</x-admin.layout>
