@extends('admin.main')

@section('content')

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Основное</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Фотографии</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Изображение</a></li>
        </ul>
        <div class="tab-content">
            @include('admin.tabs.action_edit_tab')
            @include('admin.tabs.action_photos_tab')
            @include('admin.tabs.action_image_tab')
        </div>
    </div>

@endsection

@push('styles')
    <link href="{{ asset("/css/admin/datepicker3.css")}}" rel="stylesheet" type="text/css" />
@endpush

@push('script')
    <script src="{{ asset ("/js/admin/datepicker/bootstrap-datepicker.js") }}"></script>
    <script src="{{ asset ("/js/admin/datepicker/locales/bootstrap-datepicker.ru.js") }}" charset="UTF-8"></script>
    <script src="{{ asset ("/js/admin/theoreo.admin.forms.js") }}"></script>
    <script src="{{ asset ("/js/admin/theoreo.admin.action.add.js") }}"></script>
@endpush