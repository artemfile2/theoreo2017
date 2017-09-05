@extends('admin.main')

@section('content')

    <section class="content">
        <div class="row">
            @can ('users_management', \App\Models\User::class)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="{{ route('admin.user.active') }}">
                        <div class="info-box">
                        <span class="info-box-icon bg-light-blue">
                            <i class="fa fa-users"></i>
                        </span>
                            <div class="info-box-content">
                            <span class="info-box-text">
                                Пользователи
                            </span>
                                <span class="info-box-number">
                                {{ $users->count() }}
                            </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endcan
            @can ('brand_management', \App\Models\User::class)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="{{ route('admin.brands.active') }}">
                        <div class="info-box">
                        <span class="info-box-icon bg-green">
                            <i class="fa fa-building"></i>
                        </span>
                            <div class="info-box-content">
                            <span class="info-box-text">
                                Компании
                            </span>
                            <span class="info-box-number">
                                {{ $brands->count() }}
                            </span>
                            </div>
                        </div>
                    </a>
                </div>
           @endcan
            @can('actions_management', \App\Models\User::class)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="{{ route('admin.actions.active') }}">
                        <div class="info-box">
                        <span class="info-box-icon bg-red">
                            <i class="fa fa-fire"></i>
                        </span>
                            <div class="info-box-content">
                            <span class="info-box-text">
                                Акции
                            </span>
                                <span class="info-box-number">
                                {{ $actions->count() }}
                            </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endcan
            <div class="col-lg-4 col-md-6 col-sm-12">
                <a href="{{ route('admin.content.get_all') }}">
                    <div class="info-box">
                    <span class="info-box-icon bg-yellow">
                        <i class="fa fa-th"></i>
                    </span>
                        <div class="info-box-content">
                        <span class="info-box-text">
                            Контент
                        </span>
                            <span class="info-box-number">
                            {{ $vkfeeds->count() }}
                        </span>
                        </div>
                    </div>
                </a>
            </div>
            {{--@can('control', \App\Models\Tag::class)--}}
                {{--<div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="#">
                        <div class="info-box">
                        <span class="info-box-icon bg-teal">
                            <i class="fa fa-tags"></i>
                        </span>
                            <div class="info-box-content">
                            <span class="info-box-text">
                                Теги
                            </span>
                                <span class="info-box-number">
                                --}}{{--{{ $tags->count() }}--}}{{--
                                    {{ '555' }}
                            </span>
                            </div>
                        </div>
                    </a>
                </div>--}}
           {{-- @endcan--}}
            <div class="col-lg-4 col-md-6 col-sm-12">
                <a href="{{ route('admin.logs') }}">
                    <div class="info-box">
                    <span class="info-box-icon bg-purple">
                        <i class="fa fa-tasks"></i>
                    </span>
                        <div class="info-box-content">
                        <span class="info-box-text">
                            Логи паpсера
                        </span>
                            <span class="info-box-number">
                            3534
                        </span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <a href="{{ route('admin.queries') }}">
                    <div class="info-box">
                    <span class="info-box-icon bg-aqua">
                        <i class="fa fa-search"></i>
                    </span>
                        <div class="info-box-content">
                        <span class="info-box-text">
                            Поисковые запросы
                        </span>
                            <span class="info-box-number">
                            {{ $queries->count() }}
                        </span>
                        </div>
                    </div>
                </a>
            </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <a href="{{ route('parser.vksimple') }}">
                        <div class="info-box">
                    <span class="info-box-icon bg-teal">
                        <i class="fa fa-newspaper-o"></i>
                    </span>
                            <div class="info-box-content">
                        <span class="info-box-text">
                            Парсинг
                        </span>
                                <span class="info-box-number">
                            Получить свежие данные
                        </span>
                            </div>
                        </div>
                    </a>
                </div>
        </div>
    </section>

@endsection