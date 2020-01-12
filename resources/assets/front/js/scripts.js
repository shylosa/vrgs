$(function(){
    removeAlerts();
    var jsContent =$('#js-content');

    //Change title modal window
    $('.add').on('click', function (event) {
        $('#ModalLabel').text('Добавление автора');
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
            $('#ModalLabel').text('Изменение автора');
            $('#Modal').modal('show');
        });
    });

    //Ajax send modal form
   jsContent.on('submit', 'form', function (event) {

        if($(this).attr('id') === 'form-author') {
            event.preventDefault();
            var uform = $(this);

            $.ajax({
                type: uform.attr('method'),
                url: uform.attr('action'),
                data: uform.serialize()
            }).done(function (response) {
                $('#js-content').html(response);
                removeAlerts();
                $('.modal-backdrop').remove();
            });
        }
    });

});

//Remove alerts messages from page
function removeAlerts() {
    $('.alert, .text-danger, .invalid-feedback').delay(1000).fadeOut(1000);
}
