@extends('admin.main')

@section('content')
    <div class="box-body">
        <button type="button" class="btn btn-success margin-bottom margin-r-5"><i class="fa fa-download"></i> Взять на модерацию</button>
        <button type="button" class="btn btn-warning margin-bottom margin-r-5"><i class="fa fa-unlink"></i> Сбросить привязки</button>
        <button type="button" class="btn btn-danger margin-bottom"><i class="fa fa-close"></i> Удалить отмодерированные</button>

        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
                <div class="widget-user-image">
                    <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">Статистика по акциям в парсере</h3>
                {{--<h5 class="widget-user-desc">Lead Developer</h5>--}}
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li><a href="#">Ожидающие модерацию (новые): <span class="pull-right badge bg-yellow">429</span></a></li>
                    <li><a href="#">Сейчас на модерации: <span class="pull-right badge bg-aqua">25</span></a></li>
                    <li><a href="#">Прошедшие модерацию (отклоненные и одобренные): <span class="pull-right badge bg-green">4378</span></a></li>
                    <li><a href="#">Всего акций в парсере: <span class="pull-right badge bg-red">4832</span></a></li>
                </ul>
            </div>
        </div>
    </div>

@endsection