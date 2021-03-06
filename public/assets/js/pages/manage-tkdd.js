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
                        { "data": "idPostur", "title": "ID", "width": "2.5%" },
                        { "data": "kodePostur", "title": "Kode", "width": "2.5%" },
                        { "data": "uraianPostur", "title": "Uraian", "width": "20%" },
                        { "data": "uraianPosturSingkat", "title": "Singkat", "width": "15%" },
                        { "data": "idInduk", "title": "Induk", "width": "7.5%" },
                        { "title": "Ada Akun?", "width": "7.5%",
                            "data": function ( data ) {
                                var akun = data["adaAkun"];
                                switch(akun) {
                                    case 0:
                                        return "Tidak"
                                        break;
                                    case 1:
                                        return "Ya"
                                        break;
                                }
                            }
                        },
                        { "data": "levelnya", "title": "Level", "width": "5%" },
                        { "data": "group", "title": "Grup", "width": "5%" },
                        { "data": "icon", "title": "Icon", "width": "5%" },
                        { "data": "icon_path", "title": "Icon Image", "width": "20%" },
                        { "data": null, "width": "10%", "class": "uk-text-right",
                            "render": function ( data ) {
                                var id = data["idPostur"];
                                var edit = $baseUrl + '/tkdd-posture/' + id + '/edit';
                                var del = $baseUrl + '/tkdd-posture/' + id + '/delete';
                                return '<a href="'+edit+'" title="Edit" class="uk-button uk-button-small uk-button-default"><span class="fa fa-pencil green-text"></span></a>'
                                + '<a title="Delete" class="btn-delete uk-button uk-button-small uk-button-default" data-url="'+del+'"><span class="fa fa-close red-text"></span></a>';
                            }
                        }
                    ],
                    order: [[0, 'asc']]
                });
                $("body").on("click", "#"+div+" a.btn-delete", function (e) {
                    e.preventDefault();
                    var link = $(this).attr('data-url');
                    $(this).blur();
                    UIkit.modal.confirm('<h4>Anda yakin akan menghapus ini?</h4>').then(function() {
                        window.location.href = link;
                    }, function () {

                    });
                });
	        },
            error: function (request, status, error) {
                $('#'+div).append('<div class="uk-position-center">FOUT!</div>');
            }
	    });
	}
}(window.jQuery, window, document, $baseUrl));
