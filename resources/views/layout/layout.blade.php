<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/build.css') }}" rel="stylesheet">
    @stack('css')
    <title>@yield('title')</title>
</head>
<body class="px-0 bg-zinc-400">
    @yield('contents')
    @stack('script')
</body>
</html>