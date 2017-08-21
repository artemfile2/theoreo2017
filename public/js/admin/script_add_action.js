$(document).ready( function() {

    $('#add_brand').click(function() {
        $('.brand-add-tab').toggleClass('hidden');
        $('#tab_4').load("/ajax/admin/brand/add");
        $(this).children('i').toggleClass('fa-plus');
        $(this).children('i').toggleClass('fa-minus');
    });

});
