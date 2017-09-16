@extends('client.layouts.page-content')
@section('head_styles')
    <link href="{{ asset('js/slick/slick.css') }}" rel="stylesheet" type="text/css">
   <link href="{{ asset('css/social.css') }}" rel="stylesheet">
@endsection
@section('top-row')
    @include('client.parts.page-blocks.prev')
@endsection

@section('page')
    <div class="row-fluid">
        <article role="article" class="content-block clearfix">
            @include('client.parts.page-blocks.brand')
             <div class="sidebar">
                @include('client.parts.page-blocks.action')
                @include('client.parts.page-blocks.same')
             </div>
        </article>
    </div>
@endsection
@section('bottom_scripts')
    <script src="{{ asset('js/slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/slider.js') }}" type="text/javascript"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="{{ asset('js/social-likes.min.js') }}"></script>
@endsection