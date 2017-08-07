<!DOCTYPE html>
<html lang="ru-RU">
    <head>
        @include('client.parts.head')
        @yield('head_styles')
        @yield('head_scripts')
    </head>
        
    <body>
        @include('client.parts.noscript')
        @yield('header')

        <main class="main clearfix" role="main">
            @yield('content')
            @yield('footer')
        </main>

        @section('bottom_scripts')
            @include('client.parts.js-shit')
        @show
        @stack('styles')
        @stack('script')
    </body>
</html>