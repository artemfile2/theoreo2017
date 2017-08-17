@extends('admin.main')

@section('content')
    <a href="{{ route('admin.brands.create') }}" type="button" class="btn btn-success margin-bottom"><i class="fa fa-plus"></i> Добавить бренд</a>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Активные</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Удаленные</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="brands" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="brands_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="brands" rowspan="1" colspan="1" style="width: 1%" aria-sort="ascending" aria-label="">
                                            ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="brands" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                            Лого
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="brands" rowspan="1" colspan="1" style="width: 36%" aria-label="">
                                            Имя бренда
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="brands" rowspan="1" colspan="1" style="width: 16%" aria-label="">
                                            Телефон
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="brands" rowspan="1" colspan="1" style="width: 16%" aria-label="">
                                            Сайт
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="brands" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                            Дата создания
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="brands" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                            Дата изменения
                                        </th>
                                        <th style="width: 1%">
                                            Управление
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $brand->id }}</td>
                                        <td>
                                            @if($brand->upload)
                                                <img class="table-img" src="{{ asset('/image/widen/200/' . $brand->upload->path . '.' . $brand->upload->ext) }}" alt="">
                                            @else
                                                <img class="table-img" src="{{ asset('/image/widen/200/default.jpg') }}"  alt="">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.brands.edit', ['id' => $brand->id]) }}">{{ $brand->name }}</a>
                                        </td>
                                        <td>{{ $brand->phones }}</td>
                                        <td>{{ $brand->site_link }}</td>
                                        <td>
                                            @if($brand->created_at)
                                                {{ getRusDate(date($brand->created_at)) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($brand->updated_at)
                                                {{ getRusDate(date($brand->updated_at)) }}
                                            @endif
                                        </td>
                                        <td class="control">
                                            <a href="{{ route('admin.brands.edit', ['id' => $brand->id]) }}" class="btn" title="Редактировать">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.brands.trash', ['id' => $brand->id]) }}" class="btn deleteBrand" title="Переместить в корзину">
                                                <i class="fa fa-trash"></i>
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
                                                <img class="table-img" src="{{ asset('/image/widen/200/' . $brandDeleted->upload->path . '.' . $brandDeleted->upload->ext) }}" alt="">
                                            @else
                                                <img class="table-img" src="{{ asset('/image/widen/200/default.jpg') }}"  alt="">
                                            @endif
                                        </td>
                                        <td>{{ $brandDeleted->name }}</td>
                                        <td>{{ $brandDeleted->phones }}</td>
                                        <td>{{ $brandDeleted->site_link }}</td>
                                        <td>
                                            @if($brandDeleted->created_at)
                                                {{ getRusDate(date($brandDeleted->created_at)) }}</td>
                                            @endif
                                        <td>
                                            @if($brandDeleted->updated_at)
                                                {{ getRusDate(date($brandDeleted->updated_at)) }}</td>
                                            @endif
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
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset ("/js/admin/theoreo.admin.brands.js") }}" type="text/javascript"></script>
@endpush