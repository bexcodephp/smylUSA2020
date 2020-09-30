$(document).ready(function () {
    $('#is_free').on('change', function () {
        console.log($(this).val());
        if ($(this).val() == 0) {
            $('#delivery_cost').fadeIn();
        } else {
            $('#delivery_cost').fadeOut();
        }
    });
    
    $(".videomodal").on('hidden.bs.modal', function (e) {
        var memory = $(this).html();
        $(this).html(memory);
    });
    // $('.select2').select2({
    //     placeholder: 'Select'
    // });

    // $('.table').DataTable({
    //     // 'searching' : false,
    //     'bSort' : false,
    //     'columnDefs' : [
    //         {
    //             'orderable': false, 'targets' : -1
    //         }
    //     ],
    //     'sorting' : []
    // });

    // $('.table').DataTable({
    //     'info' : true,
    //     'paging' : true,
    //     'searching' : false,
    //     'bSort' : false,
    //     'columnDefs' : [
    //         {
    //             'orderable': false, 'targets' : -1
    //         }
    //     ],
    //     'sorting' : []
    // });
    
    $('.table thead th').each( function () {
        var title = $(this).text();
        if(title != "Phone" && title != "Actions" && title != "Address" && title != "Report")
        {
            $(this).html( '<input class="cls_search" type="text" placeholder="'+title+'" />' );
        }
    } );
    
    var table = $('.table').DataTable({
        'bSort' : false,
        responsive: true,
        // 'scrollX': true,
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
                
                $( '.cls_search', this.header() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
});

