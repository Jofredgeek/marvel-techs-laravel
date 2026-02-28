<!DOCTYPE html>
<html lang="fr" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 — Page introuvable | Marvel Tech's</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col items-center justify-center bg-[#0b0f1a] relative overflow-hidden">
    <div class="hero-glow w-80 h-80 bg-neon-cyan/12 -top-20 -left-20"></div>
    <div class="hero-glow w-64 h-64 bg-neon-violet/10 bottom-10 -right-10"></div>
    <div class="absolute inset-0 opacity-[0.025]"
        style="background-image: linear-gradient(rgba(34,211,238,.5) 1px, transparent 1px), linear-gradient(90deg, rgba(34,211,238,.5) 1px, transparent 1px); background-size: 50px 50px;">
    </div>

    <div class="relative z-10 text-center px-4">
        <div class="text-9xl font-black text-gradient-cyan mb-4">404</div>
        <h1 class="text-3xl font-bold text-white mb-4">Page introuvable</h1>
        <p class="text-slate-400 text-lg mb-8 max-w-md mx-auto">
            Cette page n'existe pas ou a été déplacée. Revenons sur des bases solides.
        </p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ url('/') }}" class="btn-primary">← Retour à l'accueil</a>
            <a href="{{ route('contact') }}" class="btn-outline">Nous contacter</a>
        </div>
        <div class="mt-12 glass rounded-xl px-6 py-4 inline-block">
            <p class="text-slate-400 text-sm">Vous cherchiez peut-être :</p>
            <div class="flex flex-wrap gap-2 mt-2 justify-center">
                <a href="{{ route('services.index') }}" class="badge badge-cyan">Services</a>
                <a href="{{ route('portfolio.index') }}" class="badge badge-violet">Portfolio</a>
                <a href="{{ route('blog.index') }}" class="badge badge-emerald">Blog</a>
                <a href="{{ route('quote') }}" class="badge badge-amber">Devis</a>
            </div>
        </div>
    </div>
</body>

</html>