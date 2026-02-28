<x-admin.layout title="Demandes de devis">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-bold text-[var(--heading)]">Demandes de devis</h2>
            <p class="text-[var(--muted)] text-sm">{{ $quotes->total() }} devis</p>
        </div>
    </div>
    <div class="glass rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="border-b border-[var(--border)]">
                <tr class="text-[var(--muted)] text-xs uppercase tracking-wide">
                    <th class="text-left px-5 py-3">Client</th>
                    <th class="text-left px-5 py-3">Service</th>
                    <th class="text-left px-5 py-3">Budget</th>
                    <th class="text-left px-5 py-3">Statut</th>
                    <th class="text-left px-5 py-3">Date</th>
                    <th class="text-right px-5 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y border-[var(--border)]">
                @forelse($quotes as $quote)
                <tr class="hover:bg-[var(--text)]/[0.02]">
                    <td class="px-5 py-3">
                        <div class="font-medium text-[var(--heading)] flex items-center gap-2">
                            @if(!$quote->read)<span
                                class="w-1.5 h-1.5 rounded-full bg-[var(--secondary)] inline-block shrink-0"></span>@endif
                            {{ $quote->name }}
                        </div>
                        <div class="text-xs text-[var(--muted)]">{{ $quote->email }}</div>
                        @if($quote->company)<div class="text-xs text-[var(--muted)] opacity-70">{{ $quote->company }}
                        </div>@endif
                    </td>
                    <td class="px-5 py-3 text-[var(--muted)] text-xs">{{ Str::limit($quote->service, 35) }}</td>
                    <td class="px-5 py-3 text-[var(--muted)] text-xs">{{ $quote->budget }}</td>
                    <td class="px-5 py-3">
                        <span
                            class="text-xs px-2 py-0.5 rounded-full border
                        {{ $quote->status === 'new' ? 'border-[var(--primary)]/40 text-[var(--primary)]' :
                           ($quote->status === 'accepted' ? 'border-[var(--success)]/40 text-[var(--success)]' :
                           ($quote->status === 'declined' ? 'border-[var(--error)]/40 text-[var(--error)]' : 'border-[var(--border)] text-[var(--muted)]')) }}">
                            {{ $quote->status }}
                        </span>
                    </td>
                    <td class="px-5 py-3 text-[var(--muted)] text-xs">{{ $quote->created_at->format('d/m/Y') }}</td>
                    <td class="px-5 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <button onclick="this.closest('tr').querySelector('.details').classList.toggle('hidden')"
                                class="text-[var(--primary)] text-xs hover:underline">Détails</button>
                            <form method="POST" action="{{ route('admin.quotes.destroy', $quote) }}"
                                onsubmit="return confirm('Supprimer ce devis ?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="text-[var(--error)] text-xs hover:underline">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr class="details hidden bg-[var(--background)]">
                    <td colspan="6"
                        class="px-5 py-4 text-xs text-[var(--text)] opacity-80 leading-relaxed whitespace-pre-line">{{
                        $quote->details }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-10 text-center text-[var(--muted)]">Aucun devis</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-5 py-3 border-t border-[var(--border)]">{{ $quotes->links() }}</div>
    </div>
</x-admin.layout>