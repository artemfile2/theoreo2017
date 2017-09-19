<form action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="box-body">
        <div class="form-group">
            <label for="login">Логин  *</label>
            <input class="form-control" id="login" placeholder="Введите логин" type="text" name="login" value="{{ old('login') }}">
        </div>
        @if ($errors->has('login'))
            <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('login') }}</div>
        @endif
        <div class="form-group">
            <label for="name">Имя *</label>
            <input class="form-control" id="name" placeholder="Введите имя" type="text" name="name" value="{{ old('name') }}">
        </div>
        @if ($errors->has('name'))
            <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('name') }}</div>
        @endif
        <div class="form-group">
            <label for="surname">Фамилия *</label>
            <input class="form-control" id="surname" placeholder="Введите фамилию" type="text" name="surname" value="{{ old('surname') }}">
        </div>
        @if ($errors->has('surname'))
            <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('surname') }}</div>
        @endif
        <div class="form-group">
            <label for="avatar">Аватар</label>
            <img class="img-responsive margin-bottom" src="{{ asset('/image/fit/300/300/default.jpg') }}" alt="">
            <input id="avatar" type="file" name="avatar" value="{{ old('avatar') }}">
        </div>
        @if ($fileError)
            <div class="alert alert-danger alert-dismissibler margin-top">{{ $fileError }}</div>
        @endif

        <div class="form-group">
            <label for="password">Пароль *</label>
            <input class="form-control" id="password" placeholder="Введите пароль" type="password" name="password">
        </div>
        @if ($errors->has('password'))
            <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('password') }}</div>
        @endif
        <div class="form-group">
            <label for="password2">Повтор пароля *</label>
            <input class="form-control" id="password2" placeholder="Введите пароль еще раз" type="password" name="password2">
        </div>
        @if ($errors->has('password2'))
            <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('password2') }}</div>
        @endif
        <div class="form-group" id="gender">
            <label for="gender">Пол *</label>
            <select id="gender" class="form-control select2" name="gender">
                @foreach($genders as $gender)
                    <option value="{{ $gender }}" {{ old('gender') == $gender ? 'selected' : '' }}>{{ $gender }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" id="groups">
            <label for="groups">Группа пользователя *</label>
            <select id="roles" class="form-control select2" name="role_id">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        @if ($errors->has('role_id'))
            <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('role_id') }}</div>
        @endif
    </div>
    <div class="box-footer">
        <input type="submit" class="btn btn-success margin-r-5" value="Сохранить">
        <a href="{{ route('admin.users') }}" class="btn btn-primary" >Назад</a>
    </div>
</form>