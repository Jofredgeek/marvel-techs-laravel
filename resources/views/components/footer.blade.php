<footer class="relative border-t border-[var(--border)] overflow-hidden" aria-label="Pied de page">
    {{-- Background glow --}}
    <div class="absolute top-0 left-1/4 w-96 h-64 rounded-full blur-[120px] bg-[rgba(144,97,255,0.07)] pointer-events-none"></div>
    <div class="absolute bottom-0 right-1/4 w-64 h-48 rounded-full blur-[100px] bg-[rgba(6,182,212,0.05)] pointer-events-none"></div>

    <div class="relative bg-[var(--surface)] pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Main grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 mb-12">

                {{-- Brand Column (2 cols) --}}
                <div class="lg:col-span-2">
                    {{-- Logo --}}
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#9061ff] to-[#7040e0] flex items-center justify-center shadow-[0_4px_16px_rgba(144,97,255,0.40)]">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2"
                                    d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-lg font-extrabold text-gradient-violet tracking-tight block leading-tight">Marvel Tech's</span>
                            <span class="text-[10px] font-semibold text-[var(--muted)] uppercase tracking-widest">IT Solutions Premium</span>
                        </div>
                    </div>

                    <p class="text-[var(--muted)] text-sm leading-relaxed mb-5 max-w-sm">
                        Votre partenaire technologique de confiance pour la maintenance IT, réseaux, cybersécurité, cloud et développement web. Basé au Cameroun, disponible partout.
                    </p>

                    {{-- Social links --}}
                    <div class="flex gap-2 mb-6">
                        @foreach([
                            ['label' => 'LinkedIn', 'href' => '#', 'icon' => 'M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z'],
                            ['label' => 'Twitter/X', 'href' => '#', 'icon' => 'M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.747l7.73-8.835L1.254 2.25H8.08l4.259 5.63 5.905-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z'],
                            ['label' => 'GitHub',   'href' => '#', 'icon' => 'M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12'],
                        ] as $s)
                        <a href="{{ $s['href'] }}"
                           class="w-9 h-9 rounded-xl border border-[var(--border)] flex items-center justify-center text-[var(--muted)] hover:text-white hover:bg-[#9061ff] hover:border-[#9061ff] hover:shadow-[0_4px_16px_rgba(144,97,255,0.40)] transition-all duration-300"
                           aria-label="{{ $s['label'] }}">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="{{ $s['icon'] }}" />
                            </svg>
                        </a>
                        @endforeach
                    </div>

                    {{-- Status badge --}}
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[rgba(52,211,153,0.10)] border border-[rgba(52,211,153,0.25)]">
                        <span class="dot-pulse"></span>
                        <span class="text-xs font-semibold text-[var(--success)]">Disponible — Réponse sous 24h</span>
                    </div>
                </div>

                {{-- Services --}}
                <div>
                    <h3 class="section-label mb-4">Services</h3>
                    <ul class="space-y-2.5">
                        @foreach([
                            'Maintenance & Support IT'       => 'maintenance-support-it',
                            'Réseaux & Administration'       => 'reseaux-administration-systemes',
                            'Développement Web & Mobile'    => 'developpement-web-mobile',
                            'Cloud & DevOps'                 => 'cloud-devops',
                            'Cybersécurité & Audit'         => 'cybersecurite-audit',
                            'Sauvegarde & Continuité'       => 'sauvegarde-continuite-activite',
                        ] as $label => $slug)
                        <li>
                            <a href="{{ route('services.show', $slug) }}"
                               class="flex items-center gap-2 text-[var(--muted)] text-sm hover:text-[var(--primary)] transition-colors duration-200 group">
                                <svg class="w-3 h-3 text-[rgba(144,97,255,0.4)] group-hover:text-[#9061ff] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                                </svg>
                                {{ $label }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Entreprise --}}
                <div>
                    <h3 class="section-label mb-4">Entreprise</h3>
                    <ul class="space-y-2.5">
                        @foreach([
                            'À propos'        => 'about',
                            'Réalisations'    => 'portfolio.index',
                            'Blog Tech'       => 'blog.index',
                            'Contact'         => 'contact',
                            'Devis gratuit'   => 'quote',
                            'Administration'  => 'login',
                        ] as $label => $routeName)
                        <li>
                            <a href="{{ route($routeName) }}"
                               class="flex items-center gap-2 text-[var(--muted)] text-sm hover:text-[var(--primary)] transition-colors duration-200 group">
                                <svg class="w-3 h-3 text-[rgba(144,97,255,0.4)] group-hover:text-[#9061ff] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                                </svg>
                                {{ $label }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Contact --}}
                <div>
                    <h3 class="section-label mb-4">Contact</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <div class="w-7 h-7 rounded-lg bg-[rgba(144,97,255,0.10)] border border-[rgba(144,97,255,0.20)] flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-3.5 h-3.5 text-[#9061ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <span class="text-[var(--muted)] text-sm">Yaoundé, Cameroun</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-lg bg-[rgba(144,97,255,0.10)] border border-[rgba(144,97,255,0.20)] flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5 text-[#9061ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <a href="mailto:contact@marveltechs.cm" class="text-[var(--muted)] text-sm hover:text-[var(--primary)] transition-colors">contact@marveltechs.cm</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-lg bg-[rgba(144,97,255,0.10)] border border-[rgba(144,97,255,0.20)] flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5 text-[#9061ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <a href="tel:+2376XXXXXXX" class="text-[var(--muted)] text-sm hover:text-[var(--primary)] transition-colors">+237 6XX XXX XXX</a>
                        </li>
                    </ul>

                    {{-- CTA --}}
                    <a href="{{ route('quote') }}" class="btn-primary text-sm py-2.5 px-4 mt-5 inline-flex">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Demander un devis
                    </a>
                </div>
            </div>

            {{-- Divider --}}
            <div class="section-divider mb-6"></div>

            {{-- Bottom bar --}}
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-[var(--muted)] text-xs">
                    © {{ date('Y') }} <span class="text-[var(--primary)] font-semibold">Marvel Tech's</span>. Tous droits réservés.
                </p>
                <div class="flex items-center gap-4 text-[var(--muted)] text-xs">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-[#9061ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        Conçu pour l'Afrique & le monde
                    </span>
                    <span class="flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#9061ff] inline-block"></span>
                        Laravel 11 + Vite
                    </span>
                </div>
            </div>

        </div>
    </div>
</footer>