<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Foundly' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap"
        rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body class="auth-body">

    <main class="auth-page">

        <div class="auth-content">

            <a href="{{ route('home') }}" class="auth-brand">
                Foundly<span>.</span>
            </a>

            {{ $slot }}

        </div>

    </main>

</body>

</html>
