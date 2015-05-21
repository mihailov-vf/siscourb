$('#mainModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var title = button.data('title'); // Extract info from data-* attributes
    var id = button.data('id');
    var operation = button.data('operation');
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    $.get('/js/template/note.html', function (template) {
        modal.find('.modal-title').text(title)
        modal.find('.modal-body').html(template)

        $('#submitButton').on('click', function () {
            var url = '/ticket/' + id + '/' + operation;
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: $('form[name="NoteForm"]').serialize()
                    });
        });
    });
});