(function ($, window, document, $baseUrl) {
    $(function () {
        var url = $baseUrl + '/tkdd-posture/get-postures';
		userList('list',url);
    });
    function userList(div,url) {
	    $.ajax({
	        url : url,
	        beforeSend : function(xhr) {
	        },
	        complete : function(xhr, status) {
	        },
	        success : function(result) {
                result = $.parseJSON(result);
                var userList = $("#"+div).dataTable({
                    data: result,
                    //dom: 't',
                    dom: "<'uk-width-1-1't><'uk-grid uk-grid-collapse'<'uk-width-1-2'l><'uk-width-1-2'p>>",
                    paging: true,
                    searching: false,
                    info: false,
                    language: {"sZeroRecords": "", "sEmptyTable": "Tidak ada data"},
                    columns: [
                        { "data": "idPostur", "title": "ID", "width": "5%" },
                        { "data": "kodePostur", "title": "Kode", "width": "5%" },
                        { "data": "uraianPostur", "title": "Uraian", "width": "20%" },
                        { "data": "uraianPosturSingkat", "title": "Singkat", "width": "10%" },
                        { "data": "idInduk", "title": "Induk", "width": "10%" },
                        { "data": "adaAkun", "title": "Ada Akun", "width": "10%" },
                        { "data": "levelnya", "title": "Level", "width": "10%" },
                        { "data": "group", "title": "Grup", "width": "10%" },
                        { "data": "icon", "title": "Icon", "width": "10%" },
                        { "data": null, "width": "10%", "class": "uk-text-right",
                            "render": function ( data ) {
                                var id = data["idPostur"];
                                var edit = $baseUrl + '/tkdd-posture/' + id + '/edit';
                                var del = $baseUrl + '/tkdd-posture/' + id + '/delete';
                                return '<a href="'+edit+'" title="Edit User" class="uk-button uk-button-small uk-button-default"><span class="fa fa-pencil green-text"></span></a>'
                                + '<a href="#delConfirm'+id+'"title="Delete User" class="uk-button uk-button-small uk-button-default" uk-toggle><span class="fa fa-close red-text"></span></a>'
                                + '<div id="delConfirm'+id+'" uk-modal>'
                                    + '<div class="uk-modal-dialog uk-modal-body">'
                                        + '<h3>Anda yakin akan menghapus ini?</h3><hr>'
                                        + '<div class="uk-flex uk-flex-between">'
                                            + '<a class="uk-button uk-button-default uk-modal-close">Batal</a>'
                                            + '<a href="'+del+'" class="uk-button uk-button-danger">YA, HAPUS!</a>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>';
                            }
                        }
                    ],
                    order: [[0, 'asc']]
                });
	        },
            error: function (request, status, error) {
                $('#'+div).append('<div class="uk-position-center">FOUT!</div>');
            }
	    });
	}
}(window.jQuery, window, document, $baseUrl));