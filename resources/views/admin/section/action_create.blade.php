@extends('admin.main')

@section('content')

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Основное</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Фотографии</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Изображение</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <form action="" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Компания/Бренд *</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="brand_id">
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id') ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('brand_id'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('brand_id') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="title">Название акции *</label>
                            <input class="form-control" id="title" placeholder="Введите название акции" type="text" name="title" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image">Изображение</label>
                            <img class="img-responsive margin-bottom" src="{{ asset('/image/widen/400/default.jpg') }}" alt="">
                            <input id="image" type="file" name="image">
                            @if ($fileError)
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $fileError }}</div>
                            @endif
                            <a class="btn btn-primary" href="#tab_3" data-toggle="tab">Редактировать</a>
                        </div>
                        <div class="form-group">
                            <label for="description">Анонс</label>
                            <textarea class="form-control" id="description" rows="2" placeholder="Введите анонс акции" name="description">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('description') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="full-description">Полный анонс</label>
                            <textarea class="form-control" id="full-description" rows="5" placeholder="Введите полный анонс акции" name="full_text">{{ old('full_text') }}</textarea>
                            @if ($errors->has('full_text'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('full_text') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="eshop-link">Ссылка на интернет-магазин</label>
                            <input class="form-control" id="eshop-link" placeholder="http://eshop_name.com" type="text" name="link" value="{{ old('link') }}">
                            @if ($errors->has('link'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('link') }}</div>
                            @endif
                        </div>
                        <div class="form-group date">
                            <label>Дата начала акции</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control pull-right datepicker" id="" type="text" name="active_from" value="{{ old('active_from') }}">
                            </div>
                            @if ($errors->has('active_from'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('active_from') }}</div>
                            @endif
                        </div>
                        <div class="form-group date">
                            <label>Дата окончания акции</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control pull-right datepicker" id="" type="text" name="active_to" value="{{ old('active_to') }}">
                            </div>
                            @if ($errors->has('active_to'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('active_to') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Вид акции *</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="type_id">
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ?  'selected' : '' }}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('type_id'))
                                    <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('type_id') }}</div>
                                @endif
                        </div>
                        <div class="form-group">
                            <label>Статус акции *</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="status_id">
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" {{ old('status_id') ? 'selected' : '' }}>{{ $status->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status_id'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('status_id') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Категории *</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('category_id') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Теги</label>
                            <select id="tags" class="form-control select2 select2-hidden-accessible" multiple="multiple" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                                {{--@foreach($selectedTags as $tag_name)
                                    <option value="{{$tag_name}}" selected >{{$tag_name }}</option>
                                @endforeach--}}
                               
                                {{--@foreach($tags as $tag)
                                    @if (!in_array($tag->name, $selectedTags))
                                        <option value="{{$tag->name}}">{{$tag->name }}</option>  
                                    @endif       
                                @endforeach--}}
                            </select>
                            @if ($errors->has('tags'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('tags') }}</div>
                            @endif
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label for="rating">Рейтинг *</label>--}}
                            {{--<input class="form-control" id="rating" placeholder="" type="number" name="rating">--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label>Город проведения *</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="city_id">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('city_id'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('city_id') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-success margin-r-5" value="Сохранить">
                        <a href="{{ route('admin.actions.get_all') }}" class="btn btn-primary" >Назад</a>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="tab_2">
                <div class="box-body">
                    <div class="box box-widget">
                        <div class="box-header bg-blue">
                            <span>Условия загрузки</span>
                        </div>
                        <div class="box-footer">
                            <span>Максимальный размер одного файла - <b>1 Мб</b>.</span>
                        </div>
                        <div class="box-footer">
                            <span>Поддерживается мультизагрузка (множественная загрузка) файлов.</span>
                        </div>
                        <div class="box-footer">
                            <span>Разрешены только следующие форматы изображений - <b>JPG, GIF, PNG</b>.</span>
                        </div>
                        <div class="box-footer">
                            <span>Вы можете перетащить <b>(drag & drop)</b> файлы на эту страницу для последующей загрузки.</span>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success margin-bottom margin-r-5"><i class="fa fa-plus"></i> Выбрать файлы</button>
                    <button type="button" class="btn btn-danger margin-bottom margin-r-5"><i class="fa fa-download"></i> Загрузить все</button>
                    <button type="button" class="btn btn-warning margin-bottom"><i class="fa fa-ban"></i> Отменить загрузку</button>
                </div>
            </div>
            <div class="tab-pane" id="tab_3">

            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link href="{{ asset("/css/admin/datepicker3.css")}}" rel="stylesheet" type="text/css" />
@endpush

@push('script')
    <script src="{{ asset ("/js/admin/datepicker/bootstrap-datepicker.js") }}"></script>
    <script src="{{ asset ("/js/admin/datepicker/locales/bootstrap-datepicker.ru.js") }}" charset="UTF-8"></script>
    <script src="{{ asset ("/js/admin/theoreo.admin.actions.js") }}"></script>
@endpush