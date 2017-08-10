<header class="header anim js-header">
    <div class="wrapper wr-top">
        <div class="row-fluid">

            <!-- LOGO -->
            <div class="col-lg-5 col-md-4 col-sm-5 col-xs-10 js-search-hide">
                <div class="logo anim">
                    <a role="link" href="/" class="logo__link">
                        <img src="{{ asset('img/logo.png') }}" alt="Theoreo" title="Theoreo - перейти на главную" class="logo_img">
                    </a>
                </div>
            </div>
            <!-- / LOGO -->

            <!-- Город full -->
            <div class="col-md-offset-1 col-sm-4 col-lg-4 hidden-xs">
                <div class="choice-city anim">
                    <div class="choice-city__link"> <!--data-toggle="modal" data-target="#modal-city-list"-->
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span class="choice-city__item">Москва</span>
                        <span class="phone-number">8 800 333-33-33</span>
                    </div>
                </div>
                <ul class="choice-city__list hidden-xs hidden">
                    <li class="choice-city__list--item"><a href="" class="choice-city__list--link">Москва</a></li>
                    <li class="choice-city__list--item"><a href="" class="choice-city__list--link">Санкт_Петербург</a></li>
                    <li class="choice-city__list--item"><a href="" class="choice-city__list--link">Саратов</a></li>
                </ul>
            </div>
            <!-- / Город full -->
            <div class="col-lg-6 col-md-10 col-sm-10 hidden-xs pull-right search-form-big anim js-search-form">
                <form action="" class="search-form" role="search">
                    <div class="input-group">
                        <input type="text" name="query" value="" class="search-form__input form-control anim" placeholder="Например: ">
                        <span class="input-group-btn">
							    <button role="button" class="btn btn-link search-form__submit anim" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
							  </span>
                    </div>
                </form>
            </div>

            <!-- Фильтры full -->
            <div class="col-md-offset-1 col-sm-4 col-lg-4 hidden-xs col-filter">
                <div class="show-filter anim">
                    <div class="show-filter__link"> <!--data-toggle="modal" data-target="#modal-city-list"-->
                        <i class="fa fa-filter" aria-hidden="true"></i>
                        <span class="show-filter__item">Показать фильтры</span>
                    </div>
                </div>
            </div>
            <!-- / Фильтры full -->

            <div class="category-list col-xs-4 hidden-xs hidden-sm">
                <i class="fa fa-th show_all_categories_mini" aria-hidden="true"></i>
                <div class="menu-category">
                    <a role="link" href="/" class="btn menu-category__link js-box-show" data-box-show="category">
                        Все категории <span class="ico ico-arrow-down-light"></span>
                    </a>
                </div>
            </div>

            <div class="top-icon__list js-top-icon">
                <!-- Город icon -->
                <div class="top-icon__item hidden-sm hidden-xs hidden-md hidden-lg pull-right js-search-show">
                    <div class="choice-city js-box-show" data-box-show="city">
                        <a role="link" href="/" class="choice-city__link" title="">
                            <i class="choice-city__ico pull-left ico ico-point"></i>
                        </a>
                    </div>
                </div>
                <!-- / Город icon -->

                <!-- Список icon -->
                <div class="top-icon__item category-list-ico hidden-md hidden-lg anim js-search-hide">
                    <a role="link" href="" class="search-form__link js-box-show anim"  data-box-show="category">
                        <i class="ico ico-category-light"></i>
                    </a>
                </div>


                <!-- / Список icon -->

                <!-- Поиск icon -->
                <div class="top-icon__item pull-right hidden-sm hidden-md hidden-lg">
							<span class="search-form__link link-is-active js-search-show">
								<i class="ico ico-search-light"></i>
							</span>
                </div>
                <!-- / Поиск icon -->
            </div>

            <div class="top-icon__close js-box-hide">
						<span class="search-form__link link-is-active">
							<i class="ico ico-close-light"></i>
						</span>
            </div>

        </div>
    </div>


    <div class="wrapper">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="box-list">
                    <i class="fa fa-th show_all_categories" aria-hidden="true"></i>
                    <div class="category-box col-md-24 anim js-box-list" data-box-list="category">
                        <i class="fa fa-chevron-left scroll_left" aria-hidden="true"></i>
                        <nav class="menu top-cat-menu anim" role="navigation">

                            <ul class="list-inline top-cat-menu-ul list-unstyled menu__list">
                               @if(isset($categories))
                                    @foreach($categories as $category)
                                        <li class="menu__item">
                                                <a href="{{ route('showCategory', ['id' => $category->id]) }}"> {{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </nav>
                        <i class="fa fa-chevron-right scroll_right" aria-hidden="true"></i>
                    </div>
                </div>


            </div>
        </div>
    </div>
</header>