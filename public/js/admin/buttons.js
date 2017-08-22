$(document).ready(function () {

    $('.btn-danger').click(function () {
        $('.del'+$(this).val()).toggle("slow");
    })

});