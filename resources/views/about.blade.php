<x-layout title="À propos de Marvel Tech's | Mission, Valeurs, Compétences"
    description="Découvrez Marvel Tech's : notre mission, nos valeurs, notre équipe et notre expertise IT. Partenaire technologique basé au Cameroun.">
    <div class="pt-28 pb-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Hero --}}
            <div class="text-center mb-20">
                <x-badge color="cyan" class="mb-6">À propos</x-badge>
                <h1 class="text-4xl sm:text-5xl font-extrabold text-[var(--heading)] mb-6 mt-4">
                    Derrière <span class="text-gradient-cyan">Marvel Tech's</span>
                </h1>
                <p class="text-xl text-[var(--muted)] max-w-2xl mx-auto leading-relaxed">
                    Une équipe passionnée, des experts IT engagés à transformer votre infrastructure numérique avec
                    rigueur et innovation.
                </p>
            </div>

            {{-- Mission & Valeurs --}}
            <div class="grid md:grid-cols-2 gap-8 mb-20">
                <div class="glass rounded-xl p-8 reveal">
                    <div class="text-3xl mb-4">🎯</div>
                    <h2 class="text-2xl font-bold text-[var(--heading)] mb-4">Notre Mission</h2>
                    <p class="text-[var(--muted)] leading-relaxed">
                        Rendre les technologies de pointe accessibles à toutes les organisations, quelle que soit leur
                        taille. Nous croyons que chaque entreprise mérite une infrastructure IT robuste, sécurisée et
                        évolutive.
                    </p>
                    <p class="text-[var(--muted)] leading-relaxed mt-3">
                        Marvel Tech's accompagne TPE, PME et grandes structures dans leur transformation numérique, avec
                        expertise, pédagogie et transparence.
                    </p>
                </div>
                <div class="glass rounded-xl p-8 reveal">
                    <div class="text-3xl mb-4">💎</div>
                    <h2 class="text-2xl font-bold text-[var(--heading)] mb-4">Nos Valeurs</h2>
                    <ul class="space-y-3">
                        @foreach([
                        ['🔐', 'Intégrité', 'Transparence totale sur les solutions, les délais et les coûts.'],
                        ['⚡', 'Excellence', 'Chaque ligne de code, chaque câble réseau, chaque configuration est fait
                        avec soin.'],
                        ['🤝', 'Proximité', 'Vos projets sont nos projets. Nous sommes partenaires, pas juste
                        prestataires.'],
                        ['🔄', 'Amélioration continue', 'Certifications, veille technologique, formations
                        permanentes.'],
                        ] as [$icon, $title, $desc])
                        <li class="flex items-start gap-3">
                            <span class="text-xl">{{ $icon }}</span>
                            <div>
                                <span class="font-semibold text-[var(--heading)] text-sm">{{ $title }}</span>
                                <p class="text-[var(--muted)] text-sm">{{ $desc }}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Timeline --}}
            <div class="mb-20">
                <h2 class="text-2xl font-bold text-[var(--heading)] text-center mb-12">Notre Parcours</h2>
                <div class="relative max-w-3xl mx-auto">
                    <div class="timeline-line hidden sm:block"></div>
                    <div class="space-y-8">
                        @foreach([
                        ['2019', '🌱', 'Fondation', 'Création de Marvel Tech\'s à Yaoundé avec une équipe de 2
                        ingénieurs passionnés.'],
                        ['2020', '🔧', 'Premiers Clients', 'Premiers contrats de maintenance et déploiements réseaux. 15
                        clients en portefeuille.'],
                        ['2021', '🚀', 'Expansion', 'Lancement des services cloud et cybersécurité. Équipe portée à 5
                        experts.'],
                        ['2022', '🌐', 'Développement Web', 'Intégration du pôle développement. Premières applications
                        Laravel & React livrées.'],
                        ['2023', '🏆', 'Croissance', '80+ clients, 3 certifications AWS/Cisco obtenues. Premier
                        partenariat international.'],
                        ['2024', '🔮', 'Innovation', 'Lancement du service DevOps managé. 120+ projets livrés. Cap sur
                        l\'Afrique centrale.'],
                        ] as [$year, $icon, $title, $desc])
                        <div class="flex gap-6 reveal">
                            <div class="relative shrink-0 flex flex-col items-center">
                                <div
                                    class="w-12 h-12 rounded-full glass border border-[var(--primary)]/30 flex items-center justify-center text-xl z-10">
                                    {{ $icon }}</div>
                            </div>
                            <div class="glass rounded-xl p-5 flex-1 -mt-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="text-[var(--primary)] font-bold text-sm">{{ $year }}</span>
                                    <span class="font-bold text-[var(--heading)]">{{ $title }}</span>
                                </div>
                                <p class="text-[var(--muted)] text-sm">{{ $desc }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Stack & outils --}}
            <div class="mb-20 reveal">
                <h2 class="text-2xl font-bold text-[var(--heading)] text-center mb-10">Notre Stack & Outils</h2>
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach([
                    ['🌐 Réseaux', 'cyan', ['Cisco IOS', 'MikroTik', 'Pfsense', 'Wireshark', 'VLAN/OSPF']],
                    ['💻 Développement', 'violet', ['Laravel', 'React', 'Vue.js', 'Node.js', 'Python']],
                    ['☁️ Cloud & DevOps', 'emerald', ['AWS', 'Azure', 'Docker', 'Kubernetes', 'Terraform']],
                    ['🔐 Sécurité', 'rose', ['Nessus', 'Metasploit', 'Fail2ban', 'OpenVPN', 'Splunk']],
                    ['🗄️ Systèmes', 'amber', ['Linux (Debian/Ubuntu)', 'Windows Server', 'Active Directory',
                    'Ansible']],
                    ['🛠️ Outils', 'cyan', ['Git/GitHub', 'Zabbix', 'Grafana', 'Jira', 'Notion']],
                    ] as [$cat, $color, $stack])
                    <div class="glass rounded-xl p-5">
                        <h3 class="font-semibold text-[var(--heading)] mb-3 text-sm">{{ $cat }}</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($stack as $tool)
                            <x-badge :color="$color">{{ $tool }}</x-badge>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- CTA --}}
            <div class="text-center glass rounded-2xl p-10">
                <h2 class="text-2xl font-bold text-[var(--heading)] mb-3">Prêt à travailler avec nous ?</h2>
                <p class="text-[var(--muted)] mb-6">Faisons connaissance autour de votre projet IT. Consultation
                    initiale
                    offerte.</p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="{{ route('quote') }}" class="btn-primary">Demander un devis</a>
                    <a href="{{ route('contact') }}" class="btn-outline">Nous contacter</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>