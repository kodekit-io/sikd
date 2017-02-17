$(document).ready(function() {
    $("#account_manage").DataTable({
        "ajax": {
            "url" : "data/accounts.json",
            "data" : "data",
        },
        "columns": [
            {
                "title": "Id",
                "data": null,
                "render": function ( data ) {
                    return data["id"];
                }
            },
            {
                "title": "Username",
                "data": null,
                "render": function ( data ) {
                    return data["username"];
                }
            },
            {
                "title": "Name",
                "data": null,
                "render": function ( data ) {
                    return data["name"];
                }
            },
            {
                "title": "Email",
                "data": null,
                "render": function ( data ) {
                    return data["email"];
                }
            },
            {
                "title": "Akses",
                "data": null,
                "render": function ( data ) {
                    return data["access"];
                }
            },
            {
                "title": "",
                "data": null,
                "class": "uk-text-right",
                "render": function ( data ) {
                    var id = data["id"];
                    var url = '/account-edit/?id='+id;
                    return '<a href="'+url+'" title="Edit" class="uk-button uk-button-small green white-text">Edit</a> <a href="#delete" title="Delete" class="uk-button uk-button-small red white-text" data-uk-modal>Delete</a>';
                }
            }
        ],
        "order": [[ 0, "asc" ]]
    });
});