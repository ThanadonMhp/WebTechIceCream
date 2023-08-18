<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="id=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Larave Layout</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('layouts.subviews.navbar')

    <main class="bg-light-pink p-4 h-fit">
        @yield('content')
    </main>
</body>
</html>