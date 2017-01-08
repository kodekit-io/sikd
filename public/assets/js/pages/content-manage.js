$(document).ready(function() {
    $("#konten_manage").DataTable({
        "search" : false,
        "ajax": {
            "url" : "data/konten.json",
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
                "title": "Judul",
                "data": null,
                "render": function ( data ) {
                    return data["judul"];
                }
            },
            {
                "title": "Konten",
                "data": null,
                "render": function ( data ) {
                    var post = data["konten"];
                    var postrim = post.substring(0,200) + "...";
                    return postrim;
                }
            },
            {
                "title": "",
                "data": null,
                "class": "uk-text-right",
                "render": function ( data ) {
                    var id = data["id"];
                    var url = '/account-edit/?id='+id;
                    return '<a href="'+url+'" title="Edit" class="uk-button uk-button-small green white-text">Edit</a>';
                }
            }
        ],
        "order": [[ 0, "asc" ]]
    });
});