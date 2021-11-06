function addAlert(message) {
    $('#alerts').append(
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">' + message +
            '<button type="button" class="btn-close" data-dismiss="alert"> </div>');
    }
    

// Fecha msg
$('.alert .btn-close').on('click', function(e) {
    $(this).parent().hide();
});