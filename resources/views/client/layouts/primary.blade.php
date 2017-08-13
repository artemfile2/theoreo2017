@extends('client.layouts.page-content')
@section('filters-block')
    @include('client.parts.filters')
@endsection
@section('page')
    @include('client.parts.actions-list')
@endsection

@section('bottom-row')
    @include('client.parts.paginator')
@endsection