@extends('admin.main')

@section('content')

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Основное</a></li>
        </ul>
        <div class="tab-content">
            @include('admin.tabs.brand_edit_tab')
        </div>
    </div>

@endsection

@push('script')
    <script src="{{ asset ("/js/admin/theoreo.admin.forms.js") }}"></script>
    <script src="{{ asset ("/js/admin/theoreo.admin.brand.add.js") }}"></script>
@endpush