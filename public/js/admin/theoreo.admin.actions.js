$(document).ready(function () {

    // Таблица [ search pagination showEntries ]

    $("#actions, #actionsDeleted").DataTable({
        "autoWidth": false,
        language: {
            "processing": "Подождите...",
            "search": "Поиск:",
            "lengthMenu": "Показать _MENU_ записей",
            "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
            "infoEmpty": "Записи с 0 до 0 из 0 записей",
            "infoFiltered": "(отфильтровано из _MAX_ записей)",
            "infoPostFix": "",
            "loadingRecords": "Загрузка записей...",
            "zeroRecords": "Записи отсутствуют.",
            "emptyTable": "В таблице отсутствуют данные",
            "paginate": {
                "first": "Первая",
                "previous": "Предыдущая",
                "next": "Следующая",
                "last": "Последняя"
            },
            "aria": {
                "sortAscending": ": активировать для сортировки столбца по возрастанию",
                "sortDescending": ": активировать для сортировки столбца по убыванию"
            }
        }
    });

    // Подтверждение мягкого удаления бренда

    $('.deleteAction').on('click', function(){

        if (!confirm('Вы действительно хотите переместить акцию в раздел "Удаленные"?')) {
            return false;
        }
    });

    // Подтверждение удаления бренда безвозвратно

    $('.forceDeleteAction').on('click', function(){

        if (!confirm('Вы действительно хотите удалить акцию безвозвратно?')) {
            return false;
        }
    });

    // Календарь

    $('.datepicker').datepicker({
        timePicker: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true,
        language: 'ru'
    });

    // Селект

    $(".select2").select2({
        language: 'ru'
    });

    $("#category_box").select2({
        placeholder: "Выберите категорию",
        language: 'ru',

    });

    $("#tags").select2({
        placeholder: "Выберите теги",
        language: 'ru'
    });

    // iCheck

    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        increaseArea: '20%' // optional
    });

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
        $('#brand_in_action_input').prop('disabled', function (_, val) { return ! val; });
    });


    $('#brand_added').prompt();

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

});