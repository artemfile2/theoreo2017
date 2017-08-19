<div class="tab-pane" id="tab_2">
    <div class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-12">
                <table id="brandsDeleted" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="brandsDeleted_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="brandsDeleted" rowspan="1" colspan="1" style="width: 1%" aria-sort="ascending" aria-label="">
                            ID
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="brandsDeleted" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                            Лого
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="brandsDeleted" rowspan="1" colspan="1" style="width: 36%" aria-label="">
                            Имя бренда
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="brandsDeleted" rowspan="1" colspan="1" style="width: 16%" aria-label="">
                            Телефон
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="brandsDeleted" rowspan="1" colspan="1" style="width: 16%" aria-label="">
                            Сайт
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="brandsDeleted" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                            Дата создания
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="brandsDeleted" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                            Дата изменения
                        </th>
                        <th style="width: 1%">
                            Управление
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brandsDeleted as $brandDeleted)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{ $brandDeleted->id }}</td>
                            <td>
                                @if($brandDeleted->upload)
                                    <img class="table-img" src="{{ asset('/image/widen/100/' . $brandDeleted->upload->path . '.' . $brandDeleted->upload->ext) }}" alt="">
                                @else
                                    <img class="table-img" src="{{ asset('/image/widen/100/default.jpg') }}"  alt="">
                                @endif
                            </td>
                            <td>{{ $brandDeleted->name }}</td>
                            <td>{{ $brandDeleted->phones }}</td>
                            <td>{{ $brandDeleted->site_link }}</td>
                            <td>{{ getRusDate(date($brandDeleted->created_at)) }}</td>
                            <td>{{ getRusDate(date($brandDeleted->updated_at)) }}</td>
                            <td class="control">
                                <a href="{{ route('admin.brands.restore', ['id' => $brandDeleted->id]) }}" class="btn" title="Восстановить">
                                    <i class="fa fa-history"></i>
                                </a>
                                <a href="{{ route('admin.brands.delete', ['id' => $brandDeleted->id]) }}" class="btn forceDeleteBrand" title="Удалить">
                                    <i class="fa fa-close"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">ID</th>
                        <th rowspan="1" colspan="1">Лого</th>
                        <th rowspan="1" colspan="1">Имя бренда</th>
                        <th rowspan="1" colspan="1">Телефон</th>
                        <th rowspan="1" colspan="1">Сайт</th>
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