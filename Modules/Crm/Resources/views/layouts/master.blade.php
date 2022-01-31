<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="forest">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')

        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ url(mix('js/app.js')) }}" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    input[type="range"]::-moz-range-track {
        padding: 0 10px;
        background: repeating-linear-gradient(to right, 
          #ccc, 
          #ccc 10%, 
          #000 10%, 
          #000 11%, 
          #ccc 11%, 
          #ccc 20%);
      }</style>
</head>

<body> 

    
    @yield('body')
    
    @livewireScripts
</body>

</html>
