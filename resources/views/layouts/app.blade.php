<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'Planner')}}</title>

    <link rel="stylesheet" href="{{asset('css/bulma.css')}}" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{ mix('/css/packages.css') }}" />
</head>
<body>
    <div id="app">

        @include('layouts.partials.bar')

        @include('layouts.partials.nav')

        @yield('content')

        @include('layouts.partials.footer')

    </div>

    @include('layouts.partials.notifications')

    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/custom.js') }}"></script>
</body>
</html>
