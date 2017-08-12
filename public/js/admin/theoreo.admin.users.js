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

    // Подтверждение мягкого удаления бренда

    $('.deleteUser').on('click', function(){

        if (!confirm('Вы действительно хотите переместить пользователя в раздел "Удаленные"?')) {
            return false;
        }
    });

    // Подтверждение удаления бренда безвозвратно

    $('.forceDeleteUser').on('click', function(){

        if (!confirm('Вы действительно хотите удалить пользователя безвозвратно?')) {
            return false;
        }
    });

    // Селект

    $("#roles").select2({
        placeholder: "Выберите роль",
        language: 'ru'
    });
});
