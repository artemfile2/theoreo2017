<div class="tab-pane" id="tab_2">
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
                            Текст
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="actionsDeleted" rowspan="1" colspan="1" style="width: 5%" aria-label="">
                            Действие
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vktempsDeleted as $vktempDeleted)
                        <tr role="row" class="odd">
                            <td class="sorting_1">
                                {{ $vktempDeleted->id }}
                            </td>
                            <td>

                            </td>
                            <td>
                                {{ $vktempDeleted->content }}
                            </td>
                            <td>
                                <div class="form-group col-sm-6 col-lg-4">
                                    <input type="checkbox" value="{{ $vktempDeleted->status }}" name="check_status">
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