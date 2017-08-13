@extends('client.layouts.layout')

@section('header')
    @include('client.parts.header')
@endsection
@section('page-content')
    @yield('content')
    @yield('footer')
@endsection
