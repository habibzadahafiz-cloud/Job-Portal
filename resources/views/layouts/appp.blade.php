<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="csrf-token">
    <title>@yield('title') | {{ config('app.name') }}</title>
</head>
<body>
<header>THis is header seaction</header>
@yield("content")
<footer>This is footer seaction</footer>

</body>
</html>
