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
                            Имя
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 23%" aria-label="">
                            Фамилия
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" style="width: 23%" aria-label="">
                            Логин
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
                    @foreach($users as $user)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $user->id }}</td>
                            <td>
                                @if($user->upload_id)
                                    <img class="table-img" src="{{ asset('/image/fit/100/100/' . $user->upload->path . '.' . $user->upload->ext) }}"  alt="{{ $user->name }}">
                                @else
                                    <img class="table-img" src="{{ asset('/image/fit/100/100/default.jpg') }}" alt="{{ $user->name }}">
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->login }}</td>
                            <td>{{ $user->role->name}}</td>
                            <td>
                                @if($user->created_at)
                                    {{ getRusDate(date($user->created_at)) }}
                                @endif
                            </td>
                            <td>
                                @if($user->updated_at)
                                    {{ getRusDate(date($user->updated_at)) }}
                                @endif
                            </td>
                            <td class="control">
                                <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}" class="btn" title="Редактировать">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.user.trash', ['id' => $user->id]) }}" class="btn deleteUser" title="Переместить в корзину">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">ID</th>
                        <th rowspan="1" colspan="1">Аватар</th>
                        <th rowspan="1" colspan="1">Имя</th>
                        <th rowspan="1" colspan="1">Фамилия</th>
                        <th rowspan="1" colspan="1">Логин</th>
                        <th rowspan="1" colspan="1">Роль</th>
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