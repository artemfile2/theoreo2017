<div class="sidebar col-xs-24 col-sm-8">
    @if($action->brand->upload)
        <img src="{{ asset('/image/widen/600/' . $action->brand->upload->path . '.' . $action->brand->upload->ext) }}" alt="{{ $action->brand->name }}" class="content-block__img img-responsive">
    @else
        <img src="{{ asset('/image/widen/600/default.jpg') }}" alt="{{ $action->brand->name }}" class="content-block__img img-responsive">
    @endif
    <p class="content-block__context"><a href="">{{ $action->brand->name }}</a></p>

    <div class="row" style="margin-top: 20px;">

        <div class="col-xs-24">
            <h4 class="more-info__name">
                <i class="fa fa-phone"></i>
                Телефоны:
            </h4>
            <ul class="more-info__list">
                <li class="more-info__item">
                    <a class="more-info__link" style="border-bottom: none;">{{ $action->brand->phones  }}</a>
                </li>
            </ul>
        </div>


        <div class="col-xs-24">
            <h4 class="more-info__name">
                <i class="fa fa-internet-explorer"></i>
                Адрес сайта:
            </h4>
            <ul class="more-info__list">
                <li class="more-info__item">
                    <a href="" target="_blank" rel="nofollow" class="more-info__link" style="border-bottom: none; text-decoration: underline;">{{ $action->brand->site  }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>