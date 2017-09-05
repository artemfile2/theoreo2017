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


    // Подтверждение мягкого удаления

    $('.trashAction').on('click', function(e){
        e.preventDefault();
        simply_confirm(
            $(this).attr('href'),
            $(this).closest('tr'),
            'Вы действительно хотите переместить акцию в раздел "Удаленные"?',
            'Удаление акции',
            'Акция помещена в список Удалённые',
            'При удалении акции возникли проблемы'
        );

    });

    // Восстановление акции

    $('.restoreAction').on('click', function(e){
        e.preventDefault();
        simply_confirm(
            $(this).attr('href'),
            $(this).closest('tr'),
            'Вы действительно хотите восстановить акцию?',
            'Восстановление акции',
            'Акция восстановлена',
            'При восстановлении акции возникли проблемы'
        );
    });


    // Подтверждение удаления акции безвозвратно

    $('.forceDeleteAction').on('click', function(e){

        e.preventDefault();
        simply_confirm(
            $(this).attr('href'),
            $(this).closest('tr'),
            'Вы действительно хотите удалить акцию безвозвратно?',
            'Окончательное удаление акции',
            'Акция удалена',
            'При удалении акции возникли проблемы'
        );
    });

});