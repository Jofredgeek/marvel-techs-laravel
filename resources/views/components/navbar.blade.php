<nav x-data="{ open: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
    :class="scrolled ? 'bg-[#0b0f1a]/95 shadow-lg shadow-black/30 backdrop-blur-md border-b border-slate-800/60' : 'bg-transparent'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" role="navigation"
    aria-label="Navigation principale">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2" aria-label="Marvel Tech's Accueil">
                <span class="text-xl font-extrabold text-gradient-cyan tracking-tight">Marvel Tech's</span>
                <span class="text-xs font-semibold text-slate-500 hidden sm:inline">IT Solutions</span>
            </a>

            {{-- Desktop nav --}}
            <div class="hidden md:flex items-center gap-7">
                <a href="{{ route('home') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Accueil</a>
                <a href="{{ route('services.index') }}"
                    class="nav-link {{ request()->is('services*') ? 'active' : '' }}">Services</a>
                <a href="{{ route('portfolio.index') }}"
                    class="nav-link {{ request()->is('portfolio*') ? 'active' : '' }}">Réalisations</a>
                <a href="{{ route('blog.index') }}"
                    class="nav-link {{ request()->is('blog*') ? 'active' : '' }}">Blog</a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->is('about') ? 'active' : '' }}">À
                    propos</a>
            </div>

            {{-- CTA --}}
            <div class="hidden md:flex items-center gap-3">
                @auth
                <a href="{{ route('admin.dashboard') }}"
                    class="btn-outline text-sm py-2 px-4 border-neon-cyan/50 text-neon-cyan hover:bg-neon-cyan/10">Admin</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="text-xs text-slate-500 hover:text-neon-rose transition-colors">Déconnexion</button>
                </form>
                @else
                <a href="{{ route('login') }}"
                    class="text-sm text-slate-400 hover:text-white transition-colors">Connexion</a>
                @endauth
                <a href="{{ route('contact') }}" class="btn-outline text-sm py-2 px-4">Contact</a>
                <a href="{{ route('quote') }}" class="btn-primary text-sm py-2 px-4">Devis gratuit</a>
            </div>

            {{-- Mobile burger --}}
            <button @click="open = !open"
                class="md:hidden text-slate-400 hover:text-white transition-colors p-2 rounded-lg"
                :aria-expanded="open.toString()" aria-controls="mobile-menu" aria-label="Ouvrir le menu">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2" id="mobile-menu"
        class="md:hidden border-t border-slate-800/60 bg-[#0b0f1a]/98 backdrop-blur-md" @click.outside="open = false">
        <div class="px-4 py-4 space-y-2">
            <a href="{{ route('home') }}"
                class="block py-2 px-3 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800/50 transition-colors">Accueil</a>
            <a href="{{ route('services.index') }}"
                class="block py-2 px-3 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800/50 transition-colors">Services</a>
            <a href="{{ route('portfolio.index') }}"
                class="block py-2 px-3 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800/50 transition-colors">Réalisations</a>
            <a href="{{ route('blog.index') }}"
                class="block py-2 px-3 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800/50 transition-colors">Blog</a>
            <a href="{{ route('about') }}"
                class="block py-2 px-3 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800/50 transition-colors">À
                propos</a>
            <div class="pt-3 flex flex-col gap-2">
                @auth
                <a href="{{ route('admin.dashboard') }}"
                    class="btn-outline text-center text-sm py-2 border-neon-cyan/50 text-neon-cyan">Admin</a>
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="w-full text-center text-xs text-slate-500 py-1">Déconnexion</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="text-center text-sm text-slate-400 py-2">Connexion</a>
                @endauth
                <a href="{{ route('contact') }}" class="btn-outline text-center text-sm py-2">Contact</a>
                <a href="{{ route('quote') }}" class="btn-primary text-center text-sm py-2">Devis gratuit</a>
            </div>
        </div>
    </div>
</nav>