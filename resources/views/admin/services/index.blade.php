<x-admin.layout title="Services">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-bold text-white">Services</h2>
            <p class="text-slate-400 text-sm">{{ $services->total() }} service(s)</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="btn-primary text-sm">+ Nouveau</a>
    </div>

    <div class="glass rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="border-b border-slate-700/60">
                <tr class="text-slate-400 text-xs uppercase tracking-wide">
                    <th class="text-left px-5 py-3">#</th>
                    <th class="text-left px-5 py-3">Service</th>
                    <th class="text-left px-5 py-3">Ordre</th>
                    <th class="text-left px-5 py-3">Actif</th>
                    <th class="text-right px-5 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800/60">
                @forelse($services as $service)
                <tr class="hover:bg-white/[0.02]">
                    <td class="px-5 py-3 text-2xl">{{ $service->icon }}</td>
                    <td class="px-5 py-3">
                        <div class="font-medium text-white">{{ $service->title }}</div>
                        <div class="text-slate-400 text-xs truncate max-w-xs">{{ $service->excerpt }}</div>
                    </td>
                    <td class="px-5 py-3 text-slate-400">{{ $service->sort_order }}</td>
                    <td class="px-5 py-3">
                        <span
                            class="text-xs px-2 py-0.5 rounded-full {{ $service->active ? 'bg-neon-emerald/10 text-neon-emerald border border-neon-emerald/30' : 'bg-slate-800 text-slate-400' }}">
                            {{ $service->active ? 'Oui' : 'Non' }}
                        </span>
                    </td>
                    <td class="px-5 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.services.edit', $service) }}"
                                class="text-neon-cyan text-xs hover:underline">Modifier</a>
                            <form method="POST" action="{{ route('admin.services.destroy', $service) }}"
                                onsubmit="return confirm('Supprimer ce service ?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-neon-rose text-xs hover:underline">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-5 py-10 text-center text-slate-500">Aucun service</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-5 py-3 border-t border-slate-800/60">{{ $services->links() }}</div>
    </div>
</x-admin.layout>