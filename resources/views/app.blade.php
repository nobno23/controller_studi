<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav>
            <a href="/home">Home</a> |
            <a href="/about">About</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© 2024 My Laravel App</p>
    </footer>
</body>
</html>