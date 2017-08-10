$(document).ready( function() {
var first = 0;
    $('.scroll_right').click(function() {
        if(first < $(".top-cat-menu-ul").children('.menu__item').length - 1){
            first ++;
            $('.top-cat-menu-ul').children("li:nth-child(" + first + ")").hide();
        }


    });
    $('.scroll_left').click(function() {

        if(first > 0){
            $('.top-cat-menu-ul').children("li:nth-child(" + first + ")").show();
            first --;
        }


    });
    $('.show_all_categories').click(function() {
        $('.top-cat-menu-ul').children().show();
        $('.top-cat-menu-ul').toggleClass('top-cat-menu-ul-show');
        $('.scroll_right').slideToggle();
        $('.scroll_left').slideToggle();
    });

});