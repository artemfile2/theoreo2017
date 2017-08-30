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
            <label>Категории *</label>
            <div class="btn btn-primary plus" name="{{ csrf_token() }}" id="add_category"><i class="fa fa-plus"></i></div>
            <select class="form-control select2-selection--multiple select2 select2-hidden-accessible" multiple="multiple" style="width: 100%;" tabindex="-1" aria-hidden="true" id="category_box" name="categories[]">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('categories') ? collect(old('categories')) : $brand->category)->contains($category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @if ($errors->brand->has('categories'))
                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->brand->first('categories') }}</div>
            @endif
        </div>
        <div class="form-group" id="cities">
            <label for="cities">Города *</label>
            <select class="form-control select2-selection--multiple select2 select2-hidden-accessible" multiple="multiple" style="width: 100%;" tabindex="-1" aria-hidden="true" id="city_box" name="cities[]">
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ (old('cities') ? collect(old('cities')) : $brand->city)->contains($city->id) ? 'selected' : '' }}>{{ $city->name }}</option>
                @endforeach
            </select>
            @if ($errors->brand->has('cities'))
                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->brand->first('cities') }}</div>
            @endif
        </div>
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-success margin-r-5" value="Сохранить">
        <a href="{{ route('admin.brands.get_all') }}" class="btn btn-primary">Назад</a>
    </div>
</form>