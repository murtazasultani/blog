<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="author" content="Murtaza Sultani :: https://murtazasultani.me/" />
        <title inertia>{{ config('app.name') }}</title>

        <meta name="description" content="A simple blog post app" />
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="{{ config('app.name') }}" />
        <meta property="og:description" content="A simple blog post app" />
        <meta property="og:image" content="">
        <meta property="og:title" content="{{ config('app.name') }}">

        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:site" content="@murtazasultanii"/>
        <meta name="twitter:title" content="{{ config('app.name') }}"/>
        <meta name="twitter:description" content="A simple blog post app"/>
        <meta name="twitter:image" content=""/>
        <meta name="twitter:creator" content="@murtazasultani"/>
        <meta name="next-head-count" content="15">

        <link rel="preload" as="font" href="{{ asset('/fonts/TiemposHeadline-Medium.woff') }}" type="font/woff" crossorigin="anonymous">
        
        <link rel="stylesheet" href="{{ mix('css/bundle.css') }}" />

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/bundle.js') }}" defer></script>
    </head>
    <body class="font-poppins">
        @inertia

        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv
    </body>
</html>