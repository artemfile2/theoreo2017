$(document).ready(function () {

    // Таблица [ search pagination showEntries ]

    $("#users, #usersDeleted").DataTable({
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

    $('.trashUser').on('click', function(e){
        e.preventDefault();
        simply_confirm(
            $(this).attr('href'),
            $(this).closest('tr'),
            'Вы действительно хотите переместить юзера в раздел "Удаленные"?',
            'Удаление юзера',
            'Юзер помещен в список Удалённые',
            'При удалении юзера возникли проблемы'
        );

    });

    // Восстановление юзера

    $('.restoreUser').on('click', function(e){
        e.preventDefault();
        simply_confirm(
            $(this).attr('href'),
            $(this).closest('tr'),
            'Вы действительно хотите восстановить юзера?',
            'Восстановление юзера',
            'Юзер восстановлен',
            'При восстановлении юзера возникли проблемы'
        );
    });


    // Подтверждение удаления акции безвозвратно

    $('.forceDeleteUser').on('click', function(e){

        e.preventDefault();
        simply_confirm(
            $(this).attr('href'),
            $(this).closest('tr'),
            'Вы действительно хотите удалить юзера безвозвратно?<br>это можно сделать только, если на юзера не зарегистрированы бренды.',
            'Окончательное удаление юзера',
            'Юзер удален',
            'При удалении юзера возникли проблемы'
        );
    });

    // Селект

    $("#roles").select2({
        placeholder: "Выберите роль",
        language: 'ru'
    });
});
