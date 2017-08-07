@extends('client.layouts.primary')

@section('top-row')
    <div class="row-fluid">
        <h2>По вашему запросу результатов не найдено</h2>
        Измените критерии фильтра или поисковый запрос и попробуйте снова.
    </div>
    @include('client.parts.sorting')
    <h1>{{ $h1Title }}</h1>
@endsection