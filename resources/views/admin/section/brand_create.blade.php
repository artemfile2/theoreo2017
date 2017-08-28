@extends('admin.main')

@section('content')
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Основное</a></li>
        </ul>
        <div class="tab-content">
            @include('admin.tabs.brand_create_tab')
        </div>
    </div>

@endsection

@push('script')
<script src="{{ asset ("/js/admin/datepicker/bootstrap-datepicker.js") }}"></script>
<script src="{{ asset ("/js/admin/datepicker/locales/bootstrap-datepicker.ru.js") }}" charset="UTF-8"></script>
<script src="{{ asset ("/js/admin/theoreo.admin.actions.js") }}"></script>
<script src="{{ asset ("/js/admin/theoreo.admin.brands.js") }}"></script>
@endpush