@extends('admin.section.brands')
@section('tab')
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
                        <th class="sorting" tabindex="0" aria-controls="brands" rowspan="1" colspan="1" style="width: 34%" aria-label="">
                            Имя бренда
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="brands" rowspan="1" colspan="1" style="width: 12%" aria-label="">
                            Телефон
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="brands" rowspan="1" colspan="1" style="width: 12%" aria-label="">
                            Сайт
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="brands" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                            Дата создания
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="brands" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                            Дата изменения
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="brands" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                            Зарегистрировал
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
                                    <img class="table-img" src="{{ asset('/image/widen/100/' . $brand->upload->path . '.' . $brand->upload->ext) }}" alt="">
                                @else
                                    <img class="table-img" src="{{ asset('/image/widen/100/default.jpg') }}"  alt="">
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
                            <td>{{ $brand->user->name }}</td>
                            <td class="control">
                                <a href="{{ route('admin.brands.edit', ['id' => $brand->id]) }}" class="btn" title="Редактировать">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.brands.trash', ['id' => $brand->id]) }}" class="btn trashBrand" title="Переместить в корзину">
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
                        <th rowspan="1" colspan="1">Зарегистрировал</th>
                        <th rowspan="1" colspan="1">Управление</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection