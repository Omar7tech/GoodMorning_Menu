<!DOCTYPE html>
@php
    $settings = app(\App\Settings\GeneralSettings::class);

    $contactPoints = [];
    $socialUrls = [];

    if ($settings->phone_active && $settings->phone_number) {
        $contactPoints[] = [
            '@type' => 'ContactPoint',
            'telephone' => $settings->phone_number,
            'contactType' => 'customer service',
            'availableLanguage' => ['English', 'Arabic'],
        ];
    }

    if ($settings->whatsapp_active && $settings->whatsapp_number) {
        $contactPoints[] = [
            '@type' => 'ContactPoint',
            'telephone' => $settings->whatsapp_number,
            'contactType' => 'customer service',
            'availableLanguage' => ['English', 'Arabic'],
            'contactOption' => 'WhatsApp',
        ];
    }

    if ($settings->email_active && $settings->email) {
        $contactPoints[] = [
            '@type' => 'ContactPoint',
            'email' => $settings->email,
            'contactType' => 'customer service',
            'availableLanguage' => ['English', 'Arabic'],
        ];
    }

    if ($settings->instagram_active && $settings->instagram_url) $socialUrls[] = $settings->instagram_url;
    if ($settings->facebook_active && $settings->facebook_url) $socialUrls[] = $settings->facebook_url;

    $businessData = [
        '@context' => 'https://schema.org',
        '@type' => ['Bakery', 'LocalBusiness', 'Restaurant', 'FoodEstablishment'],
        'name' => 'Good Morning',
        'description' => 'Fresh desserts, drinks, and pastries served all day in Aley, Lebanon since 2011.',
        'url' => url('/'),
        'logo' => asset('images/GMLogo2025.png'),
        'image' => asset('images/GMLogo2025.png'),
        'foundingDate' => '2011',
        'slogan' => 'Fresh with every sunrise and beyond',
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Aley',
            'addressRegion' => 'Mount Lebanon',
            'addressCountry' => 'LB',
        ],
        'areaServed' => [
            '@type' => 'City',
            'name' => 'Aley',
        ],
        'servesCuisine' => ['Desserts', 'Beverages', 'Pastries', 'Cakes', 'Fresh Juices', 'Coffee'],
        'priceRange' => '$$',
        'menu' => [
            '@type' => 'Menu',
            'name' => 'Daily Menu',
            'description' => 'Our full menu of fresh desserts, drinks, pastries, cakes, and fresh juices.',
        ],
    ];

    if (!empty($contactPoints)) $businessData['contactPoint'] = $contactPoints;
    if (!empty($socialUrls)) $businessData['sameAs'] = $socialUrls;
@endphp

<html lang="en" data-theme="{{ $settings->theme ?? 'light' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>Good Morning Aley – Fresh Desserts, Pastries & Drinks in Lebanon</title>
    <meta name="description" content="Fresh desserts, pastries, and drinks in Aley, Lebanon. Visit Good Morning for daily treats since 2011!">

    <meta property="og:title" content="Good Morning Aley – Fresh Desserts, Pastries & Drinks in Lebanon">
    <meta property="og:description" content="Fresh desserts, pastries, and drinks in Aley, Lebanon. Visit Good Morning for daily treats since 2011!">
    <meta property="og:image" content="{{ asset('images/GMLogo2025.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Good Morning Aley">

    @if ($settings->whatsapp_active && $settings->whatsapp_number)
        <meta property="wa:phone" content="{{ $settings->whatsapp_number }}">
        <meta property="wa:contact_enabled" content="true">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script type="application/ld+json">
    {!! json_encode($businessData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
</head>

<body class="poppins">
    {{ $slot }}

    <x-footer.year />
</body>
</html>
