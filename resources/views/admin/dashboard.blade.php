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
            <div class="text-2xl font-bold text-white">{{ $value }}</div>
            <div class="text-sm font-medium text-slate-300">{{ $label }}</div>
            <div class="text-xs text-slate-500 mt-1">{{ $sub }}</div>
        </div>
        @endforeach
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        {{-- Recent contacts --}}
        <div class="glass rounded-xl overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-700/50">
                <h2 class="font-semibold text-white text-sm">Derniers messages</h2>
                <a href="{{ route('admin.contacts.index') }}" class="text-xs text-neon-cyan hover:underline">Voir
                    tout</a>
            </div>
            <div class="divide-y divide-slate-800/60">
                @forelse($recentContacts as $contact)
                <div class="px-5 py-3 flex items-center gap-3">
                    @if(!$contact->read)
                    <span class="w-2 h-2 rounded-full bg-neon-cyan shrink-0"></span>
                    @else
                    <span class="w-2 h-2 rounded-full bg-transparent shrink-0"></span>
                    @endif
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-medium text-white truncate">{{ $contact->name }}</div>
                        <div class="text-xs text-slate-400 truncate">{{ $contact->service }} · {{
                            $contact->created_at->diffForHumans() }}</div>
                    </div>
                </div>
                @empty
                <div class="px-5 py-6 text-center text-slate-500 text-sm">Aucun message</div>
                @endforelse
            </div>
        </div>

        {{-- Recent quotes --}}
        <div class="glass rounded-xl overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-700/50">
                <h2 class="font-semibold text-white text-sm">Derniers devis</h2>
                <a href="{{ route('admin.quotes.index') }}" class="text-xs text-neon-cyan hover:underline">Voir tout</a>
            </div>
            <div class="divide-y divide-slate-800/60">
                @forelse($recentQuotes as $quote)
                <div class="px-5 py-3 flex items-center gap-3">
                    @if(!$quote->read)
                    <span class="w-2 h-2 rounded-full bg-neon-violet shrink-0"></span>
                    @else
                    <span class="w-2 h-2 rounded-full bg-transparent shrink-0"></span>
                    @endif
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-medium text-white truncate">{{ $quote->name }}</div>
                        <div class="text-xs text-slate-400 truncate">{{ $quote->service }} · {{ $quote->budget }}</div>
                    </div>
                    <span
                        class="text-xs px-2 py-0.5 rounded-full border
                    {{ $quote->status === 'new' ? 'border-neon-cyan/30 text-neon-cyan' :
                       ($quote->status === 'accepted' ? 'border-neon-emerald/30 text-neon-emerald' : 'border-slate-600 text-slate-400') }}">
                        {{ $quote->status }}
                    </span>
                </div>
                @empty
                <div class="px-5 py-6 text-center text-slate-500 text-sm">Aucun devis</div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Quick links --}}
    <div class="mt-6 grid grid-cols-2 sm:grid-cols-4 gap-3">
        <a href="{{ route('admin.services.create') }}"
            class="glass rounded-xl p-4 text-center hover:border-neon-cyan/30 border border-transparent transition-colors">
            <div class="text-xl mb-1">⚡</div>
            <div class="text-xs font-medium text-slate-300">Nouveau service</div>
        </a>
        <a href="{{ route('admin.projects.create') }}"
            class="glass rounded-xl p-4 text-center hover:border-neon-violet/30 border border-transparent transition-colors">
            <div class="text-xl mb-1">🖥️</div>
            <div class="text-xs font-medium text-slate-300">Nouveau projet</div>
        </a>
        <a href="{{ route('admin.posts.create') }}"
            class="glass rounded-xl p-4 text-center hover:border-neon-emerald/30 border border-transparent transition-colors">
            <div class="text-xl mb-1">📝</div>
            <div class="text-xs font-medium text-slate-300">Nouvel article</div>
        </a>
        <a href="{{ route('home') }}" target="_blank"
            class="glass rounded-xl p-4 text-center hover:border-neon-amber/30 border border-transparent transition-colors">
            <div class="text-xl mb-1">🌐</div>
            <div class="text-xs font-medium text-slate-300">Voir le site</div>
        </a>
    </div>
</x-admin.layout>