<div class="tab-pane active" id="tab_1">
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
                            Текст
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="actions" rowspan="1" colspan="1" style="width: 5%" aria-label="">
                            Действие
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vktemps as $vktemp)
                        <tr role="row" class="odd del{{ $vktemp->id }}" id="ajax_{{ $vktemp->id }}">
                            <td class="sorting_1">
                                {{ $vktemp->id }}
                            </td>
                            <td>
                                @if($vktemp->photo_130)
                                    <img class="table-img" src="{{$vktemp->photo_130}}" alt="">
                                @elseif($vktemp->photo_75)
                                    <img class="table-img" src="{{$vktemp->photo_75}}" alt="">
                                @elseif($vktemp->photo_604)
                                    <img class="table-img" src="{{$vktemp->photo_604}}" alt="">
                                @endif
                            </td>
                            <td>
                                {{ $vktemp->content }}
                            </td>
                            <td>
                                <div class="form-group col-sm-6 col-lg-4">
                                    <button type="button" class="btn btn-success margin-bottom margin-r-5" name="download" value="{{ $vktemp->id }}"><i class="fa fa-download"></i> Добавить </button>
                                    <button type="button" class="btn btn-danger margin-bottom" name="delete" value="{{ $vktemp->id }}"><i class="fa fa-close"></i> Удалить </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">ID</th>
                        <th rowspan="1" colspan="1">Изображение</th>
                        <th rowspan="1" colspan="1">Текст</th>
                        <th rowspan="1" colspan="1">Действие</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>