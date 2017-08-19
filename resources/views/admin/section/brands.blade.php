@extends('admin.main')

@section('content')
    <a href="{{ route('admin.brands.create') }}" type="button" class="btn btn-success margin-bottom"><i class="fa fa-plus"></i> Добавить бренд</a>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Активные</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Удаленные</a></li>
        </ul>
        <div class="tab-content">
            @include('admin.tabs.brands_active_tab')
            @include('admin.tabs.brands_deleted_tab')
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset ("/js/admin/theoreo.admin.brands.js") }}" type="text/javascript"></script>
@endpush