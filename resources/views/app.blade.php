<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- Primary Meta Tags -->
        <title>{{ config('app.name', 'PLWC') }}</title>
        <meta name="title" content="{{ config('app.name', 'PLWC') }}">
        <meta name="description" content="We are a Presbyterian Church in the Philippines. Join us for worship, fellowship & growth.">
        <meta name="keywords" content="plwc, PLWC, Lake-Wood Church, Philippine Lake-Wood Church">
        <meta name="naver-site-verification" content="" />

        <!-- Open Graph / Facebook -->
        <!--
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ config('app.name', 'PLWC') }}">
        <meta property="og:description" content="Your website description goes here. Make it compelling and keyword-rich.">
        <meta property="og:image" content="{{ asset('path/to/your/og-image.jpg') }}">
        <meta property="og:site_name" content="{{ config('app.name', 'PLWC') }}">

        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url()->current() }}">
        <meta property="twitter:title" content="{{ config('app.name', 'PLWC') }}">
        <meta property="twitter:description" content="Your website description goes here. Make it compelling and keyword-rich.">
        <meta property="twitter:image" content="{{ asset('path/to/your/og-image.jpg') }}"> -->

        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

        <link rel="canonical" href="{{ url()->current() }}">
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="preload" as="style" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">
        <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">
        
        <meta name="robots" content="index, follow">
        <meta name="author" content="Philippine Lake-Wood Church">

        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
        </script>
    </head>
    <body class="font-sans antialiased">
        <noscript>
            <div style="padding: 20px; text-align: center; background-color: #f8d7da; color: #721c24;">
                This website works best with JavaScript enabled. Please enable it to continue.
            </div>
        </noscript>
        
        @inertia
        
        <div role="navigation" aria-label="Skip Links" style="position: absolute; top: -9999px;">
            <a href="#main-content" class="skip-link">Skip to main content</a>
        </div>
    </body>
</html>
