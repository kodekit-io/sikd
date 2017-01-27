$(document).ready(function() {
    // var url = "data/L2_A_detail-prov.json";
    var url = baseUrl + '/get-province-chart/' + $provinceId + '/' + $reportType;
    var div = "tableProv";
    $.ajax({
        url : url,
        beforeSend : function(xhr) {
            $('#' + div).hide();
        },
        complete : function(xhr, status) {
            $('#' + div).show();
        },
        success : function(result) {
            $result = $.parseJSON(result);
            data = $result.data;
            //console.log(data[1]);
            if (data.length === 0) {
				// $('#' + div).html("<div class='center'>No data</div>");
			} else {
				var $value = [];
				for (i = 0; i < data.length; i++) {
                    $value[i] = data[i].value;
				}
                var _array = $value;
                var max = Math.max.apply(Math,_array);
                var min = Math.min.apply(Math,_array);
                var sum = _array.reduce((pv,cv)=>{
                   return pv + (parseFloat(cv)||0);
                },0);
                var avg = sum/data.length;
                //console.log(avg);
            }

            var tableProv = $('#' + div).DataTable( {
                "ajax": url,
                "pageLength": 50,
                "paging": false,
                "searching": false,
                "info": false,
                "lengthChange": false,
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "value" },
                    {
                        "data": null,
                        "class": "progressbar",
                        "width": "65%",
                        "render": function (data,type,row,meta) {

                            var v = data["value"];
                            var p = (v/max) * 100;
                            var m = (avg/max) * 100;
                            //console.log(m);
                            return '<div class="uk-progress uk-margin-bottom-remove"><div class="sikd-m" data-uk-tooltip="{pos:\'left\'}" title="Average: '+avg+'" style="left:'+m+'%;"></div><div class="uk-progress-bar uk-animation-slide-left" style="width: '+p+'%;">'+v+'</div></div>';
                        }
                    },
                    {
                        "data": null,
                        "render": function ( data ) {
                            var k = data["name"];
                            var p = baseUrl+'/level-3'
                            return '<a class="uk-button cyan white-text right" href="'+p+'" data-uk-tooltip title="Informasi Detail '+k+'">Profil Pemda</a>';
                        }
                    },
                ],
                "columnDefs": [{
                    "visible": false,
                    "targets": [0,2]
                }],
                "order": [[ 2, "desc" ]]
            });
            $('#tableProv_wrapper .row').css('margin-bottom','0');
            $('#tableProv_wrapper thead').css('border','none');

        }
    });

});
