@extends('admin.main')

@section('content')
    <a href="{{ route('admin.user.create') }}" type="button" class="btn btn-success margin-bottom"><i class="fa fa-plus"></i> Добавить пользователя</a>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab_1" data-toggle="tab" aria-expanded="false">Активные</a>
            </li>
            <li class="">
                <a href="#tab_2" data-toggle="tab" aria-expanded="false">Удаленные</a>
            </li>
        </ul>
        <div class="tab-content">
            @include('admin.tabs.users_active_tab')
            @include('admin.tabs.users_deleted_tab')
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset ("/js/admin/theoreo.admin.users.js") }}" type="text/javascript"></script>
@endpush