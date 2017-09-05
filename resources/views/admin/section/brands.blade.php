@extends('admin.main')

@section('content')
    <a href="{{ route('admin.brands.create') }}" type="button" class="btn btn-success margin-bottom"><i class="fa fa-plus"></i> Добавить бренд</a>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="{{ (URL::current() == route('admin.brands.active')) ? "active" : '' }}"><a href="{{ route('admin.brands.active') }}">Активные</a></li>
            <li class="{{ (URL::current() == route('admin.brands.trashed')) ? "active" : '' }}"><a href="{{ route('admin.brands.trashed') }}">Удаленные</a></li>
        </ul>
        <div class="tab-content">
            @yield('tab')
        </div>
    </div>
@endsection

@push('script')
<script src="{{ asset ("/js/admin/theoreo.admin.simply_confirm.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/js/admin/theoreo.admin.brands.js") }}" type="text/javascript"></script>
@endpush