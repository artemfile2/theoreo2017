<!DOCTYPE html>
<html lang="ru-RU">
    <head>
        @include('client.parts.head-base')
        @yield('head_styles')
        @yield('head_scripts')
    </head>
        
    <body>
        @include('client.parts.noscript')
        @yield('header')
        @yield('filters-block')
        @yield('page-content')
        @yield('bottom_scripts')
    </body>
</html>