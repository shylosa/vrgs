$(function () {
    removeAlerts();
    datatableFormat();
    var jsContent = $('#js-content');

    //Change title modal window
    $('.add').on('click', function (event) {
        $('#ModalLabel').text('Добавление записи');
    });

    //Add and edit author's modal form
    jsContent.on('click', '.js-link-edit', function (event) {
        event.preventDefault();

        $.ajax({
            type: 'GET',
            url: $(this).attr('href')
        }).done(function (response) {
            var modalWindow = $('.modal-body');
            modalWindow.html(response);
            $('#ModalLabel').text('Изменение записи');
            $('#Modal').modal('show');
        });
    });

    //Ajax send modal form
    jsContent.on('submit', 'form', function (event) {
        event.preventDefault();
        var uform = $(this);

        if(uform.attr('id') === 'form-author') {

        $.ajax({
            type: uform.attr('method'),
            url: uform.attr('action'),
            data: uform.serialize()
        }).done(function (response) {
            $('#js-content').html(response);
            removeAlerts();
            removeModal();
            datatableFormat();
        });
        } else if (uform.attr('id') === 'form-book') {
            //Ajax method for upload file
            formData = new FormData(uform[0]);

            $.ajax({
                type: uform.attr('method'),
                url: uform.attr('action'),
                data: formData,
                processData: false,
                contentType: false
            }).done(function (response) {
                $('#js-content').html(response);
                removeAlerts();
                removeModal();
                datatableFormat();
            });
        }
    });

});

//Remove alerts messages from page
function removeAlerts() {
    $('.alert, .text-danger, .invalid-feedback').delay(1000).fadeOut(1000);
}

//Remove modal window overflow
function removeModal() {
    $('.modal-backdrop').remove();
    var bd = $('body');
    bd.removeClass('modal-open');
    bd.removeAttr('style');
}

//Datatable pagination
function datatableFormat() {
    var t = $('.table').DataTable({
        //Quantity records on page
        "pageLength": 15,
        //Array with page quantity options
        "lengthMenu": [ 5, 15, 30 ],
        //Translate interface to russian
        "language": {
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
            },
            "select": {
                "rows": {
                    "_": "Выбрано записей: %d",
                    "0": "Кликните по записи для выбора",
                    "1": "Выбрана одна запись"
                }
            }
        },
        //Set rows options for sorting and searching
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }, {
            "searchable": false,
            "orderable": false,
            "targets": 3
        }, {
            "searchable": false,
            "orderable": false,
            "targets": 4
        }],
        //Set default sort options for row = 2 (numeration starts from 0)
        "order": [[2, 'asc']]
    });
    //Renumbering table rows when sorting and searching
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();
}