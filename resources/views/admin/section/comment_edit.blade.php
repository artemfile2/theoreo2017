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
                            <label for="name">Текст комментария *</label>
                            <input class="form-control" id="text" placeholder="Текст комментария" type="text" name="text" value="{{ $comment->text }}">
                            @if ($errors->has('text'))
                                <div class="alert alert-danger alert-dismissibler margin-top">{{ $errors->first('text') }}</div>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="1">
                    <div class="box-footer">
                        <input type="submit" class="btn btn-success margin-r-5" value="Сохранить">
                        <a href="{{ route('admin.comments.list_all') }}" class="btn btn-primary">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection