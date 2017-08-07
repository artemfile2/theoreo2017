<!doctype html>

<html>

@include('admin.parts.head')

<body class="skin-blue sidebar-mini">

    <div class="wrapper">

        <!-- Main Header -->
        @include('admin.parts.header')

        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.parts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @include('admin.parts.content')

        <!-- Main Footer -->
        @include('admin.parts.footer')

    </div><!-- ./wrapper -->

    @stack('main-script')
    @stack('script')

</body>

</html>