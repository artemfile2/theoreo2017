@extends('admin.main')

@section('content')
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Новые</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Просмотренные</a></li>
        </ul>
        <div class="tab-content">
            @include('admin.tabs.premoderation_new_tab')
            @include('admin.tabs.premoderation_old_tab')
        </div>
    </div>
@endsection

@push('styles')
    {{--<link href="{{ asset("/css/admin/datepicker3.css")}}" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{ asset("/js/admin/jquery_confirm/jquery_confirm.css")}}" rel="stylesheet" type="text/css" />--}}
@endpush

@push('script')
    <script src="{{ asset ("/js/admin/buttons.js") }}"></script>
    {{--<script src="{{ asset ("/js/admin/jquery_confirm/jquery_confirm.js") }}"></script>--}}
    {{--<script src="{{ asset ("/js/admin/theoreo.admin.brands.js") }}" type="text/javascript"></script>--}}
@endpush