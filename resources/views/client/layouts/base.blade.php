@extends('client.layouts.layout')

@section('header')
    @include('client.parts.header')
@endsection

@section('content')
    <div class="wrapper">
        @yield('left-block')

        <div class="right-block">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="top-nav clearfix">
                        <div class="col-xs-24">
                            @yield('top-row')
                        </div>
                    </div>
                </div>
                <div class="row">
                    @yield('page')
                </div>
                @yield('bottom-row')
            </div>
        </div>       
    </div>
@endsection

@section('footer')
    @include('client.parts.footer')
@endsection