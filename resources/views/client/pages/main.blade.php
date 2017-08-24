@extends('client.layouts.primary')

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