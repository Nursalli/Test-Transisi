$(document).on('click', '.deleteCompany', function () {
    const id = $(this).data('id');

    $('.modal-body form').attr('action', '/companies/' + id);
});

$(document).on('click', '.deleteEmployee', function () {
    const id = $(this).data('id');

    $('.modal-body form').attr('action', '/employees/' + id);
});
