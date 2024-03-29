<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul class="menu-list">
                <li class="menu-item">
                    <a href="{{ route('home') }}" class="menu-link {{ get_current('home') }}">{{ __('messages.Home') }}</a>
                </li>
                <li class="menu-item"><a href="{{ route('about') }}" class="menu-link {{ get_current('about') }}">{{ __('messages.About') }}</a></li>
            </ul>
        </nav>
    </header>
    @yield('contenu')
</body>
</html>
