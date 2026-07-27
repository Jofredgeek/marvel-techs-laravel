<x-layout title="Marvel Tech's — Solutions IT Professionnelles | Cameroun"
    description="Marvel Tech's, votre expert IT premium au Cameroun. Maintenance, réseaux, cybersécurité, développement web, cloud & DevOps. Intervention rapide, résultats garantis.">

{{-- ═══════════════════════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════════════════════ --}}
<section class="relative flex items-center justify-center overflow-hidden pt-28 pb-20">


    {{-- Background --}}
    <div class="absolute inset-0" style="background: var(--hero-grad);"></div>

    {{-- Grid overlay --}}
    <div class="absolute inset-0 hero-grid opacity-60"></div>

    {{-- Animated orbs --}}
    <div class="hero-glow w-[600px] h-[600px] -top-32 -right-32 opacity-20"
         style="background: radial-gradient(circle, rgba(144,97,255,0.6) 0%, transparent 70%);"></div>
    <div class="hero-glow w-[400px] h-[400px] -bottom-20 -left-20 opacity-15"
         style="background: radial-gradient(circle, rgba(6,182,212,0.5) 0%, transparent 70%); animation-delay: -3s;"></div>
    <div class="hero-glow w-[300px] h-[300px] top-1/2 left-1/3 opacity-10"
         style="background: radial-gradient(circle, rgba(144,97,255,0.4) 0%, transparent 70%); animation-delay: -1.5s;"></div>

    {{-- Scan line effect --}}
    <div class="scan-line opacity-20"></div>

    {{-- Floating particles --}}
    @for ($i = 0; $i < 8; $i++)
    <div class="particle"
         style="
            left: {{ rand(5, 95) }}%;
            bottom: {{ rand(10, 40) }}%;
            --duration: {{ rand(4, 8) }}s;
            --delay: {{ rand(0, 4) }}s;
            width: {{ rand(3, 6) }}px;
            height: {{ rand(3, 6) }}px;
            opacity: {{ rand(3, 7) / 10 }};
         "></div>
    @endfor

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">

        {{-- Badge --}}
        <div class="inline-flex items-center gap-2 mb-6 px-4 py-2 rounded-full glass border border-[rgba(144,97,255,0.25)] reveal">
            <span class="dot-pulse"></span>
            <span class="text-xs font-semibold text-[var(--primary)] tracking-wide">Expert IT Premium — Cameroun & International</span>
        </div>

        {{-- Heading --}}
        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold leading-tight mb-6 reveal" style="font-family: var(--font-display);">
            <span class="block text-[var(--heading)]">L'Excellence IT</span>
            <span class="block text-gradient mt-2">au Service de</span>
            <span class="block text-[var(--heading)]">votre Business</span>
        </h1>

        {{-- Subheading --}}
        <p class="text-lg sm:text-xl text-[var(--muted)] max-w-2xl mx-auto mb-8 leading-relaxed reveal">
            Marvel Tech's transforme vos défis technologiques en avantages concurrentiels.
            <span class="text-[var(--text)] font-medium">Maintenance, réseaux, cybersécurité, cloud, développement</span> —
            une expertise complète pour propulser votre entreprise.
        </p>

        {{-- CTA buttons --}}
        <div class="flex flex-wrap justify-center gap-4 mb-12 reveal">
            <a href="{{ route('quote') }}" class="btn-primary text-base px-8 py-4 shadow-[0_8px_32px_rgba(144,97,255,0.40)]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Obtenir un devis gratuit
            </a>
            <a href="{{ route('services.index') }}" class="btn-outline text-base px-8 py-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                Découvrir nos services
            </a>
        </div>

        {{-- Trust indicators --}}
        <div class="flex flex-wrap justify-center items-center gap-6 text-xs text-[var(--muted)] reveal">
            @foreach([
                ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'text' => 'Intervention sous 24h'],
                ['icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z', 'text' => 'Données 100% sécurisées'],
                ['icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z', 'text' => 'Satisfaction garantie'],
                ['icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'text' => 'Support international'],
            ] as $item)
            <div class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-[#9061ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                </svg>
                {{ $item['text'] }}
            </div>
            @endforeach
        </div>

        {{-- Stats row --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-14 max-w-3xl mx-auto reveal">
            @foreach([
                ['number' => '150+', 'label' => 'Clients satisfaits'],
                ['number' => '8+',   'label' => 'Années d\'expertise'],
                ['number' => '500+', 'label' => 'Projets livrés'],
                ['number' => '99%',  'label' => 'Taux de satisfaction'],
            ] as $stat)
            <div class="stat-card">
                <div class="stat-number mb-1">{{ $stat['number'] }}</div>
                <div class="text-xs text-[var(--muted)] font-medium leading-tight">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>



{{-- ═══════════════════════════════════════════════════════
     SERVICES SECTION
═══════════════════════════════════════════════════════ --}}
<section class="py-24 relative overflow-hidden" id="services">
    <div class="absolute inset-0 bg-[var(--bg-2)]"></div>
    <div class="absolute top-0 right-0 w-96 h-96 rounded-full blur-[150px] opacity-10"
         style="background: rgba(144,97,255,0.5);"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section header --}}
        <div class="text-center mb-16 reveal">
            <div class="section-label justify-center">Nos expertises</div>
            <h2 class="text-4xl sm:text-5xl font-extrabold text-[var(--heading)] mb-4" style="font-family: var(--font-display);">
                Des Services IT <span class="text-gradient-violet">Complets</span>
            </h2>
            <p class="text-[var(--muted)] text-lg max-w-2xl mx-auto">
                De la maintenance quotidienne à la transformation digitale, nous couvrons l'ensemble de vos besoins technologiques.
            </p>
        </div>

        {{-- Services grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($services as $i => $service)
            <div class="glass-card p-6 reveal" style="transition-delay: {{ $i * 80 }}ms;">
                <div class="service-icon mb-4 text-2xl" aria-hidden="true">
                    {{ $service->icon ?: '🔧' }}
                </div>

                <h3 class="text-base font-bold text-[var(--heading)] mb-2 leading-tight">{{ $service->title }}</h3>
                <p class="text-[var(--muted)] text-sm leading-relaxed mb-4">{{ $service->excerpt }}</p>

                {{-- Tags --}}
                <div class="flex flex-wrap gap-1.5 mb-5">
                    @foreach((array) $service->technologies as $tag)
                    <span class="tech-tag">{{ $tag }}</span>
                    @endforeach
                </div>

                <a href="{{ route('services.show', $service->slug) }}"
                   class="inline-flex items-center gap-1.5 text-sm font-semibold text-[var(--primary)] hover:gap-2.5 transition-all duration-200 group">
                    En savoir plus
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
            @empty
            <div class="glass-card p-8 text-center text-[var(--muted)] md:col-span-2 lg:col-span-3">
                Nos services seront bientôt disponibles.
            </div>
            @endforelse
        </div>

        {{-- CTA --}}
        <div class="text-center mt-12 reveal">
            <a href="{{ route('services.index') }}" class="btn-outline px-8 py-3.5">
                Voir tous nos services
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════
     WHY US SECTION
═══════════════════════════════════════════════════════ --}}
<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-[var(--bg)]"></div>
    <div class="absolute inset-0">
        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-72 h-72 rounded-full blur-[120px] opacity-10"
             style="background: rgba(6,182,212,0.6);"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- Left: Text --}}
            <div class="reveal-left">
                <div class="section-label">Pourquoi nous choisir</div>
                <h2 class="text-4xl sm:text-5xl font-extrabold text-[var(--heading)] mb-6 leading-tight" style="font-family: var(--font-display);">
                    Votre Partenaire IT<br>
                    <span class="text-gradient">de Confiance</span>
                </h2>
                <p class="text-[var(--muted)] text-lg leading-relaxed mb-8">
                    Depuis plus de 8 ans, Marvel Tech's accompagne les entreprises dans leur transformation digitale avec une approche centrée sur la performance, la sécurité et la satisfaction client.
                </p>

                {{-- Features list --}}
                <div class="space-y-4">
                    @foreach([
                        ['title' => 'Expertise certifiée', 'desc' => 'Ingénieurs certifiés Microsoft, Cisco, AWS et CompTIA avec des années d\'expérience terrain.'],
                        ['title' => 'Réactivité garantie', 'desc' => 'Astreinte 24/7, intervention en moins de 4h en urgence. Votre activité ne s\'arrête jamais.'],
                        ['title' => 'Approche sur mesure', 'desc' => 'Chaque solution est adaptée à vos contraintes métier, votre budget et vos objectifs.'],
                        ['title' => 'Transparence totale', 'desc' => 'Rapports détaillés, tableaux de bord en temps réel. Vous savez toujours ce qui se passe.'],
                    ] as $feat)
                    <div class="flex gap-4 p-4 rounded-xl border border-[var(--border-soft)] hover:border-[rgba(144,97,255,0.25)] hover:bg-[var(--surface-2)] transition-all duration-300 group">
                        <div class="feature-check mt-0.5">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-[var(--heading)] mb-0.5 group-hover:text-[var(--primary)] transition-colors">{{ $feat['title'] }}</h4>
                            <p class="text-sm text-[var(--muted)] leading-relaxed">{{ $feat['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Right: Visual card stack --}}
            <div class="reveal-right">
                <div class="relative">
                    {{-- Background decorative card --}}
                    <div class="absolute top-4 right-4 w-full h-full rounded-2xl border border-[rgba(144,97,255,0.15)]"
                         style="background: rgba(144,97,255,0.04);"></div>
                    <div class="absolute top-2 right-2 w-full h-full rounded-2xl border border-[rgba(144,97,255,0.10)]"
                         style="background: rgba(144,97,255,0.03);"></div>

                    {{-- Main card --}}
                    <div class="relative glass-card p-8">
                        {{-- Header --}}
                        <div class="flex items-center justify-between mb-6 pb-4 border-b border-[var(--border)]">
                            <div>
                                <h4 class="font-bold text-[var(--heading)]">Dashboard IT</h4>
                                <p class="text-xs text-[var(--muted)]">Marvel Tech's • {{ date('Y') }}</p>
                            </div>
                            <div class="flex gap-1.5">
                                <span class="w-3 h-3 rounded-full bg-[#fb7185]"></span>
                                <span class="w-3 h-3 rounded-full bg-[#fbbf24]"></span>
                                <span class="w-3 h-3 rounded-full bg-[#34d399]"></span>
                            </div>
                        </div>

                        {{-- Stats grid --}}
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            @foreach([
                                ['label' => 'Uptime', 'value' => '99.9%', 'color' => 'success'],
                                ['label' => 'Tickets résolus', 'value' => '1,248', 'color' => 'primary'],
                                ['label' => 'Incidents critiques', 'value' => '0', 'color' => 'success'],
                                ['label' => 'Satisfaction', 'value' => '4.9/5', 'color' => 'primary'],
                            ] as $kpi)
                            <div class="p-3 rounded-xl bg-[var(--surface-2)] border border-[var(--border-soft)]">
                                <div class="text-[10px] text-[var(--muted)] uppercase tracking-wider mb-1">{{ $kpi['label'] }}</div>
                                <div class="text-xl font-extrabold {{ $kpi['color'] === 'primary' ? 'text-[#9061ff]' : 'text-[var(--success)]' }}">
                                    {{ $kpi['value'] }}
                                </div>
                            </div>
                            @endforeach
                        </div>

                        {{-- Skills --}}
                        <div class="space-y-3">
                            @foreach([
                                ['label' => 'Réseaux & Infrastructure', 'pct' => 95],
                                ['label' => 'Cybersécurité', 'pct' => 90],
                                ['label' => 'Cloud & DevOps', 'pct' => 88],
                                ['label' => 'Développement', 'pct' => 92],
                            ] as $skill)
                            <div>
                                <div class="flex justify-between text-xs mb-1">
                                    <span class="text-[var(--muted)]">{{ $skill['label'] }}</span>
                                    <span class="font-semibold text-[var(--primary)]">{{ $skill['pct'] }}%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-progress" style="width: {{ $skill['pct'] }}%;"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        {{-- Bottom badge --}}
                        <div class="mt-6 flex items-center justify-center gap-2 p-3 rounded-xl bg-[rgba(144,97,255,0.06)] border border-[rgba(144,97,255,0.15)]">
                            <svg class="w-4 h-4 text-[#9061ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <span class="text-xs font-semibold text-[var(--primary)]">ISO 27001 • RGPD Compliant • Certifié</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════
     PROCESS SECTION
═══════════════════════════════════════════════════════ --}}
<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-[var(--bg-2)]"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-px" style="background: linear-gradient(90deg, transparent, rgba(144,97,255,0.3), transparent);"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
            <div class="section-label justify-center">Notre méthode</div>
            <h2 class="text-4xl sm:text-5xl font-extrabold text-[var(--heading)] mb-4" style="font-family: var(--font-display);">
                Comment nous <span class="text-gradient-violet">travaillons</span>
            </h2>
            <p class="text-[var(--muted)] text-lg max-w-xl mx-auto">
                Un processus structuré, transparent et orienté résultats pour chaque projet.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['num' => '01', 'icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z', 'title' => 'Analyse & Audit', 'desc' => 'Évaluation complète de votre infrastructure existante, identification des risques et des opportunités d\'amélioration.'],
                ['num' => '02', 'icon' => 'M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2', 'title' => 'Planification', 'desc' => 'Élaboration d\'une feuille de route personnalisée avec budgets, délais et indicateurs de performance clairs.'],
                ['num' => '03', 'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4', 'title' => 'Déploiement', 'desc' => 'Implémentation agile avec tests rigoureux, documentation complète et formation de vos équipes.'],
                ['num' => '04', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'title' => 'Suivi & Optimisation', 'desc' => 'Monitoring continu, rapports mensuels, optimisations proactives et support dédié pour votre succès.'],
            ] as $i => $step)
            <div class="glass-card p-6 text-center reveal" style="transition-delay: {{ $i * 100 }}ms;">
                <div class="step-number mx-auto mb-4">{{ $step['num'] }}</div>
                <div class="w-12 h-12 rounded-xl bg-[rgba(144,97,255,0.08)] border border-[rgba(144,97,255,0.15)] flex items-center justify-center mx-auto mb-4 text-[#9061ff]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $step['icon'] }}" />
                    </svg>
                </div>
                <h3 class="font-bold text-[var(--heading)] mb-2">{{ $step['title'] }}</h3>
                <p class="text-sm text-[var(--muted)] leading-relaxed">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════
     TECHNOLOGIES SECTION
═══════════════════════════════════════════════════════ --}}
<section class="py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-[var(--bg)]"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 reveal">
            <div class="section-label justify-center">Stack technique</div>
            <h2 class="text-3xl font-extrabold text-[var(--heading)]" style="font-family: var(--font-display);">
                Technologies <span class="text-gradient">Maîtrisées</span>
            </h2>
        </div>

        <div class="flex flex-wrap justify-center gap-3 reveal">
            @foreach([
                'Linux', 'Windows Server', 'Cisco', 'VMware', 'Docker', 'Kubernetes',
                'AWS', 'Azure', 'Google Cloud', 'Laravel', 'React', 'Node.js',
                'Flutter', 'Python', 'PostgreSQL', 'MongoDB', 'Redis', 'Nginx',
                'Terraform', 'Ansible', 'Grafana', 'Prometheus', 'Zabbix', 'Wazuh',
            ] as $tech)
            <span class="tech-tag px-4 py-2 text-sm cursor-default hover:shadow-[0_4px_16px_rgba(144,97,255,0.25)] transition-shadow">
                {{ $tech }}
            </span>
            @endforeach
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════
     TESTIMONIALS SECTION
═══════════════════════════════════════════════════════ --}}
<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-[var(--bg-2)]"></div>
    <div class="absolute top-0 right-0 w-96 h-96 rounded-full blur-[150px] opacity-08"
         style="background: rgba(144,97,255,0.4);"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
            <div class="section-label justify-center">Témoignages</div>
            <h2 class="text-4xl sm:text-5xl font-extrabold text-[var(--heading)] mb-4" style="font-family: var(--font-display);">
                Ce que disent <span class="text-gradient-violet">nos clients</span>
            </h2>
            <p class="text-[var(--muted)] text-lg max-w-xl mx-auto">
                La satisfaction de nos clients est notre meilleure récompense.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach([
                ['name' => 'Jean-Marie Nkomo', 'role' => 'DSI, Banque Atlantique', 'rating' => 5, 'text' => 'Marvel Tech\'s a complètement transformé notre infrastructure. Zéro incident critique depuis 18 mois et une disponibilité de 99.9%. Une équipe d\'experts vraiment remarquable.', 'avatar' => 'JN'],
                ['name' => 'Sandrine Eyenga', 'role' => 'CEO, StartupCM', 'rating' => 5, 'text' => 'Nous avons fait appel à eux pour notre plateforme e-commerce. Livraison en avance sur le planning, qualité irréprochable. Je les recommande les yeux fermés.', 'avatar' => 'SE'],
                ['name' => 'Patrick Mballa', 'role' => 'Directeur IT, MinFin', 'rating' => 5, 'text' => 'L\'audit de cybersécurité réalisé par Marvel Tech\'s a révélé des failles critiques que nous avions manquées. Leur expertise a été déterminante pour notre conformité RGPD.', 'avatar' => 'PM'],
            ] as $i => $t)
            <div class="testimonial-card reveal" style="transition-delay: {{ $i * 100 }}ms;">
                {{-- Stars --}}
                <div class="flex gap-1 mb-4">
                    @for($s = 0; $s < $t['rating']; $s++)
                    <svg class="w-4 h-4 text-[#fbbf24]" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    @endfor
                </div>

                <p class="text-[var(--text)] text-sm leading-relaxed mb-5 italic">"{{ $t['text'] }}"</p>

                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#9061ff] to-[#7040e0] flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                        {{ $t['avatar'] }}
                    </div>
                    <div>
                        <div class="font-semibold text-[var(--heading)] text-sm">{{ $t['name'] }}</div>
                        <div class="text-xs text-[var(--muted)]">{{ $t['role'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════
     PRICING SECTION
═══════════════════════════════════════════════════════ --}}
<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-[var(--bg)]"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
            <div class="section-label justify-center">Tarifs transparents</div>
            <h2 class="text-4xl sm:text-5xl font-extrabold text-[var(--heading)] mb-4" style="font-family: var(--font-display);">
                Des Forfaits <span class="text-gradient">Adaptés</span>
            </h2>
            <p class="text-[var(--muted)] text-lg max-w-xl mx-auto">
                Transparence totale, sans surprise. Choisissez le plan qui correspond à vos besoins.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
            @foreach([
                [
                    'name'    => 'Starter',
                    'price'   => '75 000',
                    'period'  => '/mois',
                    'desc'    => 'Idéal pour les TPE et startups',
                    'popular' => false,
                    'features'=> ['Support 8h-18h en semaine', 'Maintenance préventive mensuelle', 'Backup hebdomadaire', '5 tickets/mois inclus', 'Rapport mensuel'],
                ],
                [
                    'name'    => 'Business',
                    'price'   => '150 000',
                    'period'  => '/mois',
                    'desc'    => 'Pour les PME en croissance',
                    'popular' => true,
                    'features'=> ['Support 24/7 prioritaire', 'Maintenance préventive bimensuelle', 'Backup quotidien', 'Tickets illimités', 'Audit sécurité trimestriel', 'Dashboard en temps réel', 'SLA garanti 4h'],
                ],
                [
                    'name'    => 'Enterprise',
                    'price'   => 'Sur mesure',
                    'period'  => '',
                    'desc'    => 'Solutions pour grandes entreprises',
                    'popular' => false,
                    'features'=> ['Support dédié 24/7', 'Ingénieur dédié on-site', 'Backup temps réel', 'Pentest annuel inclus', 'SLA garanti 1h', 'Formation équipes', 'Intégration systèmes'],
                ],
            ] as $i => $plan)
            <div class="pricing-card {{ $plan['popular'] ? 'popular' : '' }} reveal" style="transition-delay: {{ $i * 100 }}ms;">
                @if($plan['popular'])
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2">
                    <span class="pricing-popular-badge">⭐ Plus populaire</span>
                </div>
                @endif

                <div class="mb-5">
                    <h3 class="font-bold text-[var(--heading)] text-lg mb-1">{{ $plan['name'] }}</h3>
                    <p class="text-xs text-[var(--muted)]">{{ $plan['desc'] }}</p>
                </div>

                <div class="mb-6 pb-5 border-b border-[var(--border)]">
                    <span class="text-4xl font-extrabold {{ $plan['popular'] ? 'text-gradient-violet' : 'text-[var(--heading)]' }}">
                        {{ $plan['price'] }}
                    </span>
                    @if($plan['period'])
                    <span class="text-sm text-[var(--muted)] ml-1">XAF{{ $plan['period'] }}</span>
                    @endif
                </div>

                <ul class="space-y-3 mb-6">
                    @foreach($plan['features'] as $feat)
                    <li class="flex items-start gap-2.5">
                        <div class="feature-check mt-0.5">
                            <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="text-sm text-[var(--muted)]">{{ $feat }}</span>
                    </li>
                    @endforeach
                </ul>

                <a href="{{ route('quote') }}"
                   class="{{ $plan['popular'] ? 'btn-primary w-full justify-center' : 'btn-outline w-full justify-center' }} py-3 text-sm">
                    {{ $plan['name'] === 'Enterprise' ? 'Nous contacter' : 'Commencer maintenant' }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════
     CTA FINAL SECTION
═══════════════════════════════════════════════════════ --}}
<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-[var(--bg-2)]"></div>
    <div class="absolute inset-0 hero-grid opacity-30"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="cta-section px-8 py-16 text-center reveal">
            {{-- Background orbs --}}
            <div class="absolute top-0 left-1/4 w-64 h-64 rounded-full blur-[100px] opacity-15"
                 style="background: rgba(144,97,255,0.7); pointer-events: none;"></div>
            <div class="absolute bottom-0 right-1/4 w-48 h-48 rounded-full blur-[80px] opacity-10"
                 style="background: rgba(6,182,212,0.7); pointer-events: none;"></div>

            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 mb-4 px-3 py-1.5 rounded-full bg-[rgba(144,97,255,0.12)] border border-[rgba(144,97,255,0.25)] text-[var(--primary)] text-xs font-semibold">
                    <span class="dot-pulse"></span>
                    Consultation gratuite disponible maintenant
                </div>

                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-[var(--heading)] mb-5 leading-tight" style="font-family: var(--font-display);">
                    Prêt à Transformer<br>
                    <span class="text-gradient">votre Infrastructure IT ?</span>
                </h2>

                <p class="text-[var(--muted)] text-xl max-w-2xl mx-auto mb-8">
                    Obtenez un audit gratuit de votre système en 48h. Nos experts analysent vos besoins et vous proposent les meilleures solutions.
                </p>

                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('quote') }}" class="btn-primary text-base px-10 py-4 shadow-[0_12px_40px_rgba(144,97,255,0.50)]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Demander mon audit gratuit
                    </a>
                    <a href="{{ route('contact') }}" class="btn-outline text-base px-10 py-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Parler à un expert
                    </a>
                </div>

                <div class="flex flex-wrap justify-center gap-6 mt-8 text-sm text-[var(--muted)]">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-[var(--success)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Sans engagement
                    </span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-[var(--success)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Réponse sous 24h
                    </span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-[var(--success)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        100% confidentiel
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
// Enhanced scroll reveal with stagger support
document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.10, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.reveal, .reveal-left, .reveal-right').forEach(el => {
        observer.observe(el);
    });

    // Counter animation
    const counters = document.querySelectorAll('.stat-number');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = el.textContent;
                const num = parseFloat(target.replace(/[^0-9.]/g, ''));
                const suffix = target.replace(/[0-9.]/g, '');
                let current = 0;
                const step = num / 50;
                const timer = setInterval(() => {
                    current += step;
                    if (current >= num) {
                        current = num;
                        clearInterval(timer);
                    }
                    el.textContent = (Number.isInteger(num) ? Math.round(current) : current.toFixed(1)) + suffix;
                }, 30);
                counterObserver.unobserve(el);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(c => counterObserver.observe(c));
});
</script>
@endpush

</x-layout>
