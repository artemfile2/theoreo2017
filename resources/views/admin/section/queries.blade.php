@extends('admin.main')

@section('content')

    <div class="margin-bottom">
        <a href=""><i class="fa fa-download"></i> CSV</a>
    </div>

    <div class="box">
        <div class="box-body">
            <div class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="queries" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="queries_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="queries" rowspan="1" colspan="1" style="width: 500px;" aria-sort="ascending" aria-label="">
                                    Запрос
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="queries" rowspan="1" colspan="1" style="width: 100px;" aria-label="">
                                    Количество запросов
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="queries" rowspan="1" colspan="1" style="width: 364px;" aria-label="">
                                    Последняя дата запроса
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="queries" rowspan="1" colspan="1" style="width: 291px;" aria-label="">
                                    Количество результатов по запросу
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($queries as $query)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $query->query_text }}</td>
                                    <td>{{ $query->query_cnt }}</td>
                                    <td>{{ $query->last_date }}</td>
                                    <td>{{ $query->results_cnt }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Запрос</th>
                                <th rowspan="1" colspan="1">Количество запросов</th>
                                <th rowspan="1" colspan="1">Последняя дата запроса</th>
                                <th rowspan="1" colspan="1">Количество результатов по запросу</th>
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
        $("#queries").DataTable();
    });
</script>
@endpush