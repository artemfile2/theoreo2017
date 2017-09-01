@extends('admin.main')

@section('content')
    <a type="button" class="btn btn-success margin-bottom" href="{{ route('admin.actions.create') }}"><i class="fa fa-plus"></i> Добавить акцию</a>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="{{ (URL::current() == route('admin.actions.active')) ? "active" : '' }}"><a href="{{ route('admin.actions.active') }}">Активные</a></li>
            <li class="{{ (URL::current() == route('admin.actions.trashed')) ? "active" : '' }}"><a href="{{ route('admin.actions.trashed') }}">Удаленные</a></li>
        </ul>
        <div class="tab-content">
            @yield('tab')
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset ("/js/admin/theoreo.admin.simply_confirm.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/js/admin/theoreo.admin.actions.js") }}" type="text/javascript"></script>
@endpush