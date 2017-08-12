@extends('admin.main')

@section('content')
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Новые</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Опубликованные</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Удаленные</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="comments" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="comments_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="comments" rowspan="1" colspan="1" style="width: 1%" aria-sort="ascending" aria-label="">
                                            ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="comments" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                            Текст комментария
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="comments" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                            Акция
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="comments" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                            Автор комментария
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="comments" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                            Дата создания
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="comments" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                            Дата изменения
                                        </th>
                                        <th style="width: 5%">
                                            Управление
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                {{--@foreach($commentsDisapprove as $commentDisapprove)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $commentDisapprove->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.comments.edit', ['id' => $commentDisapprove->id]) }}">{{ $commentDisapprove->text }}</a>
                                        </td>
                                        <td><a href="{{ route('actionShow', ['id' => $commentDisapprove->action->id]) }}" target="_blank">{{ $commentDisapprove->action->title }}</a></td>
                                        <td>{{ $commentDisapprove->user->name }}</td>
                                        <td>{{ $commentDisapprove->created_at }}</td>
                                        <td>{{ $commentDisapprove->updated_at }}</td>
                                        <td class="control">
                                            <a href="{{ route('admin.comments.edit', ['id' => $commentDisapprove->id]) }}" class="btn" title="Редактировать">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('api.comments.approve', ['id' => $commentDisapprove->id]) }}" class="btn approveComment" title="Опубликовать">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <a href="{{ route('api.comments.trash', ['id' => $commentDisapprove->id]) }}" class="btn deleteComment" title="Переместить в корзину">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach--}}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    {{--<th rowspan="1" colspan="1">Лого</th>--}}
                                    <th rowspan="1" colspan="1">Текст комментария</th>
                                    <th rowspan="1" colspan="1">Акция</th>
                                    <th rowspan="1" colspan="1">Автор комментария</th>
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
                            <table id="comments" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="comments_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="comments" rowspan="1" colspan="1" style="width: 1%" aria-sort="ascending" aria-label="">
                                        ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="comments" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                        Текст комментария
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="comments" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                        Акция
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="comments" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                        Автор
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="comments" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                        Дата создания
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="comments" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                        Дата изменения
                                    </th>
                                    <th style="width: 5%">
                                        Управление
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@foreach($commentsApprove as $commentApprove)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $commentApprove->id }}</td>
                                        <td>
                                            <a href="{{ route('admin.comments.edit', ['id' => $commentApprove->id]) }}">{{ $commentApprove->text }}</a>
                                        </td>
                                        <td><a href="{{ route('actionShow', ['id' => $commentApprove->action->id]) }}" target="_blank">{{ $commentApprove->action->title }}</a></td>
                                        <td>{{ $commentApprove->user->name }}</td>
                                        <td>{{ $commentApprove->created_at }}</td>
                                        <td>{{ $commentApprove->updated_at }}</td>
                                        <td class="control">
                                            <a href="{{ route('admin.comments.edit', ['id' => $commentApprove->id]) }}" class="btn" title="Редактировать">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('api.comments.disapprove', ['id' => $commentApprove->id]) }}" class="btn disapproveComment" title="Отменить публикацию">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            <a href="{{ route('api.comments.trash', ['id' => $commentApprove->id]) }}" class="btn deleteComment" title="Переместить в корзину">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach--}}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    {{--<th rowspan="1" colspan="1">Лого</th>--}}
                                    <th rowspan="1" colspan="1">Текст комментария</th>
                                    <th rowspan="1" colspan="1">Акция</th>
                                    <th rowspan="1" colspan="1">Автор</th>
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
            <div class="tab-pane" id="tab_3">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="commentsDeleted" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="commentsDeleted_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="commentsDeleted" rowspan="1" colspan="1" style="width: 1%" aria-sort="ascending" aria-label="">
                                        ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="commentsDeleted" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                        Текст комментария
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="commentsDeleted" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                        Акция
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="commentsDeleted" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                        Автор комментария
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="commentsDeleted" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                        Дата создания
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="commentsDeleted" rowspan="1" colspan="1" style="width: 10%" aria-label="">
                                        Дата изменения
                                    </th>
                                    <th style="width: 1%">
                                        Управление
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@foreach($commentsDeleted as $commentDeleted)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $commentDeleted->id }}</td>
                                        <td>{{ $commentDeleted->text }}</td>
                                        <td><a href="{{ route('actionShow', ['id' => $commentDeleted->action->id]) }}" target="_blank">{{ $commentDeleted->action->title }}</a></td>
                                        <td>{{ $commentDeleted->user->name }}</td>
                                        <td>{{ $commentDeleted->created_at }}</td>
                                        <td>{{ $commentDeleted->updated_at }}</td>
                                        <td class="control">
                                            <a href="{{ route('api.comments.restore', ['id' => $commentDeleted->id]) }}" class="btn" title="Восстановить">
                                                <i class="fa fa-history"></i>
                                            </a>
                                            <a href="{{ route('api.comments.delete', ['id' => $commentDeleted->id]) }}" class="btn forceDeleteComment" title="Удалить">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach--}}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Текст комментария</th>
                                    <th rowspan="1" colspan="1">Акция</th>
                                    <th rowspan="1" colspan="1">Автор комментария</th>
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
    <script src="{{ asset ("/js/admin/theoreo.admin.comments.js") }}" type="text/javascript"></script>
@endpush