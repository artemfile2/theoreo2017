@extends('admin.main')

@section('content')

    <div class="box">
        <div class="box-body">
            <div class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="logs" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="logs_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="logs" rowspan="1" colspan="1" style="width: 50px;" aria-sort="ascending" aria-label="">
                                    ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="logs" rowspan="1" colspan="1" style="width: 200px;" aria-label="">
                                    Дата парсинга
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="logs" rowspan="1" colspan="1" style="width: 550px;" aria-label="">
                                    Получено с VK
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="logs" rowspan="1" colspan="1" style="width: 200px;" aria-label="">
                                    Добавлено в парсер
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr role="row" class="odd">
                                <td class="sorting_1">123</td>
                                <td>06.08.2017 01:00:07</td>
                                <td>
                                    <a href="">Какая-нибудь группа в VK</a>
                                </td>
                                <td>06.08.2017 01:00:07</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">ID</th>
                                <th rowspan="1" colspan="1">Дата парсинга</th>
                                <th rowspan="1" colspan="1">Получено с VK</th>
                                <th rowspan="1" colspan="1">Добавлено в парсер</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
<script>
    $(function () {
        $("#logs").DataTable();
    });
</script>
@endpush