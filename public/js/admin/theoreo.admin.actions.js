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

    $("#categories").select2({
        placeholder: "Выберите категорию",
        language: 'ru'
    });

    $("#tags").select2({
        placeholder: "Выберите теги",
        tags: true,
        language: 'ru'
    });

    // iCheck

    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        increaseArea: '20%' // optional
    });
});