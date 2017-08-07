<footer class="footer">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row footer-table">
               <div class="col-xs-24 col-sm-6 footer-address">
                   <div class="address-box col-md-24">
                        <ul class="list-block list-unstyled">
                            <li>
                                <a href="{{ route('client.index') }}">http://theoreo.ru</a>
                            </li>
                            <li>
                                <a href="mailto:mail@theoreo.ru">mail@theoreo.ru</a>
                            </li>
                            <li>
                                8 800 333-33-33
                            </li>
                            <li>
                                г. Москва ул Некая, д 1
                            </li>

                        </ul>
                    </div>
               </div>
               <div class="col-xs-24 col-sm-6 footer-menu">
                    <div class="menu-box col-md-24">
                        <nav class="footer-menu" role="navigation">
                            <ul class="list-block list-unstyled menu__list">
                                <li class="menu__item">
                                    <a href="{{ route('client.index') }}">На главную</a>
                                </li>
                                <li class="menu__item">
                                    <a href="{{ route('client.showArchives') }}">Архив акций</a>
                                </li>
                                <li class="menu__item">
                                    <form action="" class="search-form" role="search">
                                        <div class="input-group">
                                            <input type="text" name="query" value="" class="search-form__input_mini form-control" placeholder="Искать">							  </span>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xs-24 col-sm-10">
						<span class="footer__category">
							Категории:
						</span>
                    <div class="category-box col-md-24">
                        <nav class="menu" role="navigation">
                            <ul class="list-inline list-unstyled menu__list">
                                @if(isset($categories))
                                    @foreach($categories as $category)
                                        <li class="menu__item">
                                            <input id="cat{{$category->id}}" class="menu__input category-checkbox"
                                                   type="checkbox">
                                            <label for="cat{{$category->id}}">
                                                <a href="{{ route('showCategory', ['id' => $category->id]) }}" style="color: white"> {{ $category->name }}</a>
                                            </label>
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