$(document).ready( function() {

    $('.box-footer').html('');

    $("#sendForm").click(function () {
        //Ajax отправка формы
        var msg = $("#form-add-brand").serialize();
        $.ajax({
            type: "POST",
            url: "/ajax/admin/brand/add",
            data: msg,
            success: function(data) {
                $("#tab_4").html(data);
            },
            error:  function(xhr, str){
                alert("Возникла ошибка");
            }
        });
    });

});
