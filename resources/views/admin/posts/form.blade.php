<x-admin.layout title="{{ $action === 'edit' ? 'Modifier : ' . $post->title : 'Nouvel article' }}">
    <div class="max-w-2xl">
        <div class="mb-6"><a href="{{ route('admin.posts.index') }}" class="text-slate-400 hover:text-white text-sm">←
                Retour</a></div>
        <div class="glass rounded-xl p-6">
            <form method="POST"
                action="{{ $action === 'edit' ? route('admin.posts.update', $post) : route('admin.posts.store') }}"
                class="space-y-5">
                @csrf
                @if($action === 'edit') @method('PUT') @endif

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1.5">Titre <span
                            class="text-neon-rose">*</span></label>
                    <input type="text" name="title" required value="{{ old('title', $post->title) }}"
                        class="form-input">
                </div>
                <div class="grid sm:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1.5">Catégorie <span
                                class="text-neon-rose">*</span></label>
                        <input type="text" name="category" required value="{{ old('category', $post->category) }}"
                            class="form-input" placeholder="Réseaux">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1.5">Emoji couverture</label>
                        <input type="text" name="cover_image"
                            value="{{ old('cover_image', $post->cover_image ?? '📝') }}" class="form-input"
                            placeholder="📝">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-1.5">Date publication</label>
                        <input type="datetime-local" name="published_at" class="form-input"
                            value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1.5">Tags</label>
                    <input type="text" name="tags"
                        value="{{ old('tags', is_array($post->tags) ? implode(', ', $post->tags) : $post->tags) }}"
                        class="form-input" placeholder="réseau, sécurité, bonnes pratiques">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1.5">Extrait <span
                            class="text-neon-rose">*</span></label>
                    <textarea name="excerpt" required rows="2" class="form-input"
                        placeholder="Résumé court de l'article...">{{ old('excerpt', $post->excerpt) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1.5">Contenu complet <span
                            class="text-neon-rose">*</span></label>
                    <textarea name="content" required rows="12" class="form-input font-mono text-xs"
                        placeholder="Contenu Markdown...">{{ old('content', $post->content) }}</textarea>
                    <p class="text-xs text-slate-500 mt-1">Supporte le Markdown basique</p>
                </div>
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="active" id="active" value="1" class="w-4 h-4 accent-neon-cyan" {{
                        old('active', $post->active ?? true) ? 'checked' : '' }}>
                    <label for="active" class="text-sm text-slate-300">Article actif / visible</label>
                </div>
                <div class="flex gap-3">
                    <button type="submit" class="btn-primary">{{ $action === 'edit' ? 'Mettre à jour' : 'Publier'
                        }}</button>
                    <a href="{{ route('admin.posts.index') }}" class="btn-outline">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</x-admin.layout>