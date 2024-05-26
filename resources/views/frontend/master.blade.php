<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | Online Shopping In Bangladesh With Home Delivery</title>
    @include('frontend.includes.style')
</head>

<body>
    @include('frontend.includes.header')

    <main class="bg-light">
        @yield('content')
    </main>
    
    @include('frontend.includes.footer')
    @include('frontend.includes.script')
    
    @stack('front-script')
</body>
</html>