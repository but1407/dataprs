<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet"
        href=
            "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">

    {{-- <link rel="manifest" href="/favicon/manifest.json"> --}}
    {{-- <meta name="msapplication-TileColor" content="#ffffff"> --}}
    {{-- <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png"> --}}
    <meta name="theme-color" content="#ffffff">
    {{-- <link rel="stylesheet" href="/../public/font/themify-icons-font/themify-icons/themify-icons.css"> --}}

    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
</head>

<body>
    <div id="app">
        <!-- Sử dụng component Example.vue -->
        <example></example>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>

</body>

</html>
