@extends('client.layouts.base')
@section('content')
    <main class="main clearfix" role="main">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="top-nav clearfix">
                        @yield('top-row')
                    </div>
                </div>
                <div class="row">
                    @yield('page')
                </div>
                @yield('bottom-row')
            </div>
        </div>
    </main>
@endsection
@section('footer')
    <footer>
        @include('client.parts.footer')
    </footer>
@endsection
