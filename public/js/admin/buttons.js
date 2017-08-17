$(document).ready(function () {

    /*
    * кнопка удаления поста
    * пост из таблицы удалется и помечается на удаление*/
    /*$('.btn-danger').click(function () {
        var id = $(this).val();
        $("#ajax_"+id).load("/admin/content/delete/" + id);
        $('.del'+id).toggle("slow");
    });*/

    /*
    * кнопка добавления поста
    * добавляется в базу Акций и помечается на удаление во временной таблицы*/
    $('.btn-success').click(function () {
        var id = $(this).val();
        $("#ajax_"+id).load("/admin/content/insert/" + id);
    });


    /*
    * Всплывающее окно для подтверждения удаления записи
    * Да - удалает запись
    * Нет - закрывает окно и удаление не происходит*/
    $(".btn-danger").click(function () {
        var id = $(this).val();
        var elem = '.del'+$(this);

        $.confirm({
            'title'  : 'Подтвердите для удаления',
            'message' : 'Вы точно хотите удалить ' + id,
            'buttons' : {
                'Да' : {
                    'class' : 'blue',
                    'action': function(){
                        $("#ajax_"+id).load("/admin/content/delete/" + id);
                        id = '';
                        elem = '';
                        return true;
                        elem.slideUp();
                    }
                },
                'Нет' : {
                    'class' : 'gray',
                    'action': function()
                    {
                    }
                }
            }
        });
    });

});