<x-admin.layout title="Utilisateurs">
    <section class="mb-6">
        <h2 class="text-2xl font-extrabold tracking-tight text-[var(--heading)]">Comptes et accès</h2>
        <p class="mt-2 text-sm text-[var(--muted)]">Consultez les inscriptions et attribuez les droits administrateur.</p>
    </section>

    <section class="mb-6 grid grid-cols-2 gap-3 lg:grid-cols-4">
        @foreach([
            ['Tous les comptes', $stats['total'], '#9061ff'],
            ['Administrateurs', $stats['admins'], '#06b6d4'],
            ['Actifs sur 30 jours', $stats['active'], '#34d399'],
            ['Nouveaux ce mois', $stats['newThisMonth'], '#fbbf24'],
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
        <input name="q" value="{{ $filters['q'] ?? '' }}" class="form-input py-2.5" placeholder="Nom, e-mail ou téléphone">
        <select name="role" class="form-input py-2.5">
            <option value="">Tous les rôles</option>
            <option value="admin" @selected(($filters['role'] ?? '') === 'admin')>Administrateurs</option>
            <option value="customer" @selected(($filters['role'] ?? '') === 'customer')>Clients</option>
        </select>
        <select name="method" class="form-input py-2.5">
            <option value="">Toutes les connexions</option>
            <option value="email" @selected(($filters['method'] ?? '') === 'email')>E-mail</option>
            <option value="google" @selected(($filters['method'] ?? '') === 'google')>Google</option>
            <option value="phone" @selected(($filters['method'] ?? '') === 'phone')>Téléphone</option>
        </select>
        <button class="btn-primary justify-center px-5 py-2.5 text-sm">Filtrer</button>
    </form>

    <div class="admin-panel overflow-hidden">
        <div class="overflow-x-auto">
            <table class="admin-data-table">
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Connexion</th>
                        <th>Inscription</th>
                        <th>Dernière activité</th>
                        <th>Rôle</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                <div class="flex items-center gap-3">
                                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-[#9061ff]/20 to-[#06b6d4]/15 text-xs font-extrabold text-[var(--primary)]">
                                        {{ mb_strtoupper(mb_substr($user->name, 0, 2)) }}
                                    </span>
                                    <div class="min-w-0">
                                        <p class="max-w-52 truncate font-bold text-[var(--heading)]">{{ $user->name }}</p>
                                        <p class="max-w-52 truncate text-[11px] text-[var(--muted)]">{{ $user->email ?: $user->phone }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @php($method = $user->authenticationMethod())
                                <span class="admin-auth-badge {{ strtolower($method) === 'téléphone' ? 'phone' : strtolower($method) }}">{{ $method }}</span>
                            </td>
                            <td class="whitespace-nowrap text-xs text-[var(--muted)]">{{ $user->created_at->format('d/m/Y') }}</td>
                            <td class="whitespace-nowrap text-xs text-[var(--muted)]">
                                {{ $user->last_seen_at?->diffForHumans() ?? 'Jamais' }}
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.users.role', $user) }}" class="flex items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <select name="role" class="form-input min-w-32 py-2 text-xs" @disabled($user->is(auth()->user()))>
                                        <option value="customer" @selected(! $user->is_admin)>Client</option>
                                        <option value="admin" @selected($user->is_admin)>Administrateur</option>
                                    </select>
                                    @unless($user->is(auth()->user()))
                                        <button class="rounded-lg border border-[var(--border)] px-2.5 py-2 text-xs font-bold text-[var(--primary)] hover:bg-[var(--primary)]/10">OK</button>
                                    @endunless
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="py-12 text-center text-sm text-[var(--muted)]">Aucun utilisateur trouvé.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="border-t border-[var(--border)] px-5 py-4">{{ $users->links() }}</div>
    </div>
</x-admin.layout>
