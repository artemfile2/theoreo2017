@extends('admin.section.actions')
@section('tab')
<div class="tab-pane active">
    <div class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-12">
                <table id="actions" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="actions_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="actions" rowspan="1" colspan="1" style="width: 1%" aria-sort="ascending" aria-label="">
                            ID
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="brands" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                            Изображение
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="actions" rowspan="1" colspan="1" style="width: 40%" aria-label="">
                            Название акции
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="actions" rowspan="1" colspan="1" style="width: 23%" aria-label="">
                            Имя бренда
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="actions" rowspan="1" colspan="1" style="width: 5%" aria-label="">
                            Статус
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="actions" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                            Дата создания
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="actions" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                            Дата изменения
                        </th>
                        <th style="width: 1%">
                            Управление
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($actions as $action)
                        <tr role="row" class="odd">
                            <td class="sorting_1">
                                {{ $action->id }}
                            </td>
                            <td>
                                @if($action->upload)
                                    <img class="table-img" src="{{ asset('/image/widen/200/' . $action->upload->path . '.' . $action->upload->ext) }}" alt="">
                                @else
                                    <img class="table-img" src="{{ asset('/image/widen/200/default.jpg') }}"  alt="">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.actions.edit', ['id' => $action->id]) }}">
                                    {{ $action->title }}
                                </a>
                            </td>
                            <td>
                                {{ $action->brand->name }}
                            </td>
                            <td>
                                {{ $action->status->name }}
                            </td>
                            <td>
                                @if($action->created_at)
                                    {{ getRusDate(date($action->created_at)) }}
                                @endif
                            </td>
                            <td>
                                @if($action->updated_at)
                                    {{ getRusDate(date($action->updated_at)) }}
                                @endif
                            </td>
                            <td class="control">
                                <a href="{{ route('admin.actions.edit', ['id' => $action->id]) }}" class="btn" title="Редактировать">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.actions.trash', ['id' => $action->id]) }}" class="btn trashAction" title="Переместить в корзину">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">ID</th>
                        <th rowspan="1" colspan="1">Изображение</th>
                        <th rowspan="1" colspan="1">Название акции</th>
                        <th rowspan="1" colspan="1">Имя бренда</th>
                        <th rowspan="1" colspan="1">Статус</th>
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
@endsection