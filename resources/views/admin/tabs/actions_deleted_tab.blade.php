@extends('admin.section.actions')
@section('tab')
<div class="tab-pane active">
    <div class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-12">
                <table id="actionsDeleted" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="actionsDeleted_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="actionsDeleted" rowspan="1" colspan="1" style="width: 1%" aria-sort="ascending" aria-label="">
                            ID
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="brands" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                            Изображение
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="actionsDeleted" rowspan="1" colspan="1" style="width: 40%" aria-label="">
                            Название акции
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="actionsDeleted" rowspan="1" colspan="1" style="width: 23%" aria-label="">
                            Имя бренда
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="actionsDeleted" rowspan="1" colspan="1" style="width: 5%" aria-label="">
                            Статус
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="actionsDeleted" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                            Дата создание
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="actionsDeleted" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                            Дата изменения
                        </th>
                        <th style="width: 1%">
                            Управление
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($actionsDeleted as $actionDeleted)
                        <tr role="row" class="odd">
                            <td class="sorting_1">
                                {{ $actionDeleted->id }}
                            </td>
                            <td>
                                @if($actionDeleted->upload)
                                    <img class="table-img" src="{{ asset('/image/widen/200/' . $actionDeleted->upload->path . '.' . $actionDeleted->upload->ext) }}" alt="">
                                @else
                                    <img class="table-img" src="{{ asset('/image/widen/200/default.jpg') }}"  alt="">
                                @endif
                            </td>
                            <td>
                                {{ $actionDeleted->title }}
                            </td>
                            <td>
                                {{ $actionDeleted->brand->name }}
                            </td>
                            <td>
                                {{ $actionDeleted->status->name }}
                            </td>
                            <td>
                                {{ $actionDeleted->created_at }}
                            </td>
                            <td>
                                {{ $actionDeleted->updated_at }}
                            </td>
                            <td class="control">
                                <a href="{{ route('admin.actions.restore', ['id' => $actionDeleted->id]) }}" class="btn restoreAction" title="Восстановить">
                                    <i class="fa fa-history"></i>
                                </a>
                                <a href="{{ route('admin.actions.delete', ['id' => $actionDeleted->id]) }}" class="btn forceDeleteAction" title="Удалить">
                                    <i class="fa fa-close"></i>
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