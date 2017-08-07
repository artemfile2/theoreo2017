@extends('client.layouts.base')

@section('page')
    @include('client.parts.actions-list')
@endsection

@section('bottom-row')
    @include('client.parts.paginator')
@endsection