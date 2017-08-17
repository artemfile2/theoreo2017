@extends('admin.main')

@section('content')
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Новые</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Просмотренные</a></li>
        </ul>
        <div class="tab-content">
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
                                        Статус
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vktemps as $vktemp)
                                <tr role="row" class="odd">
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
                                            <input type="checkbox" value="{{ $vktemp->status }}" name="check_status">
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
                                    <th rowspan="1" colspan="1">Статус</th>
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
                                        Статус
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
                                                <input type="checkbox" value="{{ $vktemp->status }}" name="check_status">
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
                                    <th rowspan="1" colspan="1">Статус</th>
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

@push('styles')
    <link href="{{ asset("/css/admin/datepicker3.css")}}" rel="stylesheet" type="text/css" />
@endpush

@push('script')
    <script src="{{ asset ("/js/admin/theoreo.admin.actions.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/js/admin/datepicker/bootstrap-datepicker.js") }}"></script>
    <script src="{{ asset ("/js/admin/datepicker/locales/bootstrap-datepicker.ru.js") }}" charset="UTF-8"></script>
@endpush