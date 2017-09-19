@extends('admin.base')

@section('content')
@endsection

@push('main-styles')
    <link href="{{ asset("/css/admin/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/css/admin/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/css/admin/select2.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/css/admin/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/css/admin/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/css/admin/icheck/all.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/css/admin/icheck/square/blue.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/js/admin/impromptu/jquery-impromptu.min.css")}}" rel="stylesheet" type="text/css" />

@endpush

@push('main-script')
    <script src="{{ asset ("/js/admin/jquery-2.2.3.min.js") }}"></script>
    <script src="{{ asset ("/js/admin/bootstrap.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/js/admin/jquery.dataTables.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/js/admin/dataTables.bootstrap.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/js/admin/jquery.slimscroll.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/js/admin/fastclick.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/js/admin/app.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/js/admin/select2/select2.full.min.js") }}" charset="UTF-8"></script>
    <script src="{{ asset ("/js/admin/i18n/ru.js") }}" charset="UTF-8"></script>
    <script src="{{ asset ("/js/admin/icheck/icheck.min.js") }}" charset="UTF-8"></script>
    <script src="{{ asset ("/js/admin/icheck/icheck.js") }}" charset="UTF-8"></script>
    <script src="{{ asset ("/js/admin/impromptu/jquery-impromptu.min.js") }}"></script>
@endpush

