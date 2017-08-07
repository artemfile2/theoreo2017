@extends('client.layouts.base')
            
@section('top-row')
	<h2 class="font-dyn">Ошибка 404. Страница не найдена.</h2>
@endsection

@section('page')
    <p>Вы ошиблись при наборе адреса либо такой страницы действительно не существует.<br>
    Вернитесь на <a href="{{ route('home') }}">главную страницу</a> и начните все сначала.
    </p>
@endsection