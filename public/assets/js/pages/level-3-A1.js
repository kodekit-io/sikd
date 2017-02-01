function format ( d ) {
    return 'Pemda: '+d.detail.info1+'<br>'+
        'Data: '+d.detail.info2+'<br>'+
        'The child row can contain any data you wish, including links, images, inner tables etc.';
}

$(document).ready(function() {
    var dt = $('#A1').DataTable( {
        //"processing": true,
        //"serverSide": true,
        "ajax": "../data/L3_A1.json",
        "columns": [
            {
                "class":          "details-control",
                "orderable":      false,
                "data":           null,
                "defaultContent": "+"
            },
            { "data": "id", "title": "ID" },
            { "data": "name", "title": "Name" },
            { "data": "value", "title": "Value" }
        ],
        "order": [[1, 'asc']]
    } );

    var detailRows = [];

    $('#A1 tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );

        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();

            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();

            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );

    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );
});