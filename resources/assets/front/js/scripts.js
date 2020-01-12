$(function(){
    //Change title modal window
    $('.add').on('click', function (event) {
        $('#ModalLabel').text('Добавление автора');
    });
    //Form
    $('.js-link-edit').on('click', function (event) {
        event.preventDefault();

        $.ajax({
            type: 'GET',
            url: $(this).attr('href')
        }).done(function (response) {
            var modalWindow = $('.modal-body');
            modalWindow.html(response);
            $('#ModalLabel').text('Изменение автора');
            /*$('form').attr('action', '/author/update');*/
            $('#Modal').modal('show');

        });

    });

    var jsContent =$('#js-content');

    jsContent.on('submit', 'form', function (event) {

        if($(this).attr('id') === 'mycontact-form') {
            event.preventDefault();
            var uform = $(this);

            $.ajax({
                type: uform.attr('method'),
                url: uform.attr('action'),
                data: uform.serialize()
            }).done(function (response) {
                $('#js-content').html(response);
                $('.alert, .text-danger, .invalid-feedback').delay(1000).fadeOut(1000);
            });
        }
    });
});
