@extends('admin.main')

@section('content')
    @if($errors->brand->any())
@endif
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="first_tab @if(!$errors->brand->any()) active @endif "><a href="#tab_1" data-toggle="tab" aria-expanded="false">Основное</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Фотографии</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Изображение</a></li>
            <li class="brand-add-tab @if(!$errors->brand->any()) hidden @endif "><a href="#tab_4" data-toggle="tab" aria-expanded="false">Брэнд</a></li>
        </ul>
        <div class="tab-content">
            @include('admin.tabs.action_create_tab')
            @include('admin.tabs.action_photos_tab')
            @include('admin.tabs.action_image_tab')
            @include('admin.tabs.action_brand_tab')
        </div>
    </div>
    @if (Session::has('brand_added'))
        <div id="brand_added">Бренд успешно добавлен</div>
    @endif
@endsection

@push('styles')
    <link href="{{ asset("/css/admin/datepicker3.css")}}" rel="stylesheet" type="text/css" />
@endpush

@push('script')
    <script src="{{ asset ("/js/admin/datepicker/bootstrap-datepicker.js") }}"></script>
    <script src="{{ asset ("/js/admin/datepicker/locales/bootstrap-datepicker.ru.js") }}" charset="UTF-8"></script>
    <script src="{{ asset ("/js/admin/theoreo.admin.forms.js") }}"></script>
    <script src="{{ asset ("/js/admin/theoreo.admin.action.add.js") }}"></script>
    <script src="{{ asset ("/js/admin/theoreo.admin.brand.add.js") }}"></script>
@endpush