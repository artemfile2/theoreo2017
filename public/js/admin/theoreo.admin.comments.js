$(document).ready(function () {

    // Таблица [ search pagination showEntries ]

    $("#comments, #commentsDeleted").DataTable({
        "autoWidth": false
    });

    // Подтверждение мягкого удаления комментария

    $('.deleteComment').on('click', function(){

        if (!confirm('Вы действительно хотите переместить бренд в раздел "Удаленные"?')) {
            return false;
        }
    });

    // Подтверждение удаления комментария безвозвратно

    $('.forceDeleteComment').on('click', function(){

        if (!confirm('Вы действительно хотите удалить бренд безвозвратно?')) {
            return false;
        }
    });
    $('.approveComment').on('click', function(){

        if (!confirm('Вы действительно хотите опубликовать комментарий?')) {
            return false;
        }
    });
    $('.disapproveComment').on('click', function(){

        if (!confirm('Вы действительно хотите отменить публикацию комментария?')) {
            return false;
        }
    });
});