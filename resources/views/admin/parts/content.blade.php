<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $title }}
            <small>Optional description</small>
        </h1>
    </section>
    <ol class="breadcrumb margin">
        <li><a href="{{--{{ route('admin.show_admin') }}--}}"><i class="fa fa-home"></i></a></li>
        <li class="active">{{ $title }}</li>
    </ol>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        @section('content')
        @show

    </section>
</div>