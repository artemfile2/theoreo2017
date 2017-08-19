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
                            Имя
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="usersDeleted" rowspan="1" colspan="1" style="width: 23%" aria-label="">
                            Логин/Email
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="usersDeleted" rowspan="1" colspan="1" style="width: 18%" aria-label="">
                            Роль
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
                    @foreach($usersDeleted as $userDeleted)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $userDeleted->id }}</td>
                            <td>
                                @if($userDeleted->upload)
                                    <img class="table-img" src="{{ asset('/image/fit/100/100/' . $userDeleted->upload->path . '.' . $userDeleted->upload->ext) }}" alt="{{ $userDeleted->name }}">
                                @else
                                    <img class="table-img" src="{{ asset('/image/fit/100/100/default.jpg') }}" alt="{{ $userDeleted->name }}">
                                @endif
                            </td>
                            <td>{{ $userDeleted->name }}</td>
                            <td>{{ $userDeleted->login }}</td>
                            <td>{{ $userDeleted->role->name }}</td>
                            <td>{{ getRusDate(date($userDeleted->created_at)) }}</td>
                            <td>{{ getRusDate(date($userDeleted->updated_at)) }}</td>
                            <td class="control">
                                <a href="{{ route('admin.user.restore', ['id' => $userDeleted->id]) }}" class="btn" title="Восстановить">
                                    <i class="fa fa-history"></i>
                                </a>
                                <a href="{{ route('admin.user.delete', ['id' => $userDeleted->id]) }}" class="btn forceDeleteUser" title="Удалить">
                                    <i class="fa fa-close"></i>
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