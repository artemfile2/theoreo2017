@if(count($sameActions))
    <section class="more-info">
        <h4 class="more-info__heading">
            <a href="{{ route('site.actions.same', ['id' => $action->id]) }}">Похожие акции 
            <span class="more-info__heading--num"></span></a>
        </h4>  
        <div class="owl-carousel carousel">
            @foreach ($sameActions as $action)
                <div class="owl-item-block">
                    <a href="{{ route('actionShow', ['id' => $action->id]) }}" title="{{$action->title}}">
                        @if($action->upload)
                            <img src="{{ asset('/image/widen/300/' . $action->upload->path . '.' . $action->upload->ext) }}" alt="{{$action->title}}" class="owl-images">
                        @else
                            <img src="{{ asset('/image/widen/300/default.jpg') }}" alt="{{$action->title}}" class="owl-images">
                        @endif
                    </a>
                    <a href="{{ route('actionShow', ['id' => $action->id]) }}" title="{{$action->title}}" class="more-info__heading--like">
                        <span>{{$action->title}}</span>
                    </a>
                </div>
            @endforeach    
        </div>
    </section>
 @endif  