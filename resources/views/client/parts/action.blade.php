<div class="content-block__heading">
    <h1>{{ $action->title }}</h1>
    @if($action->upload)
        <img src="{{ asset('/image/widen/600/' . $action->upload->path . '.' . $action->upload->ext) }}" alt="{{ $action->title }}" class="content-block__img img-responsive">
    @else
        <img src="{{ asset('/image/widen/600/default.jpg') }}" alt="{{ $action->title }}" class="content-block__img img-responsive">
    @endif
</div>
<p class="content-block__introtext">
    {!! $action->description  !!}
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
    <ul class="content-block__list list-unstyled list-inline">
    @foreach ($action->tags as $tag)
        <li class="content-block__item">
            <a href="{{route('client.filterByTag', ['tag' => $tag->id])}}" class="btn btn-default content-block__btn">{{$tag->name}}</a>
        </li>
    @endforeach
    </ul>
@endif
<!-- Теги -->

<div class="content-block__footer content-block__footer--offer clearfix">
    <div class="pull-left social">
        @include('client.parts.social')
    </div>
</div>
<section class="more-info">
    <div class="row">
        <div class="col-xs-24">
            <h3 class="more-info__heading">
                Адреса проведения акции <span class="more-info__heading--num">(2)</span>
            </h3>
            <div class="more-info__address more-info__address--height js-store-list">
                <div class="row">
                    <div class="col-xs-24 col-sm-12">
                        <h4 class="more-info__name">
                            <i class="ico ico-point-active more-info__ico--point"></i>
                            {{ $action->addresses }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
