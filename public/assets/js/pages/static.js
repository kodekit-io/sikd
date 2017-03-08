(function ($, window, document, $id) {
    $(function () {
        var $url = $baseUrl + '/static';
        staticPage($id,'content',$url)
    });

	function staticPage(id,div,url) {
        $.ajax({
            url : url,
            beforeSend : function(xhr) {
                $('#'+div).hide();
            },
            complete : function(xhr, status) {
                $('#'+div).show();
            },
            success : function(result) {
                $data = jQuery.parseJSON(result);
                console.log($data);
                $title = [];
                $content = [];
                if ($data.length === 0) {
                    $('#'+div).html("<div class='center'>No data chart</div>");
                } else {
                    for (i = 0; i < $data.length; i++) {
                        //$id = $data[i].id;
                        $title[i] = $data[i].title;
                        $content[i] = $data[i].description;
                    }

                    $('#title').html($title[id]);
                    $('#'+div).html($content[id]);
                    $(window).trigger("resize");
                }
            }
        });
	}

}(window.jQuery, window, document, $id));