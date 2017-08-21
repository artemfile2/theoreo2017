@extends('admin.ajax-main')

@section('content')
      @include('admin.parts.forms.add_brand_form')
      <input type="button" id="sendForm" class="btn btn-success margin-r-5" value="Сохранить">
@endsection

@push('main-styles')
<link href="{{ asset("/css/admin/admin-style.css")}}" rel="stylesheet" type="text/css" />
@endpush

@push('main-script')
<script src="{{ asset ("/js/admin/script_add_brand.js") }}"></script>
@endpush

