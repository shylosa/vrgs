$(function () {
    removeAlerts();
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
        });
        } else if (uform.attr('id') === 'form-book') {
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
