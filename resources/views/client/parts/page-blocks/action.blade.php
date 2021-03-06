<div class="content-block-heading">
    <h1>{{ $action->title }}</h1>
    <span>Количество просмотров: {{ $action->rating }}</span>
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
        {{$action->active_from}} - {{$action->active_to}}
    @else
         уточняйте у организатора
    @endif     
</p>

<!-- Теги -->
@if(count($action->tag))
    <ul class="content-block-list list-unstyled list-inline">
    @foreach ($action->tag as $tag)
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
               Адреса проведения акции
                @if($action->addresses)
                    <span class="more-info-heading-num">({{ count_addresses($action->addresses) }})</span>
                    </h3>
                    <p>{!! format_string($action->addresses) !!}</p>
                @else
                    <span class="more-info-heading-num">({{ count_addresses($action->brand->addresses) }})</span>
                    </h3>
                    <p>{!! format_string($action->brand->addresses) !!}</p>
                @endif
            <div class="more-info-address">
                <div class="row">
                    <div class="map-box">
                        <h4 class="more-info__name">
                            @include('client.parts.page-blocks.map', ['addresses' => string_split($action->addresses)])
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
