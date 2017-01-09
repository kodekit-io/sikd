$(document).ready(function() {
    $("#konten_manage").DataTable({
        "searching": false,
        "paging": false,
        "info": false,
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
                    var url = '/content-edit/?id='+id;
                    return '<a href="'+url+'" title="Edit" class="uk-button uk-button-small green white-text">Edit</a>';
                }
            }
        ],
        "order": [[ 0, "asc" ]]
    });


    /* DRAGDROP ORDERING */

    //home slider
    var sortable1 = $('#sortslider'),
    button1 = $('#saveslide');
    button1.click(function () {
        saveOrdering(sortable1, button1);
    });
    sortable1.on('stop.uk.sortable', function (e, el, type) {
        setOrdering(sortable1, el);
    });
    setOrdering(sortable1);

    //home indicator
    var sortable2 = $('#sortind'),
    button2 = $('#saveind');
    button2.click(function () {
        saveOrdering(sortable2, button2);
    });
    sortable2.on('stop.uk.sortable', function (e, el, type) {
        setOrdering(sortable2, el);
    });
    setOrdering(sortable2);

    function setOrdering(sortable, activeEl) {
        var ordering = 1;
        sortable.find('>li').each(function () {
            var $ele = $(this);
            $ele.data('ordering', ordering);
            $ele.find('div.uk-badge').text(ordering);
            ordering++;
        });
        if (activeEl) {
            activeEl.find('div.uk-badge').addClass('uk-animation-scale-down');
        }
    }
    function saveOrdering (sortable, button) {
        var url = 'save.php', //url to save
        data = {
            task: 'saveOrdering',
            ordering: {}
        };
        sortable.find('>li').each(function () {
            data.ordering[$(this).data('id')] = $(this).data('ordering');
        });
        button.prop('disabled', true);
        console.log(data); //data going to server
        $.getJSON(url, data, function (result) {
            console.log(result); //json response from server
            button.prop('disabled', false);
        });
        setTimeout(function(){button.prop('disabled', false);},1000); //for testing only!
    }
});

