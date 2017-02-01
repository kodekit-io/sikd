function format ( d ) {
    return '<table class="uk-table bordered condensed"><tr><td>Pemda: </td><td>'+d.detail.info1+'</td></tr>'+
        '<tr><td>Data:</td><td>'+d.detail.info2+'</td></tr>'+
        '</table>';
}

$(document).ready(function() {
    var dt = $('#A1').DataTable( {
        //"processing": true,
        //"serverSide": true,
        "searching": false,
        "ajax": "../data/L3_A1.json",
        "columns": [
            {
                "class":          "details-control",
                "orderable":      false,
                "data":           null,
                "defaultContent": "<a class='uk-icon uk-icon-plus'></a>"
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
            $(this).find('a').addClass('uk-icon-plus').removeClass('uk-icon-minus');

            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();
            $(this).find('a').removeClass('uk-icon-plus').addClass('uk-icon-minus');

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