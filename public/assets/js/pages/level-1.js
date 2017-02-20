(function ($, window, document, $reportName, $baseUrl, $reportType, $postureId, $year) {
    //console.log($postureId);

    $(function () {
        var $url = $baseUrl + '/get-map-chart/' + $reportType + '/' + $year + '/'  + $postureId;
        l1Map($reportName,$url);
    });

    function l1Map(title,type) {
        numeral.locale('id');
        $("#title").html(title);
        var x = 0;
        $.ajax({
            url : type,
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
                    //var valmax = numeral(valmax000).format('0.00a');
                    //var valmin = numeral(valmin000).format('0.00a');

                    var map = {
                        content: $content
                    };


                    var dom = document.getElementById('map');
                    var theme = 'default';
                    var theMap = echarts.init(dom,theme);
                    var loadingTicket;
                    var effectIndex = -1;
                    var effect = ['spin'];

                    theMap.showLoading({
                        text : '',
                    });

                    $.get($baseUrl + '/assets/js/pages/indonesiaMap.json', function (idJson) {
                        //theMap.hideLoading();
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
                                    return title + '<br/>' + params.name + ' '+ numeral(params.value).format('0.00a');
                                },
                                textStyle: {
                                    fontSize: 12,
                                }
                            },
                            visualMap: {
                                type: 'piecewise',
                                orient: 'horizontal',
                                textGap: 5,
                                itemGap: 5,
                                left: 'left',
                                top: 'top',
                                //padding: ['0','0','0','0'],
                                min: valmin,
                                max: valmax,
                                color: ['#2196F3','#009688','#ffeb3b','#f44336'],
                                text: ['Tinggi','Rendah'],
                                calculable : true,
                                textStyle: {
                                    fontSize: 12
                                }
                            },
                            grid: {
                                x: '0',
                                x2: '0',
                                y: '0',
                                y2: '0'
                            },
                            toolbox: {
                                show : true,
                                left: 'right',
                                top: 'bottom',
                                //padding: ['0','0','0','0'],
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

                        theMap.on('click', function (param) {
                            var idProv = param.data.id;
                            location.href = baseUrl + '/level-2/' + $reportType + '/' + $postureId + '/' + $year +  '/' + idProv;
                        });
                        //theMap.setOption(option);
                        //theMap.setOption(option,true);

                        clearTimeout(loadingTicket);
                        loadingTicket = setTimeout(function () {
                            //$('.uk-switcher').on('show.uk.switcher', function(){
                            //    $(window).trigger('resize');
                            //});
                            theMap.hideLoading();
                            theMap.setOption(option,true);
                            theMap.resize();
                        }, 1000);

                        $(window).on('resize', function(){
                            if(theMap != null && theMap != undefined){
                                theMap.resize();
                            }
                        });
                    });

                }
            },
            error: function (request, status, error) {
                $('main').append('<div class="uk-position-center">FOUT!</div>');
            }
        });
    }
}(window.jQuery, window, document, $reportName, $baseUrl, $reportType, $postureId, $year));