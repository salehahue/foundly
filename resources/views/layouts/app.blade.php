<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Foundly')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="foundly-nav">
        <div class="nav-inner">
            <x-brand />
            <div class="nav-links">

                <a href="{{ route('items.index') }}">
                    Lost & Found
                </a>

                <a href="{{ route('items.create') }}" class="nav-report">
                    Report an item
                </a>

                @guest
                    <a href="{{ route('login') }}">
                        Log in
                    </a>

                    <a href="{{ route('register') }}">
                        Register
                    </a>
                @else
                    <span class="nav-user">
                        Hi, {{ Auth::user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}" class="logout-form">
                        @csrf

                        <button type="submit" class="nav-logout">
                            Log out
                        </button>
                    </form>
                @endguest

            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer class="foundly-footer">
        <div class="container">
            <x-brand />
            <p>
                Made for the things we thought we'd never find again.
            </p>
        </div>
    </footer>
</body>

</html>
