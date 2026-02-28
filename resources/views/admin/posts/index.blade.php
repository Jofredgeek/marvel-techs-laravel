<x-admin.layout title="Blog — Articles">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-bold text-[var(--heading)]">Articles Blog</h2>
            <p class="text-[var(--muted)] text-sm">{{ $posts->total() }} article(s)</p>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="btn-primary text-sm">+ Nouvel article</a>
    </div>
    <div class="glass rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="border-b border-[var(--border)]">
                <tr class="text-[var(--muted)] text-xs uppercase tracking-wide">
                    <th class="text-left px-5 py-3">Article</th>
                    <th class="text-left px-5 py-3">Catégorie</th>
                    <th class="text-left px-5 py-3">Publié le</th>
                    <th class="text-left px-5 py-3">Statut</th>
                    <th class="text-right px-5 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y border-[var(--border)]">
                @forelse($posts as $post)
                <tr class="hover:bg-[var(--text)]/[0.02]">
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-2">
                            <span>{{ $post->cover_image }}</span>
                            <div>
                                <div class="font-medium text-[var(--heading)]">{{ $post->title }}</div>
                                <div class="text-xs text-[var(--muted)] truncate max-w-xs">{{ $post->excerpt }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-3"><span class="badge badge-cyan">{{ $post->category }}</span></td>
                    <td class="px-5 py-3 text-[var(--muted)] text-xs">{{ optional($post->published_at)->format('d/m/Y
                        H:i')
                        ?? '—' }}</td>
                    <td class="px-5 py-3">
                        <span
                            class="text-xs px-2 py-0.5 rounded-full {{ $post->active ? 'bg-[var(--success)]/10 text-[var(--success)] border border-[var(--success)]/30' : 'bg-[var(--surface-light)] text-[var(--muted)]' }}">
                            {{ $post->active ? 'Publié' : 'Brouillon' }}
                        </span>
                    </td>
                    <td class="px-5 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('blog.show', $post->slug) }}" target="_blank"
                                class="text-[var(--muted)] text-xs hover:text-[var(--primary)]">Voir</a>
                            <a href="{{ route('admin.posts.edit', $post) }}"
                                class="text-[var(--primary)] text-xs hover:underline">Modifier</a>
                            <form method="POST" action="{{ route('admin.posts.destroy', $post) }}"
                                onsubmit="return confirm('Supprimer cet article ?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="text-[var(--error)] text-xs hover:underline">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-5 py-10 text-center text-[var(--muted)]">Aucun article</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-5 py-3 border-t border-[var(--border)]">{{ $posts->links() }}</div>
    </div>
</x-admin.layout>