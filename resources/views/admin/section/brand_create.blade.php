@extends('admin.main')

@section('content')
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Основное</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <form action="" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Имя бренда *</label>
                            <input class="form-control" id="name" placeholder="Имя бренда" type="text" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="logo">Логотип бренда</label>
                            <img class="img-responsive margin-bottom" src="{{ asset('/image/widen/400/default.jpg') }}" alt="">
                            <input id="logo" type="file" name="logo">
                            @if ($errors->has('logo'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('logo') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="addresses">Адреса точек продаж</label>
                            <textarea class="form-control" id="address" rows="5" placeholder="г. Барнаул, ул. Конотопская, д. 5, стр. 3" name="adresses"></textarea>
                            <p class="help-block">Адреса указываются списком по одному на строчку</p>
                        </div>
                        <div class="form-group">
                            <label for="phones">Телефоны</label>
                            <textarea class="form-control" id="phones" rows="5" placeholder="+ 7 (999) 999 99 99" name="phones">{{ old('phones') }}</textarea>
                            @if ($errors->has('phones'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('phones') }}</div>
                            @endif
                            <p class="help-block">Телефоны указываются списком по одному на строчку</p>
                        </div>
                        <div class="form-group">
                            <label for="site-link">Ссылка на сайт</label>
                            <input class="form-control" id="site-link" placeholder="http://site_name.com" type="text" name="site_link" value="{{ old('site_link') }}">
                            @if ($errors->has('site_link'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('site_link') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="vk-link">Ссылка на страницу группы в VK</label>
                            <input class="form-control" id="vk-link" placeholder="https://vk.com/group_name" type="text" name="vk_link" value="{{ old('vk_link') }}">
                            @if ($errors->has('vk_link'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('vk_link') }}</div>
                            @endif
                        </div>
                        {{--<div class="form-group" id="settings">--}}
                            {{--<label for="settings">Настройки бренда</label>--}}
                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox" name="federal">--}}
                                    {{--Федеральный бренд--}}
                                {{--</label>--}}
                            {{--</div>--}}
                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox" name="eshop">--}}
                                    {{--Интернет-магазин--}}
                                {{--</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group" id="categories">--}}
                            {{--<label for="categories">Категории *</label>--}}
                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox" name="categoriesId">--}}
                                    {{--Кафе / рестораны--}}
                                {{--</label>--}}
                            {{--</div>--}}
                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox" name="categoriesId">--}}
                                    {{--Одежда и аксессуары--}}
                                {{--</label>--}}
                            {{--</div>--}}
                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox" name="categoriesId">--}}
                                    {{--Продукты--}}
                                {{--</label>--}}
                            {{--</div>--}}
                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox" name="categoriesId">--}}
                                    {{--Развлечения--}}
                                {{--</label>--}}
                            {{--</div>--}}
                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox" name="categoriesId">--}}
                                    {{--Спорт / здоровье / красота--}}
                                {{--</label>--}}
                            {{--</div>--}}
                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox" name="categoriesId">--}}
                                    {{--Разное--}}
                                {{--</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group" id="regions">--}}
                            {{--<label for="regions">Области *</label>--}}
                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox" name="regionId">--}}
                                    {{--Саратовская область--}}
                                {{--</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group" id="cities">--}}
                            {{--<label for="cities">Города *</label>--}}
                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input type="checkbox" name="citiesId">--}}
                                    {{--Саратов--}}
                                {{--</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>

                    {{--Временное решение !!!!!--}}

                    <input type="hidden" name="user_id" value="1">
                    {{--<input type="hidden" name="upload_id" value="1">--}}
                    <div class="box-footer">
                        <input type="submit" class="btn btn-success margin-r-5" value="Сохранить">
                        <a href="{{ route('admin.brands.get_all') }}" class="btn btn-primary">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection