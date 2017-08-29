$(document).ready(function () {

    // Календарь

    $('.datepicker').datepicker({
        timePicker: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true,
        language: 'ru'
    });

    /* добавление и выбор тега */

    $("#tags").select2({
        placeholder: "Выберите теги",
        language: 'ru'
    });


    $('#add_tag').click(function() {
        var token = $(this).attr('name');
        var txt = '<label>Название <input type="text" name="name" value=""></label><br />';

        $.prompt(txt,{
            submit:function(e,v,m,f){
                e.preventDefault();
                if(v==false) $.prompt.close();
                if(v==1) {
                    if(f.name != ''){
                        $.post("/ajax/admin/tag/add", {name: ""+f.name+"", _token: ""+token+""}, function(data) { // Do an AJAX call
                            $.prompt.close();
                            if($.isNumeric(data)){
                                var new_tag = [{ id: data, text: f.name, selected: true }];
                                $("#tags").select2({data: new_tag});
                                $.prompt("Тэг добавлен");
                            }else{
                                $.prompt(data);
                            }
                        });
                    }else{
                        $.prompt("Введите название тега");
                    }
                }
            },
            title: 'Добавить тэг',
            buttons: { Сохранить: 1, Отменить: false }
        });
    });

    /* добавление бренда */

    $('#add_brand').click(function() {
        $('.brand-add-tab').toggleClass('hidden');
        if($(this).children('i').hasClass('fa-plus')){
            $('#tab_1').toggleClass('active');
            $('#tab_4').toggleClass('active');
            $('.first_tab').toggleClass('active').children('a').attr('aria-expanded', false);
            $('.brand-add-tab').toggleClass('active').children('a').attr('aria-expanded', true)
        }
        $(this).children('i').toggleClass('fa-plus');
        $(this).children('i').toggleClass('fa-minus');
    });


    $('#brand_added').prompt();

});