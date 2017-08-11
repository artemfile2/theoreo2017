<div class="content-block-heading">
    <h1>{{ $action->title }}</h1>
    @if($action->upload)
        <img src="{{ asset('/image/widen/600/' . $action->upload->path . '.' . $action->upload->ext) }}" alt="{{ $action->title }}" class="content-block-img img-responsive">
    @else
        <img src="{{ asset('/image/widen/600/default.jpg') }}" alt="{{ $action->title }}" class="content-block-img img-responsive">
    @endif
</div>
<p class="content-block-introtext">
    {!! $action->description  !!}
</p>
<p class="content-block-date">
    Срок проведения:
    @if ($action->active_from && $action->active_to)
        {{getRusDate($action->active_from)}} - {{getRusDate($action->active_to)}}
    @else
         уточняйте у организатора
    @endif     
</p>

<!-- Теги -->
@if(count($action->tags))
    <ul class="content-block-list list-unstyled list-inline">
    @foreach ($action->tags as $tag)
        <li class="content-block-item">
            <a href="{{route('client.filterByTag', ['tag' => $tag->id])}}" class="btn btn-default content-block-btn">{{$tag->name}}</a>
        </li>
    @endforeach
    </ul>
@endif
<!-- Теги -->

<div class="content-block-footer content-block-footer-offer clearfix">
    <div class="pull-left social">
        @include('client.parts.page-blocks.social')
    </div>
</div>
<section class="more-info">
    <div class="row">
        <div class="map-row-box">
            <h3 class="more-info-heading">
                Адреса проведения акции <span class="more-info-heading-num">({{ (count(explode('\n', $action->addresses))) or 1 }})</span>
            </h3>
            <div class="more-info-address">
                <div class="row">
                    <div class="map-box">
                        <h4 class="more-info__name">
                            <i class="fa fa-map-marker more-info-ico-point" aria-hidden="true"></i>
                            @include('client.parts.page-blocks.map', ['addresses' => $action->addresses])
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
