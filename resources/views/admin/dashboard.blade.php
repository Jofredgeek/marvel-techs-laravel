<x-admin.layout title="Tableau de bord">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        @foreach([
        ['💬', 'Messages', $stats['contacts'], $stats['newContacts'] . ' non lus', 'neon-cyan'],
        ['📋', 'Devis', $stats['quotes'], $stats['newQuotes'] . ' nouveaux', 'neon-violet'],
        ['⚡', 'Services', $stats['services'], 'actifs', 'neon-emerald'],
        ['📝', 'Articles', $stats['posts'], 'publiés', 'neon-amber'],
        ] as [$icon, $label, $value, $sub, $color])
        <div class="glass rounded-xl p-5">
            <div class="text-2xl mb-2">{{ $icon }}</div>
            <div class="text-2xl font-bold text-[var(--heading)]">{{ $value }}</div>
            <div class="text-sm font-medium text-[var(--muted)]">{{ $label }}</div>
            <div class="text-xs text-[var(--muted)] opacity-70 mt-1">{{ $sub }}</div>
        </div>
        @endforeach
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        {{-- Recent contacts --}}
        <div class="glass rounded-xl overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-[var(--border)]">
                <h2 class="font-semibold text-[var(--heading)] text-sm">Derniers messages</h2>
                <a href="{{ route('admin.contacts.index') }}" class="text-xs text-[var(--primary)] hover:underline">Voir
                    tout</a>
            </div>
            <div class="divide-y divide-slate-800/60">
                @forelse($recentContacts as $contact)
                <div class="px-5 py-3 flex items-center gap-3">
                    @if(!$contact->read)
                    <span class="w-2 h-2 rounded-full bg-[var(--primary)] shrink-0"></span>
                    @else
                    <span class="w-2 h-2 rounded-full bg-transparent shrink-0"></span>
                    @endif
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-medium text-[var(--heading)] truncate">{{ $contact->name }}</div>
                        <div class="text-xs text-[var(--muted)] truncate">{{ $contact->service }} · {{
                            $contact->created_at->diffForHumans() }}</div>
                    </div>
                </div>
                @empty
                <div class="px-5 py-6 text-center text-[var(--muted)] text-sm">Aucun message</div>
                @endforelse
            </div>
        </div>

        {{-- Recent quotes --}}
        <div class="glass rounded-xl overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-[var(--border)]">
                <h2 class="font-semibold text-[var(--heading)] text-sm">Derniers devis</h2>
                <a href="{{ route('admin.quotes.index') }}" class="text-xs text-[var(--primary)] hover:underline">Voir
                    tout</a>
            </div>
            <div class="divide-y divide-slate-800/60">
                @forelse($recentQuotes as $quote)
                <div class="px-5 py-3 flex items-center gap-3">
                    @if(!$quote->read)
                    <span class="w-2 h-2 rounded-full bg-[var(--secondary)] shrink-0"></span>
                    @else
                    <span class="w-2 h-2 rounded-full bg-transparent shrink-0"></span>
                    @endif
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-medium text-[var(--heading)] truncate">{{ $quote->name }}</div>
                        <div class="text-xs text-[var(--muted)] truncate">{{ $quote->service }} · {{ $quote->budget }}
                        </div>
                    </div>
                    <span
                        class="text-xs px-2 py-0.5 rounded-full border
                    {{ $quote->status === 'new' ? 'border-[var(--primary)]/30 text-[var(--primary)]' :
                       ($quote->status === 'accepted' ? 'border-[var(--success)]/30 text-[var(--success)]' : 'border-[var(--border)] text-[var(--muted)]') }}">
                        {{ $quote->status }}
                    </span>
                </div>
                @empty
                <div class="px-5 py-6 text-center text-[var(--muted)] text-sm">Aucun devis</div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Quick links --}}
    <div class="mt-6 grid grid-cols-2 sm:grid-cols-4 gap-3">
        <a href="{{ route('admin.services.create') }}"
            class="glass rounded-xl p-4 text-center hover:border-[var(--primary)]/30 border border-transparent transition-colors">
            <div class="text-xl mb-1">⚡</div>
            <div class="text-xs font-medium text-[var(--muted)]">Nouveau service</div>
        </a>
        <a href="{{ route('admin.projects.create') }}"
            class="glass rounded-xl p-4 text-center hover:border-[var(--secondary)]/30 border border-transparent transition-colors">
            <div class="text-xl mb-1">🖥️</div>
            <div class="text-xs font-medium text-[var(--muted)]">Nouveau projet</div>
        </a>
        <a href="{{ route('admin.posts.create') }}"
            class="glass rounded-xl p-4 text-center hover:border-[var(--success)]/30 border border-transparent transition-colors">
            <div class="text-xl mb-1">📝</div>
            <div class="text-xs font-medium text-[var(--muted)]">Nouvel article</div>
        </a>
        <a href="{{ home_url() }}" target="_blank"
            class="glass rounded-xl p-4 text-center hover:border-[var(--warning)]/30 border border-transparent transition-colors">
            <div class="text-xl mb-1">🌐</div>
            <div class="text-xs font-medium text-[var(--muted)]">Voir le site</div>
        </a>
    </div>
</x-admin.layout>