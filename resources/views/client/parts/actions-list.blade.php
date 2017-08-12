@section ('page')
    <div class="actions-list">
        @if(!$actions || count($actions) == 0)
            @if(!isset($query))
                <h3>В данной категории пока нет акций</h3>
            @endif
        @else
            <?php $i = 0; ?>
            @foreach ($actions as $action)
                <?php $i++; ?>

                <article role="article" class="content-block clearfix">
                    <div class="sidebar">
                        <a href="{{$action->link}}" title="{{$action->title}}">
                            <div class="content-block-img">
                                <a href="{{ route('showAction', ['id' => $action->id]) }}">
                                    @if($action->upload)
                                        <img src="{{ asset('/image/widen/600/' . $action->upload->path . '.' . $action->upload->ext) }}" alt="{{$action->title}}" class="img-responsive">
                                    @else
                                        <img src="{{ asset('/image/widen/600/default.jpg') }}" alt="{{$action->title}}" class="img-responsive">
                                    @endif
                                </a>
                            </div>
                        </a>
                        <p class="content-block-context"><a href="{{ route('client.filterByBrand', ['id' => $action->brand_id]) }}">{{$action->brand->name}}</a></p>
                    </div>
                    <div class="content-box">
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

                        <!-- Теги -->
                        @if(count($action->tags))
                            <span class="footer_category tags">&nbsp;</span>
                            <ul class="content-block-list list-unstyled list-inline">
                            @foreach ($action->tags as $tag)
                                <li class="content-block-item">
                                    <a href="{{route('client.filterByTag')}}?tag={{ $tag->name }}" class="btn btn-default content-block-btn">{{$tag->name}}</a>
                                </li>
                            @endforeach
                            </ul>
                        @endif
                        <!-- Теги -->

                        <!-- Заглушка до реализации функционала соцсетей -->
                        <div class="content-block-footer clearfix">
                            <div class="pull-left social">
                                @include('client.parts.page-blocks.social')
                            </div>
                        </div>
                        <!-- Заглушка до реализации функционала соцсетей -->
                    </div>
                </article>
                @if ($i % 3 == 0)
                    <div class="clearfix line3columns"></div>
                @endif
            @endforeach
        @endif
    </div>
@endsection