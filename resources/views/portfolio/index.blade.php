<x-layout title="Réalisations & Portfolio | Marvel Tech's"
    description="Découvrez les projets IT réalisés par Marvel Tech's : sites web, infrastructures réseau, audits sécurité, migration cloud et plus encore.">
    <div class="pt-28 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-title tag="Portfolio" title="Nos réalisations">
                Des projets concrets, des défis relevés, des clients satisfaits.
            </x-section-title>

            {{-- Alpine filter --}}
            <div x-data="{
                activeFilter: 'Tous',
                filters: ['Tous', ...{{ Js::from($filters) }}],
                projects: {{ Js::from($projects) }},
                portfolioBase: {{ Js::from(route('portfolio.index')) }},
                get filtered() {
                    if (this.activeFilter === 'Tous') return this.projects;
                    return this.projects.filter(p => {
                    return (p.tags || []).includes(this.activeFilter);
                    });
                }
            }">
                {{-- Filter buttons --}}
                <div class="flex flex-wrap gap-4 text-[var(--muted)] text-sm">
                    <template x-for="f in filters" :key="f">
                        <button @click="activeFilter = f"
                            :class="activeFilter === f ? 'bg-[var(--primary)] text-[var(--primary-foreground)] border-[var(--primary)]' : 'border-[var(--border)] text-[var(--muted)] hover:border-[var(--primary)] hover:text-[var(--text)]'"
                            class="px-4 py-2 rounded-full text-sm font-semibold border transition-all duration-200"
                            x-text="f"></button>
                    </template>
                </div>

                {{-- Projects grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="project in filtered" :key="project.id">
                        <a :href="`${portfolioBase}/${encodeURIComponent(project.slug)}`"
                            class="group glass glass-hover rounded-xl overflow-hidden block">
                            <div
                                class="h-48 bg-gradient-to-br from-[var(--primary)]/10 via-[var(--secondary)]/10 to-[var(--success)]/10 flex items-center justify-center">
                                <span class="text-6xl" x-text="project.cover_image || '🖥️'"></span>
                            </div>
                            <div class="p-5">
                                <div class="flex flex-wrap gap-1.5 mb-3">
                                    <template x-for="tag in (project.tags || [])" :key="tag">
                                        <span class="badge badge-cyan" x-text="tag"></span>
                                    </template>
                                </div>
                                <h3 class="font-bold text-[var(--heading)] group-hover:text-[var(--primary)] transition-colors mb-1"
                                    x-text="project.title"></h3>
                                <p class="text-[var(--muted)] text-xs" x-text="`${project.client} · ${project.year}`">
                                </p>
                            </div>
                        </a>
                    </template>
                </div>

                {{-- Empty state --}}
                <div x-cloak x-show="filtered.length === 0" class="text-center py-16 text-[var(--muted)]">
                    <div class="text-5xl mb-4">🔍</div>
                    <p>Aucun projet dans cette catégorie pour le moment.</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
