@extends('client.layouts.page-content')
            
@section('page')
    <div class="container">
        <h1 class="font-dyn">Ошибка 404. Страница не найдена.</h1>
        <h3>Вы ошиблись при наборе адреса либо такой страницы действительно не существует.<br>
        Вернитесь на <a href="{{ route('client.index') }}" class="link-is-active">главную страницу</a> и начните все сначала.
        </h3>
    </div>
@endsection