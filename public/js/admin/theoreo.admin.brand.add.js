$(document).ready(function () {

    $("#category_box").select2({
        placeholder: "Выберите категорию",
        language: 'ru',

    });

    $('#add_category').click(function() {
        var token = $(this).attr('name');
        var txt = '<label>Название <input type="text" name="name" value=""></label><br /><label>Код <input type="text" name="code" value=""></label><br />';

        $.prompt(txt,{
            submit:function(e,v,m,f){
                e.preventDefault();
                if(v==false) $.prompt.close();
                if(v==1) {
                    if(f.name != '' && f.code != ''){
                        $.post("/ajax/admin/category/add", {name: ""+f.name+"", code: ""+f.code+"", _token: ""+token+""}, function(data) { // Do an AJAX call
                            $.prompt.close();
                            if($.isNumeric(data)){
                                var new_cat = [{ id: data, text: f.name, selected: true }];
                                $("#category_box").select2({data: new_cat});
                                $.prompt("Категория сохранена");
                            }else{
                                $.prompt(data);
                            }
                        });
                    }else{
                        $.prompt("Заполните все поля");
                    }
                }
            },
            title: 'Добавить категорию',
            buttons: { Сохранить: 1, Отменить: false }
        });
    });
});