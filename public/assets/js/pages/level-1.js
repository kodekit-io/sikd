(function ($, window, document, $reportName, $mapBaseUrl, $reportType) {
    $(function () {
        var $url = $baseUrl + '/get-map-chart/' + $reportType;
        L1Map($reportName, $url);
    });

    function L1Map(title, type) {
        $("#titleMap").html("Penyaluran "+title+" Tingkat Nasional");
        $.ajax({
            url : type,
            success : function(result) {
                result = jQuery.parseJSON(result);
                data = result.data;

                if (data.length > 0) {
                    var $content = [];
                    var $arrayval = [];
                    for(var i = 0; i < data.length; i++) {
                        var $id = data[i].id;
                        var $name = data[i].name;
                        var $value = data[i].value;
                        $content[i] = {id: $id, name: $name, value: $value};
                        $arrayval[i] = data[i].value;
                    }
                    var _array = $arrayval;
                    var valmax = Math.max.apply(Math,_array);
                    var valmin = Math.min.apply(Math,_array);

                    var map = {
                        content: $content
                    };


                    var myMap = echarts.init(document.getElementById('map'));
                    myMap.showLoading();
                    $.get($baseUrl + '/assets/js/pages/indonesiaMap.json', function (idJson) {
                        myMap.hideLoading();
                        echarts.registerMap('Indonesia', idJson, {});
                        var option = {
                            title : {
                                text: '',
                                subtext: '',
                                //sublink: 'http://',
                                left: 'right'
                            },
                            tooltip : {
                                trigger: 'item',
                                showDelay: 0,
                                transitionDuration: 0.2,
                                formatter : function (params) {
                                    var value = (params.value + '').split('.');
                                    value = value[0].replace(/(\d{1,3})(?=(?:\d{3})+(?!\d))/g, '$1,');
                                    return title + '<br/>' + params.name + ' : ' + value;
                                }
                            },
                            /**/
                            visualMap: {
                                left: 'left',
                                min: valmin,
                                max: valmax,
                                color: ['#f44336', '#ffeb3b', '#009688'],
                                text:['Max','Min'],
                                calculable : true
                            },

                            toolbox: {
                                show : true,
                                x: 'right',
                                padding: ['20','0','0','0'],
                                feature : {
                                    mark : {show: true},
                                    restore : {show: true, title: 'Reload'},
                                    saveAsImage : {show: true, title: 'Save'}
                                }
                            },
                            series : [
                                {
                                    name: 'chart',
                                    type: 'map',
                                    roam: true,
                                    map: 'Indonesia',
                                    itemStyle:{
                                        emphasis:{label:{show:true}}
                                    },
                                    data: map.content
                                }
                            ]
                        };

                        myMap.on('click', function (param) {
                            var idProv = param.data.id;
                            location.href = baseUrl+'/level-2/'+idProv;
                        });

                        //myMap.setOption(option);
                        myMap.setOption(option,true);
                    });

                }
            }
        });
    }
}(window.jQuery, window, document, $reportName, $baseUrl, $reportType));