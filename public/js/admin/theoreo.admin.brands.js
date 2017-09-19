$(document).ready(function () {

    // Таблица [ search pagination showEntries ]

    $("#brands, #brandsDeleted").DataTable({
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

    $('.trashBrand').on('click', function(e){
        e.preventDefault();
        simply_confirm(
            $(this).attr('href'),
            $(this).closest('tr'),
            'Вы действительно хотите переместить бренд в раздел "Удаленные"?',
            'Удаление бренды',
            'Бренд помещен в список Удалённые',
            'При удалении бренда возникли проблемы'
        );

    });

    // Восстановление бренда

    $('.restoreBrand').on('click', function(e){
        e.preventDefault();
        simply_confirm(
            $(this).attr('href'),
            $(this).closest('tr'),
            'Вы действительно хотите восстановить бренд?',
            'Восстановление бренда',
            'Бренд восстановлен',
            'При восстановлении бренда возникли проблемы'
        );
    });


    // Подтверждение удаления бренда безвозвратно

    $('.forceDeleteBrand').on('click', function(e){

        e.preventDefault();
        simply_confirm(
            $(this).attr('href'),
            $(this).closest('tr'),
            'Вы действительно хотите удалить бренд безвозвратно?<br>Вместе с брендом будут удалены все его акции!',
            'Окончательное удаление бренда',
            'Бренд удалён',
            'При удалении бренда возникли проблемы'
        );
    });

});