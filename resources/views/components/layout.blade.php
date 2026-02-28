<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO --}}
    <title>{{ $title ?? 'Marvel Tech\'s — Solutions IT Modernes' }}</title>
    <meta name="description" content="{{ $description ?? 'Marvel Tech\'s — Expert en maintenance IT, réseaux, cybersécurité, développement web, cloud et DevOps. Basé au Cameroun, disponible partout.' }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? 'Marvel Tech\'s — Solutions IT Modernes' }}">
    <meta property="og:description" content="{{ $description ?? 'Expert en maintenance IT, réseaux, cybersécurité, développement web, cloud et DevOps.' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Marvel Tech's">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/og-default.png') }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{ $head ?? '' }}
</head>
<body class="min-h-screen flex flex-col">
    <x-navbar />

    <main class="flex-1">
        {{ $slot }}
    </main>

    <x-footer />

    {{ $scripts ?? '' }}
</body>
</html>
