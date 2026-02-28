<x-admin.layout title="{{ $action === 'edit' ? 'Modifier : ' . $project->title : 'Nouveau projet' }}">
    <div class="max-w-2xl">
        <div class="mb-6"><a href="{{ route('admin.projects.index') }}"
                class="text-[var(--muted)] hover:text-[var(--text)] text-sm">← Retour</a></div>
        <div class="glass rounded-xl p-6">
            <form method="POST"
                action="{{ $action === 'edit' ? route('admin.projects.update', $project) : route('admin.projects.store') }}"
                class="space-y-5">
                @csrf
                @if($action === 'edit') @method('PUT') @endif

                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-[var(--muted)] mb-1.5">Titre <span
                                class="text-[var(--error)]">*</span></label>
                        <input type="text" name="title" required value="{{ old('title', $project->title) }}"
                            class="form-input">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[var(--muted)] mb-1.5">Client <span
                                class="text-[var(--error)]">*</span></label>
                        <input type="text" name="client" required value="{{ old('client', $project->client) }}"
                            class="form-input">
                    </div>
                </div>
                <div class="grid sm:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-[var(--muted)] mb-1.5">Année <span
                                class="text-[var(--error)]">*</span></label>
                        <input type="number" name="year" required value="{{ old('year', $project->year ?? date('Y')) }}"
                            class="form-input" min="2000" max="2099">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[var(--muted)] mb-1.5">Emoji couverture</label>
                        <input type="text" name="cover_image"
                            value="{{ old('cover_image', $project->cover_image ?? '🖥️') }}" class="form-input"
                            placeholder="🖥️">
                    </div>
                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="featured" id="featured" value="1"
                            class="w-4 h-4 accent-[var(--warning)]" {{ old('featured', $project->featured) ? 'checked' :
                        '' }}>
                        <label for="featured" class="text-sm text-[var(--muted)]">Projet en vedette (Star)</label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[var(--muted)] mb-1.5">Tags</label>
                    <input type="text" name="tags"
                        value="{{ old('tags', is_array($project->tags) ? implode(', ', $project->tags) : $project->tags) }}"
                        class="form-input" placeholder="Web, Cloud, Réseau">
                    <p class="text-xs text-[var(--muted)] mt-1">Séparés par des virgules</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[var(--muted)] mb-1.5">Accroche <span
                            class="text-[var(--error)]">*</span></label>
                    <textarea name="excerpt" required rows="2"
                        class="form-input">{{ old('excerpt', $project->excerpt) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[var(--muted)] mb-1.5">Contenu détaillé <span
                            class="text-[var(--error)]">*</span></label>
                    <textarea name="content" required rows="8"
                        class="form-input font-mono text-xs">{{ old('content', $project->content) }}</textarea>
                </div>
                <div class="flex gap-3">
                    <button type="submit" class="btn-primary">{{ $action === 'edit' ? 'Mettre à jour' : 'Créer'
                        }}</button>
                    <a href="{{ route('admin.projects.index') }}" class="btn-outline">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</x-admin.layout>