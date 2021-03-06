<form action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="box-body">
        <div class="form-group">
            <label>Компания/Бренд *</label>
            <div class="btn btn-primary plus" id="add_brand"><i class="fa fa-plus"></i></div>
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
            <label for="full-description">Полный анонс *</label>
            <textarea class="form-control" id="full-description" rows="5" placeholder="Введите полный анонс акции" name="description">{{ old('description') }}</textarea>
            @if ($errors->has('description'))
                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('description') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="shop-link">Ссылка на интернет-магазин</label>
            <input class="form-control" id="eshop-link" placeholder="http://eshop_name.com" type="text" name="shop_link" value="{{ old('shop_link') }}">
            @if ($errors->has('shop_link'))
                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('shop_link') }}</div>
            @endif
        </div>
        <div class="form-group date">
            <label>Дата начала акции *</label>
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
            <label>Дата окончания акции *</label>
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
        <div class="form-group">
            <label for="addresses">Адреса</label>
            <textarea class="form-control" id="addresses" rows="5" placeholder="Введите адреса проведения акции" name="addresses">{{ old('addresses') }}</textarea>
            <p class="help-block">Адреса указываются списком по одному на строчку</p>
            @if ($errors->has('addresses'))
                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('addresses') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="phones">Телефоны</label>
            <textarea class="form-control" id="phones" rows="5" placeholder="Введите контактные телефоны" name="phones">{{ old('phones') }}</textarea>
            <p class="help-block">Телефоны указываются списком по одному на строчку</p>
            @if ($errors->has('phones'))
                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('phones') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label>Теги</label>
            <div class="btn btn-primary plus" name="{{ csrf_token() }}" id="add_tag"><i class="fa fa-plus"></i></div>

            <select id="tags" class="form-control select2 select2-hidden-accessible" multiple="multiple" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}" {{ collect(old('tags'))->contains( $tag->id) ? 'selected' : '' }}>{{$tag->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('tags'))
                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('tags') }}</div>
            @endif
        </div>
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-success margin-r-5" value="Сохранить">
        <a href="{{ route('admin.actions.active') }}" class="btn btn-primary" >Назад</a>
    </div>
</form>