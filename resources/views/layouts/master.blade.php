<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ineeda</title>
    <meta name="description" content="A search input that morphs into a fullscreen search page." />
    <meta name="keywords" content="search, input, effect, morph, transition, inspiration" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="./css/styles.css">
    @yield('header')
</head>
<body>

@yield('content')

</body>
</html>