<x-admin.layout title="{{ $action === 'edit' ? 'Modifier : ' . $service->title : 'Nouveau service' }}">
    <div class="max-w-2xl">
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('admin.services.index') }}" class="text-[var(--muted)] hover:text-[var(--text)] text-sm">←
                Retour</a>
        </div>

        <div class="glass rounded-xl p-6">
            <form method="POST"
                action="{{ $action === 'edit' ? route('admin.services.update', $service) : route('admin.services.store') }}"
                class="space-y-5">
                @csrf
                @if($action === 'edit') @method('PUT') @endif

                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-[var(--muted)] mb-1.5">Titre <span
                                class="text-[var(--error)]">*</span></label>
                        <input type="text" name="title" required value="{{ old('title', $service->title) }}"
                            class="form-input" placeholder="Ex: Maintenance & Support IT">
                        @error('title')<p class="text-[var(--error)] text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[var(--muted)] mb-1.5">Icône (emoji)</label>
                        <input type="text" name="icon" value="{{ old('icon', $service->icon ?? '⚙️') }}"
                            class="form-input" placeholder="🔧">
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-[var(--muted)] mb-1.5">Ordre d'affichage</label>
                        <input type="number" name="sort_order"
                            value="{{ old('sort_order', $service->sort_order ?? 0) }}" class="form-input" min="0">
                    </div>
                    <div class="flex items-center gap-3 mt-5">
                        <input type="checkbox" name="active" id="active" value="1"
                            class="w-4 h-4 accent-[var(--primary)]" {{ old('active', $service->active ?? true) ?
                        'checked' : '' }}>
                        <label for="active" class="text-sm text-[var(--muted)]">Service actif (visible)</label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[var(--muted)] mb-1.5">Accroche <span
                            class="text-[var(--error)]">*</span></label>
                    <textarea name="excerpt" required rows="2" class="form-input"
                        placeholder="Courte description pour les listes (max 500 car.)">{{ old('excerpt', $service->excerpt) }}</textarea>
                    @error('excerpt')<p class="text-[var(--error)] text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-[var(--muted)] mb-1.5">Contenu complet <span
                            class="text-[var(--error)]">*</span></label>
                    <textarea name="content" required rows="8" class="form-input font-mono text-xs"
                        placeholder="Contenu détaillé du service...">{{ old('content', $service->content) }}</textarea>
                    <label class="block text-sm font-medium text-[var(--muted)] mb-1.5">Fonctionnalités /
                        bénéfices</label>
                    <textarea name="features" rows="5" class="form-input font-mono text-xs"
                        placeholder="Une ligne par fonctionnalité">{{ old('features', is_array($service->features) ? implode("\n", $service->features) : $service->features) }}</textarea>
                    <p class="text-xs text-[var(--muted)] opacity-60 mt-1">Une fonctionnalité par ligne</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[var(--muted)] mb-1.5">Technologies</label>
                    <input type="text" name="technologies" class="form-input" placeholder="Laravel, Docker, AWS"
                        value="{{ old('technologies', is_array($service->technologies) ? implode(', ', $service->technologies) : $service->technologies) }}">
                    <p class="text-xs text-[var(--muted)] opacity-60 mt-1">Séparées par des virgules</p>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="btn-primary">{{ $action === 'edit' ? 'Mettre à jour' : 'Créer le
                        service' }}</button>
                    <a href="{{ route('admin.services.index') }}" class="btn-outline">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</x-admin.layout>