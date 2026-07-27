<!DOCTYPE html>
<html lang="fr">
<head>
    <script>
        (function () {
            const theme = localStorage.getItem('theme') ||
                (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', theme);
            document.documentElement.classList.toggle('dark', theme === 'dark');
        })();
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex,nofollow">
    <title>{{ $title ?? 'Administration' }} — Back-office Marvel Tech's</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ sidebarOpen: false }" class="min-h-screen bg-[var(--bg)] font-sans text-[var(--text)] antialiased">
    <div x-cloak x-show="sidebarOpen" x-transition.opacity
        @click="sidebarOpen = false"
        class="fixed inset-0 z-40 bg-[#090613]/70 backdrop-blur-sm lg:hidden"></div>

    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 z-50 flex w-[286px] flex-col border-r border-white/10 bg-[#0d0919] text-white shadow-2xl transition-transform duration-300 lg:translate-x-0">
        <div class="flex h-[82px] items-center justify-between border-b border-white/10 px-5">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-[#9061ff] to-[#7040e0] shadow-[0_8px_24px_rgba(144,97,255,.35)]">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18" />
                    </svg>
                </span>
                <span>
                    <strong class="block text-[15px] font-extrabold tracking-tight">Marvel Tech's</strong>
                    <span class="text-[9px] font-bold uppercase tracking-[.22em] text-[#a88cff]">Control center</span>
                </span>
            </a>
            <button @click="sidebarOpen = false" class="rounded-lg p-2 text-white/50 hover:bg-white/10 hover:text-white lg:hidden" aria-label="Fermer le menu">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto px-3 py-5">
            <p class="mb-2 px-3 text-[10px] font-bold uppercase tracking-[.18em] text-white/35">Pilotage</p>
            <div class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg class="h-[18px] w-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 13h6V4H4v9zm0 7h6v-4H4v4zm10 0h6v-9h-6v9zm0-13h6V4h-6v3z" />
                    </svg>
                    Vue d’ensemble
                </a>
                <a href="{{ route('admin.activities.index') }}" class="admin-nav-item {{ request()->routeIs('admin.activities*') ? 'active' : '' }}">
                    <svg class="h-[18px] w-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 19V9m5 10V5m5 14v-7m5 7V3" />
                    </svg>
                    Activités
                </a>
                <a href="{{ route('admin.users.index') }}" class="admin-nav-item {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <svg class="h-[18px] w-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m7-10a4 4 0 100-8 4 4 0 000 8zm13 10v-2a4 4 0 00-3-3.87m-1-11.96a4 4 0 010 7.75" />
                    </svg>
                    Utilisateurs
                </a>
            </div>

            <p class="mb-2 mt-7 px-3 text-[10px] font-bold uppercase tracking-[.18em] text-white/35">Contenu du site</p>
            <div class="space-y-1">
                <a href="{{ route('admin.services.index') }}" class="admin-nav-item {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                    <svg class="h-[18px] w-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Services
                </a>
                <a href="{{ route('admin.projects.index') }}" class="admin-nav-item {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                    <svg class="h-[18px] w-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7h-7l-2-2H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z" />
                    </svg>
                    Réalisations
                </a>
                <a href="{{ route('admin.posts.index') }}" class="admin-nav-item {{ request()->routeIs('admin.posts*') ? 'active' : '' }}">
                    <svg class="h-[18px] w-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a2 2 0 012-2h9l5 5v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm4 7h8m-8 4h8" />
                    </svg>
                    Blog
                </a>
            </div>

            <p class="mb-2 mt-7 px-3 text-[10px] font-bold uppercase tracking-[.18em] text-white/35">Boîte de réception</p>
            <div class="space-y-1">
                <a href="{{ route('admin.contacts.index') }}" class="admin-nav-item {{ request()->routeIs('admin.contacts*') ? 'active' : '' }}">
                    <svg class="h-[18px] w-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Messages
                    @if($adminNavCounts['contacts'])
                        <span class="ml-auto rounded-full bg-[#06b6d4] px-2 py-0.5 text-[10px] font-extrabold text-[#071116]">{{ $adminNavCounts['contacts'] }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.quotes.index') }}" class="admin-nav-item {{ request()->routeIs('admin.quotes*') ? 'active' : '' }}">
                    <svg class="h-[18px] w-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M7 3h7l5 5v11a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z" />
                    </svg>
                    Demandes de devis
                    @if($adminNavCounts['quotes'])
                        <span class="ml-auto rounded-full bg-[#9061ff] px-2 py-0.5 text-[10px] font-extrabold text-white">{{ $adminNavCounts['quotes'] }}</span>
                    @endif
                </a>
            </div>
        </nav>

        <div class="border-t border-white/10 p-4">
            <div class="mb-3 flex items-center gap-3 rounded-xl bg-white/[.05] p-3">
                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-gradient-to-br from-[#9061ff] to-[#06b6d4] text-xs font-extrabold">
                    {{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 2)) }}
                </span>
                <span class="min-w-0 flex-1">
                    <strong class="block truncate text-sm">{{ auth()->user()->name }}</strong>
                    <span class="block truncate text-[11px] text-white/40">{{ auth()->user()->email ?: auth()->user()->phone }}</span>
                </span>
                <span class="h-2 w-2 rounded-full bg-[#34d399] shadow-[0_0_10px_#34d399]" title="En ligne"></span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="admin-nav-item w-full text-[#fb7185] hover:text-[#fb7185]">
                    <svg class="h-[18px] w-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Déconnexion
                </button>
            </form>
        </div>
    </aside>

    <div class="min-h-screen lg:pl-[286px]">
        <header class="sticky top-0 z-30 flex h-[72px] items-center justify-between border-b border-[var(--border)] bg-[var(--bg)]/90 px-4 backdrop-blur-xl sm:px-6 lg:px-8">
            <div class="flex min-w-0 items-center gap-3">
                <button @click="sidebarOpen = true" class="rounded-xl border border-[var(--border)] p-2.5 text-[var(--muted)] hover:bg-[var(--surface)] lg:hidden" aria-label="Ouvrir le menu">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="min-w-0">
                    <p class="text-[10px] font-bold uppercase tracking-[.15em] text-[var(--muted)]">Back-office</p>
                    <h1 class="truncate text-base font-extrabold text-[var(--heading)] sm:text-lg">{{ $title ?? 'Administration' }}</h1>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('home') }}" target="_blank" class="hidden items-center gap-2 rounded-xl border border-[var(--border)] px-3.5 py-2 text-xs font-bold text-[var(--muted)] transition hover:border-[var(--primary)]/40 hover:text-[var(--primary)] sm:flex">
                    Voir le site
                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5h5v5m0-5L10 14M5 7v12h12" />
                    </svg>
                </a>
                <x-theme-toggle />
            </div>
        </header>

        <main class="p-4 sm:p-6 lg:p-8">
            @if(session('success'))
                <div class="mb-6 flex items-center gap-3 rounded-xl border border-[var(--success)]/25 bg-[var(--success)]/10 px-4 py-3 text-sm font-semibold text-[var(--success)]">
                    <span class="flex h-6 w-6 items-center justify-center rounded-full bg-[var(--success)]/15">✓</span>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 rounded-xl border border-[var(--danger)]/25 bg-[var(--danger)]/10 px-4 py-3 text-sm text-[var(--danger)]">
                    {{ $errors->first() }}
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>
</body>
</html>
