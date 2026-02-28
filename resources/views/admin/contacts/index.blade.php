<x-admin.layout title="Messages de contact">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-bold text-white">Messages reçus</h2>
            <p class="text-slate-400 text-sm">{{ $contacts->total() }} message(s)</p>
        </div>
    </div>
    <div class="glass rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="border-b border-slate-700/60">
                <tr class="text-slate-400 text-xs uppercase tracking-wide">
                    <th class="text-left px-5 py-3">Expéditeur</th>
                    <th class="text-left px-5 py-3">Service</th>
                    <th class="text-left px-5 py-3">Message</th>
                    <th class="text-left px-5 py-3">Date</th>
                    <th class="text-right px-5 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800/60">
                @forelse($contacts as $contact)
                <tr class="hover:bg-white/[0.02]">
                    <td class="px-5 py-3">
                        <div class="font-medium text-white flex items-center gap-2">
                            @if(!$contact->read)<span
                                class="w-1.5 h-1.5 rounded-full bg-neon-cyan inline-block shrink-0"></span>@endif
                            {{ $contact->name }}
                        </div>
                        <div class="text-xs text-slate-400">{{ $contact->email }}</div>
                        @if($contact->phone)<div class="text-xs text-slate-500">{{ $contact->phone }}</div>@endif
                    </td>
                    <td class="px-5 py-3 text-slate-400 text-xs">{{ $contact->service }}</td>
                    <td class="px-5 py-3 text-slate-300 text-xs max-w-xs truncate">{{ $contact->message }}</td>
                    <td class="px-5 py-3 text-slate-400 text-xs">{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                    <td class="px-5 py-3 text-right">
                        <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}"
                            onsubmit="return confirm('Supprimer ce message ?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-neon-rose text-xs hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-5 py-10 text-center text-slate-500">Aucun message</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-5 py-3 border-t border-slate-800/60">{{ $contacts->links() }}</div>
    </div>
</x-admin.layout>