<x-admin.layout title="Demandes de devis">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-bold text-white">Demandes de devis</h2>
            <p class="text-slate-400 text-sm">{{ $quotes->total() }} devis</p>
        </div>
    </div>
    <div class="glass rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="border-b border-slate-700/60">
                <tr class="text-slate-400 text-xs uppercase tracking-wide">
                    <th class="text-left px-5 py-3">Client</th>
                    <th class="text-left px-5 py-3">Service</th>
                    <th class="text-left px-5 py-3">Budget</th>
                    <th class="text-left px-5 py-3">Statut</th>
                    <th class="text-left px-5 py-3">Date</th>
                    <th class="text-right px-5 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800/60">
                @forelse($quotes as $quote)
                <tr class="hover:bg-white/[0.02]">
                    <td class="px-5 py-3">
                        <div class="font-medium text-white flex items-center gap-2">
                            @if(!$quote->read)<span
                                class="w-1.5 h-1.5 rounded-full bg-neon-violet inline-block shrink-0"></span>@endif
                            {{ $quote->name }}
                        </div>
                        <div class="text-xs text-slate-400">{{ $quote->email }}</div>
                        @if($quote->company)<div class="text-xs text-slate-500">{{ $quote->company }}</div>@endif
                    </td>
                    <td class="px-5 py-3 text-slate-400 text-xs">{{ Str::limit($quote->service, 35) }}</td>
                    <td class="px-5 py-3 text-slate-400 text-xs">{{ $quote->budget }}</td>
                    <td class="px-5 py-3">
                        <span
                            class="text-xs px-2 py-0.5 rounded-full border
                        {{ $quote->status === 'new' ? 'border-neon-cyan/40 text-neon-cyan' :
                           ($quote->status === 'accepted' ? 'border-neon-emerald/40 text-neon-emerald' :
                           ($quote->status === 'declined' ? 'border-neon-rose/40 text-neon-rose' : 'border-slate-600 text-slate-400')) }}">
                            {{ $quote->status }}
                        </span>
                    </td>
                    <td class="px-5 py-3 text-slate-400 text-xs">{{ $quote->created_at->format('d/m/Y') }}</td>
                    <td class="px-5 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <button onclick="this.closest('tr').querySelector('.details').classList.toggle('hidden')"
                                class="text-neon-cyan text-xs hover:underline">Détails</button>
                            <form method="POST" action="{{ route('admin.quotes.destroy', $quote) }}"
                                onsubmit="return confirm('Supprimer ce devis ?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-neon-rose text-xs hover:underline">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr class="details hidden bg-[#060810]">
                    <td colspan="6" class="px-5 py-4 text-xs text-slate-300 leading-relaxed whitespace-pre-line">{{
                        $quote->details }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-10 text-center text-slate-500">Aucun devis</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-5 py-3 border-t border-slate-800/60">{{ $quotes->links() }}</div>
    </div>
</x-admin.layout>