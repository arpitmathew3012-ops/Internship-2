<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Company')</title>

    <!-- Bootstrap 5 CSS (optional, remove if you're using custom styles) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Add custom CSS here -->
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">My Company</a>

            @auth
                <form method="POST" action="{{ route('logout') }}" class="ms-auto">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger">Logout</button>
                </form>
            @endauth
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
