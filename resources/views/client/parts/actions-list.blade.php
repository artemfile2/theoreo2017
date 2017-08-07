@section ('page')
    <div class="actions-list">
        @if(!$actions || count($actions) == 0)
            <h4>В данной категории пока нет акций</h4>
        @else
            <?php $i = 0; ?>
            @foreach ($actions as $action)
                <?php $i++; ?>

                <article role="article" class="content-block clearfix">
                    <div class="sidebar col-xs-24 col-sm-8 col-lg-12">
                        <a href="{{$action->link}}" title="{{$action->title}}">
                            <div class="content-block__img">
                                @if($action->upload)
                                    <a href="{{ route('actionShow', ['id' => $action->id]) }}"><img src="{{ asset('/image/widen/600/' . $action->upload->path . '.' . $action->upload->ext) }}" alt="{{$action->title}}" class="img-responsive"></a>
                                @else
                                    <a href="{{ route('actionShow', ['id' => $action->id]) }}"><img src="{{ asset('/image/widen/600/default.jpg') }}" alt="{{$action->title}}" class="img-responsive"></a>
                                @endif
                            </div>
                        </a>
                        <p class="content-block__context"><a href="{{ route('site.brand.sortByBrand', ['brand_id' => $action->brand_id]) }}">{{$action->brand->name}}</a></p>
                    </div>
                    <div class="col-xs-24 col-sm-16 col-lg-12">
                        <a role="link" href="{{$action->link}}" class="content-block__heading">
                            <a href="{{ route('actionShow', ['id' => $action->id]) }}"><h2>{{$action->title}}</h2></a>
                        </a>
                        <p class="content-block__introtext">
                            {!!($action->description)!!}
                        </p>
                        <p class="content-block__date">
                            Срок проведения:
                            @if ($action->active_from && $action->active_to)
                                {{formatActionDate($action->active_from)}} - {{formatActionDate($action->active_to)}}
                            @else
                                 уточняйте у организатора
                            @endif
                        </p>

                        <!-- Теги -->
                        @if(count($action->tags))
                            <ul class="content-block__list list-unstyled list-inline hidden-xs">
                            @foreach ($action->tags as $tag)
                                <li class="content-block__item">
                                    <a href="{{route('client.filterByTag', ['tag' => $tag->id])}}" class="btn btn-default content-block__btn">{{$tag->name}}</a>
                                </li>
                            @endforeach
                            </ul>
                        @endif
                        <!-- Теги -->

                        <!-- Заглушка до реализации функционала соцсетей -->
                        <div class="content-block__footer clearfix">
                            <div class="pull-left social">
                                @include('client.parts.social')
                            </div>
                        </div>
                        <!-- Заглушка до реализации функционала соцсетей -->
                    </div>
                </article>
                @if ($i % 2 == 0)
                    <div class="clearfix line2columns"></div>
                @endif
            @endforeach
        @endif
    </div>
@endsection