<section class="more-info clearfix">
    <h4 class="more-info__heading">Комментарии <span class="more-info__heading--num">({{ count($comments) }})</span></h4>
    @foreach($comments as $comment)
        <div class="comment clearfix">
            <div class="comment__photo">
                {{-- !!! Нужно заменить на имя Авторизованного, когда будет реализована авторизация !!! --}}
                <img src="img/temp/temp_photo-1.jpg" alt="" class="comment__image">
            </div>
            <div class="comment__content">
                {{-- !!! Нужно заменить на имя Авторизованного, когда будет реализована авторизация !!! --}}
                <h5 class="comment__heading">{{ $comment->user->name }}</h5>
                <p class="comment__text">{{ $comment->text }}</p>
                <a href="" class="comment__call-back">Ответить</a>
            </div>
        </div>
        @break($loop->iteration == 3)
    @endforeach
    <div class="more-than-3">
        @foreach($comments as $comment)
            @if($loop->iteration > 3)
                <div class="comment clearfix">
                    <div class="comment__photo">
                        {{-- !!! Нужно заменить на имя Авторизованного, когда будет реализована авторизация !!! --}}
                        <img src="img/temp/temp_photo-1.jpg" alt="" class="comment__image">
                    </div>
                    <div class="comment__content">
                        {{-- !!! Нужно заменить на имя Авторизованного, когда будет реализована авторизация !!! --}}
                        <h5 class="comment__heading">{{ $comment->user->name }}</h5>
                        <p class="comment__text">{{ $comment->text }}</p>
                        <a href="" class="comment__call-back">Ответить</a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    @if(count($action->comments) > 3)
        <div class="row">
            <div class="col-xs-24 comments-opened">
                <div class="wrap-circle">
                    <i class="more-info__ico--arrow ico ico-arrow-down-grey"></i>
                </div>
                <span class="more-info__link--more">Показать все комментарии</span>
            </div>
        </div>
    @endif
        <form class="comment-add" id="comment-form">
            {{ csrf_field() }}
            <div class="zoom-anim-dialog mfp-hide" id="comment-message">
                <span class="comment__message-title">Спасибо!</span>
                <span>Ваш комментарий отправлен на модерацию.</span>
            </div>
            <div class="row">
                <div class="col-xs-24">
                    <p>
                        <textarea name="text" id="" class="form-control comment-add__textarea" placeholder="Комментировать.."></textarea>
                    </p>
                </div>
            </div>
            {{-- !!! Нужно заменить на id Авторизованного, когда будет реализована авторизация !!! --}}
            <input type="hidden" name="user_id" value="1">
            <input type="hidden" name="action_id" value="{{ $action->id }}">
            <div class="row">
                <div class="col-xs-24 col-md-12">
                    <div class="clearfix">
                        <div class="sign-in">Войти через соц.сети:</div>
                        <div class="social">
                            <ul class="social__list list-unstyled list-inline">
                                <li class="social__item">
                                    <a role="link" href="/" class="social__link social__link--ok anim">
                                        <i class="social-ico social-ico-ok anim"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a role="link" href="/" class="social__link social__link--vk anim">
                                        <i class="social-ico social-ico-vk anim"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a role="link" href="/" class="social__link social__link--tw anim">
                                        <i class="social-ico social-ico-tw anim"></i>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a role="link" href="/" class="social__link social__link--fb anim">
                                        <i class="social-ico social-ico-fb anim"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-24 col-md-12">
                    <div class="capcha">
                        <span class="capcha__wrap pull-right">
                            <span class="capcha__text">Введите капчу:</span>
                            <img src="img/temp/capcha.png"alt="" class="capcha__img">
                            <input type="text" class="form-control capcha__input">
                            <div class="capcha__btn">
                                <button role="submit" type="submit" class="btn btn-primary pull-right button popup-with-zoom-anim">Отправить</button>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </form>
    <script>
        var commentsCreate = '{{ route('comments.create') }}';
    </script>
    </section>
    