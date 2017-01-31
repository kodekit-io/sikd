function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Full name:</td>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extension number:</td>'+
            '<td>'+d.extn+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extra info:</td>'+
            '<td>And any further details here (images etc)...</td>'+
        '</tr>'+
    '</table>';
}
$(document).ready(function() {

	function tabA1(id) {
		var table_A1 = $('#A1').DataTable( {
			"searching": false,
	        "ajax": {
	            "url": "../data/L3_A1.json",
	            //"url": ajaxUrl + "/mediawave/jsontest/convo-blog.json",
	            //"data" : data
	        },
	        "columns": [
				{
	                "className":      'details-control',
	                "orderable":      false,
	                "data":           null,
	                "defaultContent": '+'
	            },
	            { "data": "id", "title": "ID", },
				{ "data": "name", "title": "Name", },
				{ "data": "value", "title": "Value", },
	        ],
	        "order": [[ 0, "asc" ]],
	    });
		$('#A1 tbody').on('click', 'td.details-control', function () {
	        var tr = $(this).closest('tr');
	        var row = table.row( tr );

	        if ( row.child.isShown() ) {
	            // This row is already open - close it
	            row.child.hide();
	            tr.removeClass('shown');
	        }
	        else {
	            // Open this row
	            row.child( format(row.data()) ).show();
	            tr.addClass('shown');
	        }
	    });
	}
	tabA1('A1');
});