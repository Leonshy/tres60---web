<!DOCTYPE html>
<html lang="es-PY">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('tres360.empresa') }} — Administración integral de departamentos</title>
    <meta name="description" content="360 by METRIKA SA administra tu departamento de principio a fin: comercialización en Airbnb y Booking, atención al huésped, mantenimiento y reportes. Dejá tu inversión en manos expertas.">
    <link rel="canonical" href="{{ url('/') }}">

    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ config('tres360.empresa') }} — Administración integral de departamentos">
    <meta property="og:description" content="Property management de principio a fin para propietarios de departamentos en {{ config('tres360.ciudad') }}. Una marca de METRIKA SA.">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ asset('img/og-image.png') }}">
    <meta property="og:locale" content="es_PY">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('tres360.empresa') }} — Administración integral de departamentos">
    <meta name="twitter:description" content="Property management de principio a fin para propietarios de departamentos en {{ config('tres360.ciudad') }}. Una marca de METRIKA SA.">
    <meta name="twitter:image" content="{{ asset('img/og-image.png') }}">

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" href="{{ asset('favicon-512.png') }}" type="image/png" sizes="512x512">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'RealEstateAgent',
            'name' => config('tres360.empresa'),
            'telephone' => config('tres360.tel_e164'),
            'email' => config('tres360.email'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => config('tres360.direccion'),
                'addressLocality' => config('tres360.ciudad'),
                'addressCountry' => 'PY',
            ],
            'parentOrganization' => [
                '@type' => 'Organization',
                'name' => config('tres360.legal'),
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-ink antialiased">
    @yield('content')
</body>
</html>
