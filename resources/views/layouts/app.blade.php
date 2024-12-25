<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
        <div class="container">
            <a href="{{ route('posts.index') }}">Блог</a>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
