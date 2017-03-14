(function ($, window, document, $baseUrl) {
    $(function () {
        var url = $baseUrl + '/apbd-posture/get-postures';
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
                        // {"group":1,"id":1,"name":"Realisasi APBD","id_map":"14","active":"true","icon":"APBD","created_at":null,"updated_at":null}
                        //

                        { "data": "id", "title": "id", "width": "10%" },
                        { "data": "group", "title": "Grup", "width": "10%" },
                        { "data": "name", "title": "Nama", "width": "40%" },
                        { "data": "id_map", "title": "Map ID", "width": "10%" },
                        { "data": "active", "title": "Aktif", "width": "10%" },
                        { "data": "icon", "title": "Icon", "width": "10%" },
                        { "data": null, "width": "10%", "class": "uk-text-right",
                            "render": function ( data ) {
                                var id = data["id"];
                                var edit = $baseUrl + '/apbd-posture/' + id + '/edit';
                                var del = $baseUrl + '/apbd-posture/' + id + '/delete';
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
