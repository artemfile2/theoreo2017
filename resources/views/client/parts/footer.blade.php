<div class="footer">
    <div class="container">
        <div class="address-box">
           <div class="right-cell-box">
                <ul class="list-block list-unstyled address-box-ul">
                    <li class="menu_footer_item a_home">
                        <a href="{{ route('client.index') }}">http://theoreo.ru</a>
                    </li>
                    <li class="menu_footer_item a_mail">
                        <a href="mailto:mail@theoreo.ru">mail@theoreo.ru</a>
                    </li>
                    <li class="phone">
                        8 800 333-33-33
                    </li>
                    <li class="address">
                        г. Москва ул Некая, д 1
                    </li>
                </ul>
            </div>
        </div>
        <div class="menu-box">
            <div class="center-cell-box">
                <nav class="footer-menu" role="navigation">
                    <ul class="list-block list-unstyled menu__list">
                        <li class="menu_footer_item a_home">
                            <a href="{{ route('client.index') }}">На главную</a>
                        </li>
                        <li class="menu_footer_item a_archive">
                            <a href="{{ route('client.showArchives') }}">Архив акций</a>
                        </li>
                        @if(Auth::check())
                            <li class="menu_footer_item a_logout">
                                <a href="#">Выйти</a>
                            </li>
                        @else
                            <li class="menu_footer_item a_register">
                                <a href="#">Регистрация</a>
                            </li>
                            <li class="menu_footer_item a_login">
                                <a href="#">Авторизация</a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
        <div class="tag-box">
            <span class="footer_tag tags">
							Тэги:
						</span>
            <div class="footer-tag-box">
                <nav class="menu-footer" role="navigation">
                    <ul class="list-inline list-unstyled menu_footer_list">
                        @if(isset($tags))
                            @foreach($tags as $tag)
                                <li class="menu-item">
                                    <a href="{{ route('client.filterByTag') }}?tag={{ $tag->name }}"> {{ $tag->name }}</a>
                                    @if(!$loop->last)
                                        ,
                                    @endif
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</div>
<div class="footer footer-copy">
    <span class="footer_copy">© Theoreo 2017</span>
</div>

