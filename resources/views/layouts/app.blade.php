<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'blog home' }}</title>
</head>
<body>
<div class="container mt-4">
    @yield('content')
</div>
</body>
</html>