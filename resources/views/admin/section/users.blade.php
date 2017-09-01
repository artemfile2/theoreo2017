@extends('admin.main')

@section('content')
    <a href="{{ route('admin.user.create') }}" type="button" class="btn btn-success margin-bottom"><i class="fa fa-plus"></i> Добавить пользователя</a>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="{{ (URL::current() == route('admin.user.active')) ? "active" : '' }}"><a href="{{ route('admin.user.active') }}">Активные</a></li>
            <li class="{{ (URL::current() == route('admin.user.trashed')) ? "active" : '' }}"><a href="{{ route('admin.user.trashed') }}">Удаленные</a></li>
        </ul>
        <div class="tab-content">
            @yield('tab')
        </div>
    </div>
@endsection

@push('script')
<script src="{{ asset ("/js/admin/theoreo.admin.simply_confirm.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/js/admin/theoreo.admin.users.js") }}" type="text/javascript"></script>
@endpush