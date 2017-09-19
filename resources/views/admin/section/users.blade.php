@extends('admin.main')

@section('content')
    <a href="{{ route('admin.user.create') }}" type="button" class="btn btn-success margin-bottom"><i class="fa fa-plus"></i> Добавить пользователя</a>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="{{ (URL::current() == route('admin.users')) ? "active" : '' }}"><a href="{{ route('admin.users') }}">Активные</a></li>
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