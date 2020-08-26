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

    // $('.table thead th').each( function () {
    //     var title = $(this).text();
    //     $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    // } );

    // var table = $('.table').DataTable({
    //     initComplete: function () {
    //         // Apply the search
    //         this.api().columns().every( function () {
    //             var that = this;
 
    //             $( 'input', this.footer() ).on( 'keyup change clear', function () {
    //                 if ( that.search() !== this.value ) {
    //                     that
    //                         .search( this.value )
    //                         .draw();
    //                 }
    //             } );
    //         } );
    //     }
    // });
});
