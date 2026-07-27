<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Accédez à votre espace sécurisé Marvel Tech's.">

    <title>{{ $title ?? 'Connexion' }} — {{ config('app.name', "Marvel Tech's") }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        (function () {
            const theme = localStorage.getItem('theme') ||
                (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', theme);
            document.documentElement.classList.toggle('dark', theme === 'dark');
        })();
    </script>
</head>

<body class="font-sans text-[var(--text)] antialiased">
    <main class="relative min-h-screen overflow-hidden bg-[var(--bg)]">
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute -left-32 -top-32 h-96 w-96 rounded-full bg-[#9061ff]/20 blur-[100px]"></div>
            <div class="absolute -bottom-36 right-0 h-[28rem] w-[28rem] rounded-full bg-[#06b6d4]/15 blur-[120px]"></div>
            <div class="hero-grid absolute inset-0 opacity-30"></div>
        </div>

        <div class="relative grid min-h-screen lg:grid-cols-[minmax(0,0.92fr)_minmax(520px,1.08fr)]">
            <section class="relative hidden overflow-hidden border-r border-white/10 bg-[#0a0715] px-12 py-10 text-white lg:flex lg:flex-col xl:px-20">
                <div class="absolute inset-0 bg-gradient-to-br from-[#9061ff]/20 via-transparent to-[#06b6d4]/10"></div>

                <a href="{{ route('home') }}" class="relative z-10 flex w-fit items-center gap-3" aria-label="Retour à l'accueil">
                    <span class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-[#9061ff] to-[#7040e0] shadow-[0_10px_30px_rgba(144,97,255,.4)]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18" />
                        </svg>
                    </span>
                    <span>
                        <strong class="block text-xl font-extrabold tracking-tight">Marvel Tech's</strong>
                        <span class="text-[10px] font-semibold uppercase tracking-[.25em] text-white/50">IT Solutions</span>
                    </span>
                </a>

                <div class="relative z-10 my-auto max-w-xl py-16">
                    <span class="inline-flex items-center gap-2 rounded-full border border-[#9061ff]/30 bg-[#9061ff]/10 px-4 py-2 text-xs font-bold uppercase tracking-[.16em] text-[#c8b5ff]">
                        <span class="h-2 w-2 rounded-full bg-[#34d399] shadow-[0_0_12px_#34d399]"></span>
                        Espace sécurisé
                    </span>
                    <h1 class="mt-8 text-4xl font-extrabold leading-[1.12] tracking-tight xl:text-5xl">
                        Vos projets IT,<br>
                        <span class="bg-gradient-to-r from-[#b99cff] to-[#49d7ea] bg-clip-text text-transparent">toujours à portée de main.</span>
                    </h1>
                    <p class="mt-6 max-w-lg text-base leading-7 text-white/60">
                        Connectez-vous par e-mail, Google ou téléphone. Une expérience simple, rapide et protégée.
                    </p>

                    <div class="mt-10 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl border border-white/10 bg-white/[.04] p-4 backdrop-blur">
                            <svg class="h-5 w-5 text-[#9d74ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5-3.5A11.9 11.9 0 0112 3a11.9 11.9 0 01-8 3.5c0 5.25 3.44 10.13 8 11.5 4.56-1.37 8-6.25 8-11.5z" />
                            </svg>
                            <p class="mt-3 text-sm font-bold">Accès protégé</p>
                            <p class="mt-1 text-xs leading-5 text-white/45">Sessions sécurisées et tentatives limitées.</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/[.04] p-4 backdrop-blur">
                            <svg class="h-5 w-5 text-[#43ccdf]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            <p class="mt-3 text-sm font-bold">OTP instantané</p>
                            <p class="mt-1 text-xs leading-5 text-white/45">Recevez votre code par SMS ou WhatsApp.</p>
                        </div>
                    </div>
                </div>

                <p class="relative z-10 text-xs text-white/35">© {{ date('Y') }} Marvel Tech's · Yaoundé, Cameroun</p>
            </section>

            <section class="relative flex min-h-screen items-center justify-center px-4 py-8 sm:px-8 lg:px-12">
                <div class="absolute right-5 top-5 flex items-center gap-2">
                    <a href="{{ route('home') }}" class="rounded-xl p-2.5 text-[var(--muted)] transition hover:bg-[var(--surface-2)] hover:text-[var(--primary)]" aria-label="Retour à l'accueil">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v10h14V10" />
                        </svg>
                    </a>
                    <x-theme-toggle />
                </div>

                <div class="w-full max-w-[500px]">
                    <a href="{{ route('home') }}" class="mb-9 flex items-center justify-center gap-3 lg:hidden">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-[#9061ff] to-[#7040e0] text-white shadow-lg">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18" />
                            </svg>
                        </span>
                        <strong class="text-xl font-extrabold text-[var(--heading)]">Marvel Tech's</strong>
                    </a>

                    <div class="rounded-[1.75rem] border border-[var(--border-soft)] bg-[var(--surface)]/90 p-6 shadow-[0_24px_80px_rgba(20,12,50,.16)] backdrop-blur-xl sm:p-9">
                        {{ $slot }}
                    </div>

                    <p class="mt-6 text-center text-xs leading-5 text-[var(--muted)]">
                        En continuant, vous acceptez nos conditions d’utilisation et notre politique de confidentialité.
                    </p>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
