<div class="sidebar">
    @if($action->brand->upload)
        <img src="{{ asset('/image/widen/600/' . $action->brand->upload->path . '.' . $action->brand->upload->ext) }}" alt="{{ $action->brand->name }}" class="content-block-img img-responsive">
    @else
        <img src="{{ asset('/image/widen/600/default.jpg') }}" alt="{{ $action->brand->name }}" class="content-block-img img-responsive">
    @endif
    <p class="content-block-context"><a href="">{{ $action->brand->name }}</a></p>

    <div class="row brand-address">

        <div class="brand-address-box">
            <h4 class="more-info-name">
                <i class="fa fa-phone brand-phone-ico"></i>
                Телефоны:
            </h4>
            <ul class="more-info-list">
                <li class="more-info-item">
                    <a class="more-info-link brand-phone">{{ $action->brand->phones  }}</a>
                </li>
            </ul>
        </div>


        <div class="col-xs-24">
            <h4 class="more-info-name">
                <i class="fa fa-globe"></i>
                Адрес сайта:
            </h4>
            <ul class="more-info-list">
                <li class="more-info-item">
                    <a href="" target="_blank" rel="nofollow" class="more-info-link brand-site" >{{ $action->brand->site  }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>