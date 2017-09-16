@extends('client.layouts.primary')

@section('head_styles')
    {{--<link href="{{ asset('js/slick/slick.css') }}" rel="stylesheet" type="text/css">--}}
    <link href="{{ asset('css/social.css') }}" rel="stylesheet">
@endsection

@section('top-row')
    @include('client.parts.page-blocks.sorting')
@endsection

@section('page')

    @if(isset($title))
        <div class="row">
            <h2>{{ $title->name }}</h2>
        </div>
    @endif

    @if(isset($query))
        <div class="container">
            @if($actions && count($actions)> 0)
                <h2>Вы искали - "{{ $query }}"</h2>
                <h3>По запросу "{{ $query }}" найдено результатов: <strong>{{ $actions->count() }}</strong></h3>
            @else
                <h2>По запросу "{{ $query }}" результатов не найдено</h2>
                <h3>Измените критерии фильтра или поисковый запрос и попробуйте снова.</h3>
            @endif
        </div>
    @endif

    @parent

@endsection

@section('bottom_scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="{{ asset('js/social-likes.min.js') }}"></script>
@endsection