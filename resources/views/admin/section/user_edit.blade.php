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
                            <label for="name">Имя *</label>
                            <input class="form-control" id="name" placeholder="Введите имя" type="text" name="name" value="{{ $user->name }}">
                        </div>
                        @if ($errors->has('name'))
                            <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('name') }}</div>
                        @endif
                        <div class="form-group">
                        <label for="surname">Фамилия *</label>
                        <input class="form-control" id="surname" placeholder="Введите фамилию" type="text" name="surname" value="{{ $user->surname }}">
                        </div>
                        <div class="form-group">
                            <label for="avatar">Аватар</label>
                            @if($user->upload)
                                <img class="img-responsive margin-bottom" src="{{ asset('/image/fit/300/300/' . $user->upload->path . '.' . $user->upload->ext) }}" alt="{{ $user->name }}">
                            @else
                                <img class="img-responsive margin-bottom" src="{{ asset('/image/fit/300/300/default.jpg') }}" alt="{{ $user->name }}">
                            @endif
                            <input id="avatar" type="file" name="avatar">
                        </div>
                        @if ($errors->has('avatar'))
                            <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('avatar') }}</div>
                        @endif
                        <div class="form-group">
                            <label for="email">Логин (E-mail) *</label>
                            <input class="form-control" id="email" placeholder="Введите логин или email" type="text" name="login" value="{{ $user->login}}">
                        </div>
                        @if ($errors->has('email'))
                            <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('email') }}</div>
                        @endif
                        <div class="box box-solid box-primary collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Сменить пароль</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="password">Пароль *</label>
                                    <input class="form-control" id="password" placeholder="Введите пароль" type="password" name="password" >
                                </div>
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('password') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="password2">Повтор пароля *</label>
                                    <input class="form-control" id="password2" placeholder="Введите пароль еще раз" type="password" name="password2" value="">
                                </div>
                                @if ($errors->has('password2'))
                                    <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('password2') }}</div>
                                @endif
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                        <div class="form-group" id="groups">
                            <label for="groups">Группа пользователя *</label>
                            <select id="roles" class="form-control select2" name="role_id">
                                @if(old('role_id'))
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                @else
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        @if ($errors->has('role_id'))
                            <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('role_id') }}</div>
                        @endif
                        <div class="form-group">
                            <label for="gender">Пол *</label>
                            <select id="gender" class="form-control select2" name="gender">
                                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Мужчина</option>
                                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Женшина</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-success margin-r-5" value="Сохранить">
                        <a href="{{ route('admin.user.get_all') }}" class="btn btn-primary" >Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="{{ asset ("/js/admin/theoreo.admin.users.js") }}"></script>
@endpush