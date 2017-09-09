@if(isset($sameActions) && count($sameActions))
    <section class="more-info">
        <h4 class="more-info-heading">
            <a href="{{--{{ route('client.showSameActions', ['action' => $action->id]) }}--}}">Похожие акции
            <span class="more-info-heading-num"></span></a>
        </h4>  
        <div class="carousel autoplay">
            @foreach ($sameActions as $action)
                <div class="item-block">
                    <a href="{{ route('showAction', ['id' => $action->id]) }}" title="{{$action->title}}">
                        @if($action->upload)
                            <img src="{{ asset('/image/widen/300/' . $action->upload->path . '.' . $action->upload->ext) }}" alt="{{$action->title}}" class="slider-images">
                        @else
                            <img src="{{ asset('/image/widen/300/default.jpg') }}" alt="{{$action->title}}" class="slider-images">
                        @endif
                    </a>
                    <a href="{{ route('showAction', ['id' => $action->id]) }}" title="{{$action->title}}" class="more-info-heading-like">
                        <span>{{$action->title}}</span>
                    </a>
                </div>
            @endforeach    
        </div>
    </section>
 @endif  