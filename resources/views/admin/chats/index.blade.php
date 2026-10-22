<x-admin.layout title="Chats IA">

    {{-- Le banner session('success') est déjà affiché par la sidebar admin --}}

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-[var(--heading)]">💬 Chats IA — Assistant flottant</h1>
            <p class="text-sm text-[var(--muted)] mt-1">Conversations entre les visiteurs et l'assistant IA du tchat.</p>
        </div>
    </div>

    <div class="glass rounded-xl overflow-hidden">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Session</th>
                    <th>Dernier message</th>
                    <th>Messages</th>
                    <th>Début</th>
                    <th>Dernière activité</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sessions as $s)
                    @php
                        $msgs = $lastMessages->get($s->session_id);
                        $lastUser = $msgs ? $msgs->where('role', 'user')->last() : null;
                        $lastMsg = $msgs ? $msgs->last() : null;
                    @endphp
                    <tr>
                        <td class="font-mono text-xs text-[var(--muted)]">
                            {{ Str::limit($s->session_id, 18, '…') }}
                        </td>
                        <td class="max-w-md">
                            <details>
                                <summary class="cursor-pointer text-[var(--text)] text-sm truncate">
                                    "{{ Str::limit($lastUser?->content ?? '—', 60) }}"
                                    <span class="text-[var(--muted)]">— {{ $lastMsg?->role === 'assistant' ? 'répondu ✅' : 'en attente 🔵' }}</span>
                                </summary>
                                <div class="mt-2 space-y-1.5">
                                    @foreach ($msgs ?? [] as $m)
                                        <div class="text-xs rounded-lg px-2 py-1.5 {{ $m->role === 'user'
                                            ? 'bg-[var(--surface-2)] border border-[var(--glass-border)]'
                                            : 'bg-cyan-500/10 border border-cyan-500/20' }}">
                                            <span class="font-semibold {{ $m->role === 'user' ? 'text-[var(--muted)]' : 'text-cyan-400' }}">
                                                {{ $m->role === 'user' ? 'Client' : 'Bot ⚡' }}
                                            </span>
                                            <span class="text-[var(--muted)] text-[10px] ml-1">
                                                {{ $m->created_at->format('d/m H:i') }}
                                            </span>
                                            <div class="text-[var(--text)] mt-0.5 whitespace-pre-line">{{ $m->content }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </details>
                        </td>
                        <td>
                            <span class="badge badge-violet">{{ $s->messages_count }}</span>
                        </td>
                        <td class="text-[var(--muted)] text-xs">{{ $s->started_at->format('d/m/y H:i') }}</td>
                        <td class="text-[var(--muted)] text-xs">{{ $s->last_at->diffForHumans() }}</td>
                        <td class="text-right">
                            <form action="{{ route('admin.chats.destroy', $s->session_id) }}" method="POST"
                                onsubmit="return confirm('Supprimer cette conversation ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-rose-400 hover:text-rose-300 text-xs font-medium px-2 py-1 rounded hover:bg-rose-500/10 transition-colors">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-10 text-[var(--muted)]">
                            <div class="text-3xl mb-2">🤖</div>
                            Aucune conversation IA pour le moment.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $sessions->withQueryString()->links() }}
    </div>
</x-admin.layout>
