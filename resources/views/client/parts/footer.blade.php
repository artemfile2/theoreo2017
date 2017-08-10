<footer class="footer">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row footer-table">
               <div class="col-xs-24 col-sm-5 footer-address">
                   <div class="address-box">
                        <ul class="list-block list-unstyled">
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
               <div class="col-xs-24 col-sm-4 footer-menu">
                    <div class="menu-box">
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
                <div class="col-xs-24 col-sm-18">
						<span class="footer__category tags">
							Тэги:
						</span>
                    <div class="footer-tag-box">
                        <nav class="menu-footer" role="navigation">
                            <ul class="list-inline list-unstyled menu_footer_list">
                                @if(isset($categories))
                                    @foreach($categories as $category)
                                        <li class="menu__item">
                                            <a href="{{ route('client.filterByTag', ['id' => $category->id]) }}"> {{ $category->name }}</a>
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
    </div>
</footer>
<footer class="footer footer-copy">
        <span class="footer__copy">© Theoreo 2017</span>
</footer>
<!-- Modal -->
<div class="modal fade bs-example-modal-sm" id="modal-city-list" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ваш город:</h4>
            </div>
            <div class="modal-body text-center">
                <div class="form-group">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-lg">Выбрать</button>
            </div>
        </div>
    </div>
</div>
<!-- / END Modal -->

<script>


</script>