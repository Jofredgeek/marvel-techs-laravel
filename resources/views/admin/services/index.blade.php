<x-admin.layout title="Services">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-bold text-[var(--heading)]">Services</h2>
            <p class="text-[var(--muted)] text-sm">{{ $services->total() }} service(s)</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="btn-primary text-sm">+ Nouveau</a>
    </div>

    <div class="glass rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="border-b border-[var(--border)]">
                <tr class="text-[var(--muted)] text-xs uppercase tracking-wide">
                    <th class="text-left px-5 py-3">#</th>
                    <th class="text-left px-5 py-3">Service</th>
                    <th class="text-left px-5 py-3">Ordre</th>
                    <th class="text-left px-5 py-3">Actif</th>
                    <th class="text-right px-5 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y border-[var(--border)]">
                @forelse($services as $service)
                <tr class="hover:bg-[var(--text)]/[0.02]">
                    <td class="px-5 py-3 text-2xl">{{ $service->icon }}</td>
                    <td class="px-5 py-3">
                        <div class="font-medium text-[var(--heading)]">{{ $service->title }}</div>
                        <div class="text-[var(--muted)] text-xs truncate max-w-xs">{{ $service->excerpt }}</div>
                    </td>
                    <td class="px-5 py-3 text-[var(--muted)]">{{ $service->sort_order }}</td>
                    <td class="px-5 py-3">
                        <span
                            class="text-xs px-2 py-0.5 rounded-full {{ $service->active ? 'bg-[var(--success)]/10 text-[var(--success)] border border-[var(--success)]/30' : 'bg-[var(--surface-light)] text-[var(--muted)]' }}">
                            {{ $service->active ? 'Oui' : 'Non' }}
                        </span>
                    </td>
                    <td class="px-5 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.services.edit', $service) }}"
                                class="text-[var(--primary)] text-xs hover:underline">Modifier</a>
                            <form method="POST" action="{{ route('admin.services.destroy', $service) }}"
                                onsubmit="return confirm('Supprimer ce service ?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="text-[var(--error)] text-xs hover:underline">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-5 py-10 text-center text-[var(--muted)]">Aucun service</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-5 py-3 border-t border-[var(--border)]">{{ $services->links() }}</div>
    </div>
</x-admin.layout>