<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="manifest" href="/manifest.json" />

        <title>{{ $title }}</title>

        @env('dev')
            <script type="module" src="http://localhost:3002/@vite/client"></script>
        @endenv

        @include('components.asset', ["bundle" => "app"])
        
        {{ $styles }}

    </head>
    <body class="font-sans antialiased">
        {{ $slot }}

        {{ $bundles }}
    </body>
</html>