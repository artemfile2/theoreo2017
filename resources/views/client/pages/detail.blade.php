@extends('client.layouts.base')
            
@section('top-row')
    @include('client.parts.prev')
@endsection

@section('page')
    <div class="row-fluid">
        <article role="article" class="content-block clearfix">
            @include('client.parts.brand')
             <div class="sidebar col-xs-24 col-sm-12">
                @include('client.parts.action')
                @include('client.parts.comments')
                @include('client.parts.same')
            </div>
        </article>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset ("/css/magnific-popup.css") }}">
    <link rel="stylesheet" href="{{ asset ("/css/theoreo.site.comments.css") }}">
@endpush
@push('script')
    <script src="{{ asset ("/js/jquery.magnific-popup.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/js/theoreo.site.comments.js") }}" type="text/javascript"></script>
@endpush