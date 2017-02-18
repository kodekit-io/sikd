$(document).ready(function() {
    numeral.locale('id');
    var url = baseUrl + '/get-province-chart/' + $type + '/' + $postureId + '/' + $year + '/' + $provinceId;
    var div = "tableProv";
    var x = 0;
    $.ajax({
        url : url,
        beforeSend : function(xhr) {
            $('main').append('<div class="uk-position-center" uk-spinner></div>');
            x++;
        },
        complete : function(xhr, status) {
            x--;
            if (x <= 0) {
                $('[uk-spinner]').remove();
            }
        },
        success : function(result) {
            console.log(result);
            $result = $.parseJSON(result);
            data = $result.data;
            //console.log(result);
            if (data.length > 0) {
				var $value = [];
				for (i = 0; i < data.length; i++) {
                    // console.log(data[i].percentage);
                    // $value[i] = data[i].value;
                    $value[i] = data[i].percentage;
				}
                var _array = $value;
                var max = Math.max.apply(Math,_array);
                var min = Math.min.apply(Math,_array);
                var sum = _array.reduce((pv,cv)=>{
                   return pv + (parseFloat(cv)||0);
                },0);
                var avg = sum/data.length;
            }

            var tableProv = $('#' + div).DataTable( {
                "ajax": url,
                "pageLength": 100,
                "paging": false,
                "searching": false,
                "info": false,
                "lengthChange": false,
                "language": {"sZeroRecords": "", "sEmptyTable": "Tidak ada data"},
                "columns": [
                    { "data": "kodeSatker", "width": "10%" },
                    { "data": "name", "width": "15%" },
                    //{ "data": "percentage" },
                    {
                        "data": null,
                        "width": "60%",
                        "render": function (data) {
                            var v = data["percentage"];
                            var vnum = numeral(v).format('0.0');
                            var avgnum = numeral(avg).format('0.0');

                            return  '<div class="uk-progress">'
                                        + '<div class="progress-bar uk-animation-slide-left" style="width: '+v+'%;"><span class="progress-text">'+vnum+'%</span></div>'
                                        + '<div class="progress-mean" uk-tooltip="pos:left" title="Average: '+avgnum+'%" style="left:'+avg+'%;"></div>'
                                    + '</div>';

                        }
                    },
                    {
                        "data": null,
                        "width": "15%",
                        "class": "uk-text-right",
                        "render": function ( data ) {
                            //console.log(data);
                            var k = data["name"];
                            var p = baseUrl + '/pemda/' + data["kodeSatker"]
                            return '<a class="uk-button uk-button-small uk-button-default" href="'+p+'" data-uk-tooltip title="Profil '+k+'">Profil Pemda</a>';
                        }
                    },
                ],
                "order": [[ 0, "desc" ]]
            });
        },
        error: function (request, status, error) {
            $('main').append('<div class="uk-position-center">FOUT!</div>');
        }
    });

});
