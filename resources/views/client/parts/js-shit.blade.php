<script>
    (function (jQuery) {
        jQuery.fn.center = function () {
            this.css("position", "absolute");
            this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + $(window).scrollTop()) + "px");
            this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft()) + "px");
            return this;
        };
    })(jQuery);

    $(function () {
        $('.category-li').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            location.href = '{{ env('APP_URL') }}/?cat=' + $(this).data('catid');
        });

        var initLightbox = function () {
            if ($.fn.magnificPopup) {
                $('.ui-lightbox').magnificPopup({
                    type: 'image',
                    closeOnContentClick: false,
                    closeBtnInside: true,
                    fixedContentPos: true,
                    mainClass: 'mfp-no-margins mfp-with-zoom',
                    image: {
                        verticalFit: true,
                        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                    }
                });
                $('.ui-lightbox-video, .ui-lightbox-iframe').magnificPopup({
                    disableOn: 700,
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false
                });
                $('.ui-lightbox-gallery').magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    tLoading: 'Loading image #%curr%...',
                    mainClass: 'mfp-img-mobile',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0, 1]
                    },
                    image: {
                        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                        titleSrc: function (item) {
                            /*return item.el.attr('title') + '<small>by Marsel Van Oosten</small>'*/
                            return '';
                        }
                    }
                });
            }
        };

        initLightbox();

        @if(Request::input('cat'))
            $('#cat' + '{{ Request::input('cat') }}').prop('checked', true);
        @endif

        @if (!empty($catName))
            $('div.category-list a.menu-category__link').text('{{ $catName }}');
        @endif

        $('.search-form__submit').on('click', function () {
            $(this).closest('form').submit();
        });

        $('.ico-closer').on('click', function () {
            $('.right-block').css('margin-left', '0');
            $('.left-block').hide();
            $('.showFilters').show();
        });

        $('.chkbx').on('click', function () {
            $(this).toggleClass('chkbx-checked');
            var currentState = $(this).hasClass('chkbx-checked') ? true : false;
            $(this).siblings('input[type="checkbox"]').prop('checked', currentState);
        });

        $('.link-reset').on('click', function () {
            var $filterList = $('.filters-list'),
                $checkboxesTrue = $filterList.find('input[type="checkbox"]'),
                $checkboxesFalse = $filterList.find('.chkbx-checked');
            $checkboxesTrue.prop('checked', false);
            $checkboxesFalse.removeClass('chkbx-checked');
            setApplyButtonState();
        });

        $('.showFilters').on('click', function () {
            var leftOffset = 0;
            if ($(window).width() >= 968) {
                leftOffset = 300;
            } else if ($(window).width() >= 768 && $(window).width() < 968) {
                leftOffset = 340;
            }
            $('.left-block').css('display', 'block');
            $('.right-block').css('margin-left', leftOffset + 'px');
            $(this).hide();
        });

        function setApplyButtonState() {
            var checkedBoxes = $('form[name="filterform"] input[type="checkbox"]:checked');
            if (checkedBoxes.length) {
                $('.btn-apply-filters').removeClass('disabled');
            } else {
                $('.btn-apply-filters').addClass('disabled');
            }
        }

        $('form[name="filterform"] span.chkbx').on('click', function () {
            setApplyButtonState();
        });

        $('form[name="filterform"]').on('submit', function () {
            if ($('.btn-apply-filters').hasClass('disabled')) {
                return false;
            }
            var filterdata = $(this).serialize();
            showOverlay();
            setTimeout(function () {
                $.post('/ajax/filters', {
                    filterdata: filterdata
                }, function (response) {
                    $('.actions-list').html(response);
                    $('.paginator').hide();
                    hideOverlay();
                });
            }, 1000);
            return false;
        });

        function showOverlay() {
            $('#overlay').css({
                'display': 'table',
                'height': $(document).height()
            }).center();
        }

        function hideOverlay() {
            $('#overlay').css('display', 'none');
        }

        @if (App::environment() != 'local')
            var modalShown = appStorage.get('modalShown') || false,
                pagesViewed = appStorage.get('pagesViewed') || 0;
            pagesViewed++;
            appStorage.set('pagesViewed', pagesViewed);

            function showModalDelay(_delay) {
                var delay = _delay || 0;
                setTimeout(function () {
                    $('#myModal').modal();
                    yaCounter33198623.reachGoal('BANNEROPEN');
                    modalShown = true;
                    appStorage.set('modalShown', true);
                }, delay);
            }

            if (!modalShown && pagesViewed >= 3) {
                showModalDelay(5000);
            } else if (!modalShown && pagesViewed < 3) {
                showModalDelay(20000);
            }
        @endif
    });

    function addFav() {
        yaCounter33198623.reachGoal('VKINTEREST');
        var isWebkit, isMac;
        var UA = navigator.userAgent.toLowerCase();
        var title = document.title;
        var url = document.location;
// Webkit (Chrome, Opera), Mac
        if ((isMac = (UA.indexOf('mac') != -1)) || (isWebkit = (UA.indexOf('webkit') != -1))) {
            document.getElementById('fav').innerHTML = 'Нажмите "' + (isMac ? 'Command/Cmd' : 'Ctrl') + ' + D" для добавления страницы в закладки';
            return false;
        }
// IE
        if (window.external) {
            window.external.AddFavorite(url, title);
            return false;
        }
    }
</script>