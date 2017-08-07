$(function() {

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            'X-Requested-With': 'XMLHttpRequest'
        }
    });

    $('#comment-form').submit(function() {
        var th = $(this);
        $.ajax({
            type: "POST",
            url: commentsCreate,
            data: th.serialize()
        }).done(function() {
            $.magnificPopup.open({
                items: {
                    src: $('#comment-message'),
                    type: 'inline'
                }
            });
            setTimeout(function() {
                // Done Functions
                th.trigger("reset");
                $.magnificPopup.close();
            }, 2000);
        });
        return false;
    });

    $('.comments-opened').on('click', function () {
        $('.more-than-3').slideToggle(function () {
            var text = $('.more-info__link--more').text();
            $('.more-info__link--more').text(text == 'Показать все комментарии' ? 'Скрыть комментарии' : 'Показать все комментарии');
        });
    });
});


