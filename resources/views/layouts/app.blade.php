<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'LaraBBs') - Laravel 进阶教程</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div id="app" class="{{ route_class() }}-page">
        @include('layouts._header')

        <div class="container">
            @yield('content')
        </div>

        @include('layouts._footer')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>