(function ($, window, document, $baseUrl) {
    $(function () {
        var url = $baseUrl + '/get-user-list/';
		userList('list',url);
        var add_account_form = $('#add_account_form');
        add_account_form.validate();

        $(document).on('submit', '#add_account_form', function(e){
            e.preventDefault();
            // Validate form
            if (add_account_form.valid() == true){
                // show_loading_message();
                var form_data = $('#add_account_form').serialize();
                var request   = $.ajax({
                    url:          $baseUrl+'/add-user',
                    cache:        false,
                    data:         form_data,
                    dataType:     'json',
                    contentType:  'application/json; charset=utf-8',
                    type:         'post'
                });
                request.done(function(output){
                    if (output.result == 'success'){
                        // Reload datable
                    } else {
                        alert('Not Succeed');
                    }
                });
                request.fail(function(jqXHR, textStatus){
                    alert('Failed ' + textStatus);
                });
            }
        });

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
                        { "data": "id", "title": "ID", "width": "10%" },
                        { "data": "name", "title": "Nama", "width": "30%" },
                        { "data": "email", "title": "Email", "width": "40%" },
                        { "data": null, "width": "20%", "class": "uk-text-right",
                            "render": function ( data ) {
                                var id = data["id"];
                                var edit = $baseUrl + '/manage-account-edit?id='+id;
                                var del = $baseUrl + '/manage-account-delete?id='+id;
                                return '<a href="'+edit+'" title="Edit User" class="uk-button uk-button-small uk-button-default"><span class="fa fa-pencil green-text"></span></a>'
                                + '<a href="'+del+'" title="Delete User" class="uk-button uk-button-small uk-button-default"><span class="fa fa-close red-text"></span></a>';
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