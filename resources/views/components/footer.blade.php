<footer class="border-t border-slate-800/60 bg-[#080c16]" aria-label="Pied de page">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-14 pb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
            {{-- Brand --}}
            <div>
                <div class="text-xl font-extrabold text-gradient-cyan mb-3">Marvel Tech's</div>
                <p class="text-slate-400 text-sm leading-relaxed mb-4">
                    Solutions IT modernes pour entreprises et particuliers. Réseaux, cloud, cybersécurité, développement
                    web et support informatique.
                </p>
                <div class="flex gap-3 mt-4">
                    <a href="#"
                        class="w-9 h-9 rounded-lg border border-slate-700 flex items-center justify-center text-slate-400 hover:text-neon-cyan hover:border-neon-cyan/40 transition-all"
                        aria-label="LinkedIn">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-9 h-9 rounded-lg border border-slate-700 flex items-center justify-center text-slate-400 hover:text-neon-cyan hover:border-neon-cyan/40 transition-all"
                        aria-label="Twitter/X">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.747l7.73-8.835L1.254 2.25H8.08l4.259 5.63 5.905-5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-9 h-9 rounded-lg border border-slate-700 flex items-center justify-center text-slate-400 hover:text-neon-cyan hover:border-neon-cyan/40 transition-all"
                        aria-label="GitHub">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Services --}}
            <div>
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Services</h3>
                <ul class="space-y-2">
                    @foreach([
                    'Maintenance & Support IT' => 'maintenance-support-it',
                    'Réseaux & Administration' => 'reseaux-administration-systemes',
                    'Développement Web & Mobile' => 'developpement-web-mobile',
                    'Cloud & DevOps' => 'cloud-devops',
                    'Cybersécurité & Audit' => 'cybersecurite-audit',
                    'Sauvegarde & Continuité' => 'sauvegarde-continuite-activite',
                    ] as $label => $slug)
                    <li>
                        <a href="{{ route('services.show', $slug) }}"
                            class="text-slate-400 text-sm hover:text-neon-cyan transition-colors">{{ $label }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Liens --}}
            <div>
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Entreprise</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('about') }}"
                            class="text-slate-400 text-sm hover:text-neon-cyan transition-colors">À propos</a></li>
                    <li><a href="{{ route('portfolio.index') }}"
                            class="text-slate-400 text-sm hover:text-neon-cyan transition-colors">Réalisations</a></li>
                    <li><a href="{{ route('blog.index') }}"
                            class="text-slate-400 text-sm hover:text-neon-cyan transition-colors">Blog</a></li>
                    <li><a href="{{ route('contact') }}"
                            class="text-slate-400 text-sm hover:text-neon-cyan transition-colors">Contact</a></li>
                    <li><a href="{{ route('quote') }}"
                            class="text-slate-400 text-sm hover:text-neon-cyan transition-colors">Demander un devis</a>
                    </li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Contact</h3>
                <ul class="space-y-3 text-slate-400 text-sm">
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-neon-cyan mt-0.5 shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Yaoundé, Cameroun
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-neon-cyan shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        contact@marveltechs.cm
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-neon-cyan shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        +237 6XX XXX XXX
                    </li>
                    <li class="mt-3">
                        <span class="badge badge-emerald">
                            <span class="w-1.5 h-1.5 rounded-full bg-neon-emerald animate-pulse"></span>
                            Réponse sous 24h
                        </span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="section-divider mb-6"></div>

        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-slate-500 text-xs">
            <p>© {{ date('Y') }} Marvel Tech's. Tous droits réservés.</p>
            <p>Conçu avec ❤️ pour l'Afrique & le monde</p>
        </div>
    </div>
</footer>