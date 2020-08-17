$(document).ready(function () {
    $('#is_free').on('change', function () {
        console.log($(this).val());
        if ($(this).val() == 0) {
            $('#delivery_cost').fadeIn();
        } else {
            $('#delivery_cost').fadeOut();
        }
    });
    $('.select2').select2({
        placeholder: 'Select'
    });
    $('.table').DataTable({
        'info' : true,
        'paging' : true,
        'searching' : false,
        'bSort' : false,
        'columnDefs' : [
            {
                'orderable': false, 'targets' : -1
            }
        ],
        'sorting' : []
    });
});
