<x-admin.layout title="Portfolio — Projets">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-bold text-[var(--heading)]">Projets Portfolio</h2>
            <p class="text-[var(--muted)] text-sm">{{ $projects->total() }} projet(s)</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="btn-primary text-sm">+ Nouveau</a>
    </div>
    <div class="glass rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="border-b border-[var(--border)]">
                <tr class="text-[var(--muted)] text-xs uppercase tracking-wide">
                    <th class="text-left px-5 py-3">Projet</th>
                    <th class="text-left px-5 py-3">Client</th>
                    <th class="text-left px-5 py-3">Année</th>
                    <th class="text-left px-5 py-3">Tags</th>
                    <th class="text-left px-5 py-3">Vedette</th>
                    <th class="text-right px-5 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y border-[var(--border)]">
                @forelse($projects as $project)
                <tr class="hover:bg-[var(--text)]/[0.02]">
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-2">
                            <span class="text-xl">{{ $project->cover_image }}</span>
                            <div class="font-medium text-[var(--heading)]">{{ $project->title }}</div>
                        </div>
                    </td>
                    <td class="px-5 py-3 text-[var(--muted)]">{{ $project->client }}</td>
                    <td class="px-5 py-3 text-[var(--muted)]">{{ $project->year }}</td>
                    <td class="px-5 py-3">
                        <div class="flex flex-wrap gap-1">
                            @foreach((array)$project->tags as $tag)
                            <span class="badge badge-cyan text-xs">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </td>
                    <td class="px-5 py-3">
                        <span
                            class="{{ $project->featured ? 'text-[var(--warning)]' : 'text-[var(--muted)] opacity-50' }}">{{
                            $project->featured ? '★' : '☆' }}</span>
                    </td>
                    <td class="px-5 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.projects.edit', $project) }}"
                                class="text-[var(--primary)] text-xs hover:underline">Modifier</a>
                            <form method="POST" action="{{ route('admin.projects.destroy', $project) }}"
                                onsubmit="return confirm('Supprimer ce projet ?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="text-[var(--error)] text-xs hover:underline">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-10 text-center text-[var(--muted)]">Aucun projet</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-5 py-3 border-t border-[var(--border)]">{{ $projects->links() }}</div>
    </div>
</x-admin.layout>