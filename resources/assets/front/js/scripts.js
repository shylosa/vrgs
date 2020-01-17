$(function () {
    removeAlerts();
    datatableFormat();
    var jsContent = $('#js-content');

    //Add modal form
    jsContent.on('click', '.js-link-add', function (event) {
        event.preventDefault();
//        removeValidationErrors();

        $.ajax({
            type: 'GET',
            url: $(this).attr('href')
        }).done(function (response) {
            $('.modal-body').html(response);
            $('#ModalLabel').text('Добавление записи');
            $('#Modal').modal('show');
        });
        /*
        $('form :input').val('');
        removeValidationErrors();*/
    });

    //Edit modal form
    jsContent.on('click', '.js-link-edit', function (event) {
        event.preventDefault();
        //removeValidationErrors();

        $.ajax({
            type: 'GET',
            url: $(this).attr('href')
        }).done(function (response) {
            $('.modal-body').html(response);
            $('#ModalLabel').text('Изменение записи');
            $('#Modal').modal('show');
        });
    });

    //Send modal form
    jsContent.on('submit', 'form', function (event) {
        event.preventDefault();
        var uform = $(this);

        if(uform.attr('id') === 'form-author') {
            $.ajax({
                type: uform.attr('method'),
                url: uform.attr('action'),
                data: uform.serialize(),
                dataType: 'json'
            }).done(function (response) {
                $('#js-content').html(response);
                //removeModal();
                removeAlerts();
                //showModal();
                datatableFormat();
            }).fail(function (response, status) {
                //If response has validation errors
                if (response.status === 422) {
                    $.each(response.responseJSON.errors, function(index, value) {
                        var field = $("input[name='"+index+"']" );
                        //Display all errors for each field
                        value.forEach(function (err) {
                            var errorMessage = document.createElement('span');
                            errorMessage.setAttribute('class', 'form-text text-danger');
                            errorMessage.innerHTML = err;
                            field.parent().append(errorMessage);
                        });
                   });
                }
            })
        } else if (uform.attr('id') === 'form-book') {
            //Ajax method for upload file
            formData = new FormData(uform[0]);
            $.ajax({
                type: uform.attr('method'),
                url: uform.attr('action'),
                data: formData,
                processData: false,
                contentType: false
            }).always(function (response, status) {
                $('#js-content').html(response);
                //removeModal();
                removeAlerts();
                //showModal();
                datatableFormat();
            });
        }
    });

});

//Remove alerts messages from page
function removeAlerts() {
    var alerts = $('.alert, .invalid-feedback');
    alerts.delay(1000).fadeOut(1000);
}

//Remove old validation errors
function removeValidationErrors() {
    $('.text-danger').remove();
}

//Show modal window with validation errors
function showModal() {
    if ($('span').hasClass('text-danger')) {
        $('#Modal').modal('show');
    }
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
    var table = $('.table');
    var rows = targetRows(table);
    var t = table.DataTable({
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
            "targets": rows
        }],
        //Set default sort options for row = 2 (numeration starts from 0)
        "order": [[1, 'asc']]
    });
    //Renumbering table rows when sorting and searching
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    }).draw();
}
//Return rows number with disabled search and sorting
function targetRows(table) {
    var tableId = table.attr('id');
    switch (tableId) {
        case 'table-authors':
            return [0, 3, 4];
        case 'table-books':
            return [0, 2, 3, 4, 6];
        case 'table-catalog':
            return [0, 3, 4];
    }
}