function format ( d ) {
    return '<table class="uk-table bordered uk-width-1-1"> \
        <tr> \
            <td width="10%"></td> \
            <td width="10%">'+d.level1[0].no2+'</td> \
            <td width="20%">'+d.level1[0].uraian2+'</td> \
            <td width="20%">'+d.level1[0].anggaran2+'</td> \
            <td width="20%">'+d.level1[0].realisasi2+'</td> \
            <td width="20%">'+d.level1[0].persen2+'</td> \
        </tr> \
        <tr> \
            <td width="10%"></td> \
            <td width="10%">'+d.level1[1].no2+'</td> \
            <td width="20%">'+d.level1[1].uraian2+'</td> \
            <td width="20%">'+d.level1[1].anggaran2+'</td> \
            <td width="20%">'+d.level1[1].realisasi2+'</td> \
            <td width="20%">'+d.level1[1].persen2+'</td> \
        </tr> \
        <tr> \
            <td width="10%"></td> \
            <td width="10%">'+d.level1[2].no2+'</td> \
            <td width="20%">'+d.level1[2].uraian2+'</td> \
            <td width="20%">'+d.level1[2].anggaran2+'</td> \
            <td width="20%">'+d.level1[2].realisasi2+'</td> \
            <td width="20%">'+d.level1[2].persen2+'</td> \
        </tr> \
    </table>';
}

$(document).ready(function() {
    var dt = $('#A1').DataTable( {
        //"processing": true,
        //"serverSide": true,
        "searching": false,
        "paging": false,
		"info": false,
        "ajax": "../data/L3_tabel.json",
        "columns": [
            {
                "class":          "details-control",
                "orderable":      false,
                "data":           null,
                "width": "10%",
                "defaultContent": "<a class='uk-icon uk-icon-plus'></a>"
            },
            { "data": "no", "title": "No", "width": "10%" },
            { "data": "uraian", "title": "Uraian", "width": "20%" },
            { "data": "anggaran", "title": "Anggaran", "width": "20%" },
            { "data": "realisasi", "title": "Realisasi", "width": "20%" },
            { "data": "persen", "title": "Persen", "width": "20%" }
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