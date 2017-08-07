@extends('admin.main')

@section('content')
    {{--<a href="{{ route('admin.users.create') }}" type="button" class="btn btn-success margin-bottom"><i class="fa fa-plus"></i> Добавить пользователя</a>--}}
    <a href="#" type="button" class="btn btn-success margin-bottom">
        <i class="fa fa-plus"></i> Добавить пользователя
    </a>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab_1" data-toggle="tab" aria-expanded="false">Активные</a>
            </li>
            <li class="">
                <a href="#tab_2" data-toggle="tab" aria-expanded="false">Удаленные</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="users" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="users_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 1%" aria-sort="ascending" aria-label="">
                                            ID
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 4%" aria-label="">
                                            Аватар
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 23%" aria-label="">
                                            Логин
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 23%" aria-label="">
                                            Email
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 18%" aria-label="">
                                            Роль
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 15%" aria-label="">
                                            Дата создания
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 15%" aria-label="">
                                            Дата изменения
                                        </th>
                                        <th style="width: 1%">
                                            Управление
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
 {{--                               @foreach($users as $user)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $user->id }}</td>
                                        <td>
                                            @if($user->upload)
                                                <img class="table-img" src="{{ asset('/image/fit/100/100/' . $user->upload->path . '.' . $user->upload->ext) }}" alt="{{ $user->name }}">
                                            @else
                                                <img class="table-img" src="{{ asset('/image/fit/100/100/default.jpg') }}" alt="{{ $user->name }}">
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->name }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td class="control">
                                            <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn" title="Редактировать">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('api.users.trash', ['id' => $user->id]) }}" class="btn deleteUser" title="Переместить в корзину">
                                                <i class="fa fa-trash"></i>
                                            </a>

                                            <a href="#" class="btn" title="Редактировать">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn deleteUser" title="Переместить в корзину">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach--}}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Аватар</th>
                                    <th rowspan="1" colspan="1">Логин пользователя</th>
                                    <th rowspan="1" colspan="1">Email пользователя</th>
                                    <th rowspan="1" colspan="1">Роль пользователя</th>
                                    <th rowspan="1" colspan="1">Дата создания</th>
                                    <th rowspan="1" colspan="1">Дата изменения</th>
                                    <th rowspan="1" colspan="1">Управление</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_2">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="usersDeleted" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="usersDeleted_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="usersDeleted" rowspan="1" colspan="1" style="width: 1%" aria-sort="ascending" aria-label="">
                                            ID
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 4%" aria-label="">
                                            Аватар
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="usersDeleted" rowspan="1" colspan="1" style="width: 23%" aria-label="">
                                            Логин пользователя
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="usersDeleted" rowspan="1" colspan="1" style="width: 23%" aria-label="">
                                            Email пользователя
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="usersDeleted" rowspan="1" colspan="1" style="width: 18%" aria-label="">
                                            Роль пользователя
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="usersDeleted" rowspan="1" colspan="1" style="width: 15%" aria-label="">
                                            Дата создания
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="usersDeleted" rowspan="1" colspan="1" style="width: 15%" aria-label="">
                                            Дата изменения
                                        </th>
                                        <th style="width: 1%">
                                            Управление
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                {{--@foreach($usersDeleted as $userDeleted)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $userDeleted->id }}</td>
                                        <td>
                                            --}}{{--@if($userDeleted->upload)
                                                <img class="table-img" src="{{ asset('/image/fit/100/100/' . $userDeleted->upload->path . '.' . $userDeleted->upload->ext) }}" alt="{{ $userDeleted->name }}">
                                            @else
                                                <img class="table-img" src="{{ asset('/image/fit/100/100/default.jpg') }}" alt="{{ $userDeleted->name }}">
                                            @endif--}}{{--
                                        </td>
                                        <td>{{ $userDeleted->name }}</td>
                                        <td>{{ $userDeleted->email }}</td>
                                        <td>{{ $userDeleted->role->name }}</td>
                                        <td>{{ $userDeleted->created_at }}</td>
                                        <td>{{ $userDeleted->updated_at }}</td>
                                        <td class="control">
--}}{{--                                            <a href="{{ route('api.users.restore', ['id' => $userDeleted->id]) }}" class="btn" title="Восстановить">
                                                <i class="fa fa-history"></i>
                                            </a>
                                            <a href="{{ route('api.users.delete', ['id' => $userDeleted->id]) }}" class="btn forceDeleteUser" title="Удалить">
                                                <i class="fa fa-close"></i>
                                            </a>--}}{{--

                                            <a href="#" class="btn" title="Восстановить">
                                                <i class="fa fa-history"></i>
                                            </a>
                                            <a href="#" class="btn forceDeleteUser" title="Удалить">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach--}}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Аватар</th>
                                    <th rowspan="1" colspan="1">Логин пользователя</th>
                                    <th rowspan="1" colspan="1">Email пользователя</th>
                                    <th rowspan="1" colspan="1">Роль пользователя</th>
                                    <th rowspan="1" colspan="1">Дата создания</th>
                                    <th rowspan="1" colspan="1">Дата изменения</th>
                                    <th rowspan="1" colspan="1">Управление</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset ("/js/admin/theoreo.admin.users.js") }}" type="text/javascript"></script>
@endpush