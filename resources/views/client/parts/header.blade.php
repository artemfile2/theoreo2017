<header class="header">
    <div class="wrapper">
        <div class="row">
            <!-- LOGO -->
            <div class="logo-box">
                <div class="logo">
                    <a role="link" href="/" class="logo__link">
                        <img src="{{ asset('img/logo.png') }}" alt="Theoreo" title="Theoreo - перейти на главную" class="logo_img logo-big">
                        <img src="{{ asset('img/logo-small.png') }}" alt="Theoreo" title="Theoreo - перейти на главную" class="logo_img logo-small">
                    </a>
                </div>
            </div>
            <!-- Город full -->
            <div class="city-box">
                <div class="choice-city-link">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <span class="choice-city-item">Москва</span>
                    <span class="phone-number">8 800 333-33-33</span>
                </div>
                <div class="choice-city hidden">
                    <ul class="choice-city_list">
                        <li class="city-list-item"><a href="" class="city-list-link">Москва</a></li>
                        <li class="city-list-item"><a href="" class="city-list-link">Санкт_Петербург</a></li>
                        <li class="city-list-item"><a href="" class="city-list-link">Саратов</a></li>
                    </ul>
                </div>
            </div>

            <!-- Category hidden -->
            <div class="category-hidden-box">
                <div class="hidden">
                    <i class="fa fa-th show_all_categories_mini" aria-hidden="true"></i>
                    <div class="menu-category">
                        <a role="link" href="/" class="btn menu-category-link" data-box-show="category">
                            Все категории <i class="fa fa-chevron-down category-down-ico" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Фильтры full -->
            <div class="filters-show-box">
                <div class="show-filter">
                    <div class="show-filter-link">
                        <i class="fa fa-filter" aria-hidden="true"></i>
                        <span class="show-filter-item">Показать фильтры</span>
                    </div>
                </div>
            </div>

            <!-- Поиск -->
            <div id="search-form" class="search-form-big">
                <form action="{{ route('client.actionSearch') }}" method="POST" class="search-form" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" name="query" value="" class="form-control search-form-input" placeholder="Например: ">
                        <span class="input-group-btn">
							<button role="button" class="btn search-form-submit" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>

        <!-- Red row -->
        <div class="container-red-category wr-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="box-list">
                        <!-- Categories -->
                        <i class="fa fa-th show_all_categories" aria-hidden="true"></i>
                        <div class="category-box">
                            <i class="fa fa-chevron-left scroll_left" aria-hidden="true"></i>
                            <nav class="menu top-cat-menu" role="navigation">

                                <ul class="list-inline top-cat-menu-ul list-unstyled">
                                    @if(isset($categories))
                                        @foreach($categories as $category)
                                            <li class="menu-item">
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
        <!-- /End Red row -->
    </div>
</header>