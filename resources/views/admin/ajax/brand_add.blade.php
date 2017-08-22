@extends('admin.ajax-main')

@section('content')
      @include('admin.forms.brand_create_form')
      <input type="button" id="sendForm" class="btn btn-success margin-r-5" value="Сохранить">
@endsection

@push('main-styles')
<link href="{{ asset("/css/admin/admin-style.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/js/admin/impromptu/jquery-impromptu.min.css")}}" rel="stylesheet" type="text/css" />
@endpush

@push('main-script')
<script src="{{ asset ("/js/admin/script_add_brand.js") }}"></script>
<script src="{{ asset ("/js/admin/impromptu/jquery-impromptu.min.js") }}"></script>
@endpush

