<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <header>
        <div class="icon">Event Registration System</div>
        <nav class="links">
            <a href="{{ route('home.page') }}">Events</a>
            <a href="{{ route('manage.events') }}">Manage Events</a>
            <a href="{{ route('logout.user') }}">Logout</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>