<nav x-data="{ open: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 30 })"
    :class="scrolled
        ? 'bg-[var(--bg)]/90 shadow-[0_4px_30px_rgba(144,97,255,0.12)] backdrop-blur-xl border-b border-[var(--border)]'
        : 'bg-transparent'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500"
    role="navigation" aria-label="Navigation principale">

    {{-- Gradient line at top --}}
    <div class="gradient-line absolute top-0 left-0 right-0 h-[2px]"></div>

    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-[76px]">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group shrink-0" aria-label="Marvel Tech's Accueil">
                {{-- Logo Icon --}}
                <div class="relative w-9 h-9 rounded-xl bg-gradient-to-br from-[#9061ff] to-[#7040e0] flex items-center justify-center shadow-[0_4px_16px_rgba(144,97,255,0.45)] group-hover:shadow-[0_4px_24px_rgba(144,97,255,0.65)] transition-shadow duration-300">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2"
                            d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18" />
                    </svg>
                    <span class="absolute -top-1 -right-1 w-2.5 h-2.5 rounded-full bg-[#06b6d4] border-2 border-[var(--bg)]"></span>
                </div>
                <div>
                    <span class="text-lg font-extrabold text-gradient-violet tracking-tight leading-none">Marvel Tech's</span>
                    <span class="block text-[10px] font-semibold text-[var(--muted)] tracking-widest uppercase leading-none">IT Solutions</span>
                </div>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden xl:flex flex-1 items-center justify-center gap-2 2xl:gap-4 mx-6">
                @foreach([
                    'Accueil'     => ['route' => 'home',            'pattern' => '/'],
                    'Services'    => ['route' => 'services.index',   'pattern' => 'services*'],
                    'Réalisations'=> ['route' => 'portfolio.index',  'pattern' => 'portfolio*'],
                    'Blog'        => ['route' => 'blog.index',       'pattern' => 'blog*'],
                    'À propos'    => ['route' => 'about',            'pattern' => 'about'],
                ] as $label => $item)
                <a href="{{ route($item['route']) }}"
                   class="nav-link rounded-lg hover:bg-[var(--surface-2)] {{ request()->is($item['pattern']) ? 'active' : '' }}">
                    {{ $label }}
                </a>
                @endforeach
            </div>

            {{-- CTA Group --}}
            <div class="hidden xl:flex items-center gap-3 shrink-0">
                @auth
                <a href="{{ route(Auth::user()->homeRoute()) }}" class="btn-ghost text-sm py-2 px-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    {{ Auth::user()->is_admin ? 'Admin' : 'Mon espace' }}
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="btn-ghost text-sm py-2 px-3 text-[var(--danger)] hover:text-[var(--danger)]">
                        Déconnexion
                    </button>
                </form>
                @else
                <a href="{{ route('login') }}" class="btn-ghost text-sm py-2 px-3">Connexion</a>
                <a href="{{ route('register') }}" class="btn-ghost text-sm py-2 px-3">Inscription</a>
                @endauth

                <a href="{{ route('contact') }}" class="btn-outline text-sm py-2 px-4">
                    Contact
                </a>
                <a href="{{ route('quote') }}" class="btn-primary text-sm py-2 px-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Devis gratuit
                </a>

                {{-- Theme Toggle --}}
                <div class="ml-1 pl-3 border-l border-[var(--border)]">
                    <x-theme-toggle />
                </div>
            </div>

            {{-- Mobile burger --}}
            <div class="flex xl:hidden items-center gap-3">
                <x-theme-toggle />
                <button @click="open = !open"
                    class="p-2 rounded-xl text-[var(--muted)] hover:text-[var(--text)] hover:bg-[var(--surface-2)] transition-all duration-200"
                    :aria-expanded="open.toString()" aria-controls="mobile-menu" aria-label="Menu">
                    <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-cloak x-show="open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-cloak x-show="open"
        x-transition:enter="transition ease-out duration-250"
        x-transition:enter-start="opacity-0 -translate-y-3"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-3"
        id="mobile-menu"
        class="xl:hidden border-t border-[var(--border)] bg-[var(--bg)]/98 backdrop-blur-xl"
        @click.outside="open = false">
        <div class="px-4 py-5 space-y-1">
            <a href="{{ route('home') }}" class="flex items-center gap-3 py-3 px-3 rounded-xl text-[var(--text)] hover:bg-[var(--surface-2)] hover:text-[var(--primary)] transition-all {{ request()->is('/') ? 'text-[var(--primary)] bg-[var(--surface-2)]' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                Accueil
            </a>
            <a href="{{ route('services.index') }}" class="flex items-center gap-3 py-3 px-3 rounded-xl text-[var(--text)] hover:bg-[var(--surface-2)] hover:text-[var(--primary)] transition-all {{ request()->is('services*') ? 'text-[var(--primary)] bg-[var(--surface-2)]' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                Services
            </a>
            <a href="{{ route('portfolio.index') }}" class="flex items-center gap-3 py-3 px-3 rounded-xl text-[var(--text)] hover:bg-[var(--surface-2)] hover:text-[var(--primary)] transition-all {{ request()->is('portfolio*') ? 'text-[var(--primary)] bg-[var(--surface-2)]' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                Réalisations
            </a>
            <a href="{{ route('blog.index') }}" class="flex items-center gap-3 py-3 px-3 rounded-xl text-[var(--text)] hover:bg-[var(--surface-2)] hover:text-[var(--primary)] transition-all {{ request()->is('blog*') ? 'text-[var(--primary)] bg-[var(--surface-2)]' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" /></svg>
                Blog
            </a>
            <a href="{{ route('about') }}" class="flex items-center gap-3 py-3 px-3 rounded-xl text-[var(--text)] hover:bg-[var(--surface-2)] hover:text-[var(--primary)] transition-all {{ request()->is('about') ? 'text-[var(--primary)] bg-[var(--surface-2)]' : '' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                À propos
            </a>
            <div class="pt-3 flex flex-col gap-2 border-t border-[var(--border)]">
                @auth
                <a href="{{ route(Auth::user()->homeRoute()) }}" class="btn-outline text-center text-sm py-2.5">
                    {{ Auth::user()->is_admin ? 'Administration' : 'Mon espace' }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-center text-sm text-[var(--danger)] py-2">Déconnexion</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="btn-ghost text-center text-sm py-2">Connexion</a>
                <a href="{{ route('register') }}" class="btn-outline text-center text-sm py-2.5">Créer un compte</a>
                @endauth
                <a href="{{ route('contact') }}" class="btn-outline text-center text-sm py-2.5">Contact</a>
                <a href="{{ route('quote') }}" class="btn-primary text-center text-sm py-2.5 justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Devis gratuit
                </a>
            </div>
        </div>
    </div>
</nav>
