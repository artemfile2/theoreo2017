@section ('page')
    <div class="actions-list">
        @if(!$actions || count($actions) == 0)
            @if(!isset($query))
                <h3>В данной категории пока нет акций</h3>
            @endif
        @else
            @foreach ($actions as $action)
                <article role="article" class="content-block-item clearfix">
                    <div class="sidebar">
                        <a href="{{$action->link}}" title="{{$action->title}}">
                            <div class="content-block-img">
                                <a href="{{ route('showAction', ['id' => $action->id]) }}">
                                    @if($action->upload)
                                        <img src="{{ asset('/image/fit/400/300/' . $action->upload->path . '.' . $action->upload->ext) }}" alt="{{$action->title}}" class="img-responsive">
                                    @else
                                        <img src="{{ asset('/image/fit/400/300/default.jpg') }}" alt="{{$action->title}}" class="img-responsive">
                                    @endif
                                </a>
                            </div>
                        </a>
                        <p class="content-block-context"><a href="{{ route('client.filterByBrand', ['id' => $action->brand_id]) }}">{{$action->brand->name}}</a></p>
                    </div>
                    <div class="content-box">
                        <div class="content-box-info">
                        <a role="link" href="{{$action->link}}" class="content-block-heading">
                            <a href="{{ route('showAction', ['id' => $action->id]) }}"><h2>{{$action->title}}</h2></a>
                        </a>
                        <p class="content-block-introtext">
                            {!!($action->description)!!}
                        </p>
                        <p class="content-block-date">
                            Срок проведения:
                            @if ($action->active_from && $action->active_to)
                                {{$action->active_from}} - {{$action->active_to}}
                            @else
                                 уточняйте у организатора
                            @endif
                        </p>
                        </div>
                        <div class="content-box-footer">
                            <!-- Заглушка до реализации функционала соцсетей -->
                            <div class="content-block-footer clearfix">
                                <div class="social clearfix">
                                    @include('client.parts.page-blocks.social')
                                </div>
                            </div>
                            <!-- Заглушка до реализации функционала соцсетей -->
                            <!-- Теги -->
                            @if(count($action->tag))
                                <div class="content-block-tags clearfix">
                                    <span class="footer_category pull-left tags">&nbsp;</span>
                                    <ul class="content-block-list list-unstyled list-inline clearfix">
                                        @foreach ($action->tag as $tag)
                                            <li class="content-block-item-li">
                                                <a href="{{route('client.filterByTag')}}?tag={{ $tag->name }}" class="btn btn-default content-block-btn">{{$tag->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                        <!-- Теги -->
                        </div>
                    </div>
                </article>
                @if ($loop->iteration % 3 == 0)
                    <div class="clearfix line3columns"></div>
                @endif
            @endforeach
        @endif
    </div>
@endsection