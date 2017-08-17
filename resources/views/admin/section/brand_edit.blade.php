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
                            <input class="form-control" id="name" placeholder="Имя бренда" type="text" name="name" value="{{ $brand->name }}">
                            @if ($errors->has('name'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="logo">Логотип бренда</label>
                            @if($brand->upload)
                                <img class="img-responsive margin-bottom" src="{{ asset('/image/widen/400/' . $brand->upload->path . '.' . $brand->upload->ext) }}" alt="">
                            @else
                                <img class="img-responsive margin-bottom" src="{{ asset('/image/widen/400/default.jpg') }}"  alt="">
                            @endif

                            <input id="logo" type="file" name="logo">
                            @if ($fileError)
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $fileError }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                        <label for="address">Адреса *</label>
                        <textarea class="form-control" id="address" rows="5" placeholder="Введите адреса торговых точек" name="addresses">{{ $brand->addresses }}</textarea>
                        <p class="help-block">Адреса указываются списком по одному на строчку</p>
                            @if ($errors->has('addresses'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('addresses') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phones">Телефоны *</label>
                            <textarea class="form-control" id="phones" rows="5" placeholder="+ 7 (999) 999 99 99" name="phones">{{ $brand->phones }}</textarea>
                            <p class="help-block">Телефоны указываются списком по одному на строчку</p>
                            @if ($errors->has('phones'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('phones') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="site_link">Ссылка на сайт</label>
                            <input class="form-control" id="site-link" placeholder="http://site_name.com" type="text" name="site_link" value="{{ $brand->site_link }}">
                            @if ($errors->has('site_link'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('site_link') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="vk-link">Ссылка на группу VK *</label>
                            <input class="form-control" id="vk-link" placeholder="https://vk.com/group_name" type="text" name="vk_link" value="{{ $brand->vk_link}}">
                            @if ($errors->has('vk_link'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('vk_link') }}</div>
                            @endif
                        </div>
                        <div class="form-group" id="settings">
                            <label for="settings">Настройки бренда</label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_federal" value="1">
                                    Федеральный бренд
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_internet_shop" value="1">
                                    Интернет-магазин
                                    </label>
                            </div>
                        </div>
                        <div class="form-group" id="categories">
                            <label for="categories">Категории *</label>
                            @foreach($categories as $category)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="{{ $category->code }}" value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group" id="cities">
                            <label for="cities">Города *</label>
                            @foreach($cities as $city)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="{{ $city->code }}" value="{{ $city->id }}">
                                        {{ $city->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{--Временное решение !!!!!--}}

                    <input type="hidden" name="user_id" value="1">
                    <div class="box-footer">
                        <input type="submit" class="btn btn-success margin-r-5" value="Сохранить">
                        <a href="{{ route('admin.brands.get_all') }}" class="btn btn-primary">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection