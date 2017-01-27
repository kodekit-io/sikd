(function ($, window, document, $reportName, $mapBaseUrl, $reportType) {
    $(function () {
        var $url = $baseUrl + '/get-map-chart/' + $reportType;
        L1Map($reportName, $url);
    });

    function L1Map(title, type) {
        $("#titleMap").html(title);
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
                                    return params.seriesName + '<br/>' + params.name + ' : ' + value;
                                }
                            },
                            /**/
                            visualMap: {
                                left: 'left',
                                min: valmin,
                                max: valmax,
                                color: ['#e91e63', '#ec407a', '#f06292', '#f48fb1', '#f8bbd0', '#fce4ec'],
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
                            console.log(param.data.id);
                            var idProv = param.data.id;
                            // nameProv = param.name;
                            // switch (nameProv) {
                            //     case "Prov. Aceh": idProv = "01";
                            //         break;
                            //     case "Prov. Sumut": idProv = "02";
                            //         break;
                            //     case "Prov. Sumatera Barat": idProv = "03";
                            //         break;
                            //     case "Prov. Riau": idProv = "04";
                            //         break;
                            //     case "Prov. Jambi": idProv = "05";
                            //         break;
                            //     case "Prov. Sumsel": idProv = "06";
                            //         break;
                            //     case "Prov. Bengkulu": idProv = "07";
                            //         break;
                            //     case "Prov. Lampung": idProv = "08";
                            //         break;
                            //     case "Prov. DKI Jakarta": idProv = "09";
                            //         break;
                            //     case "Prov. Jabar": idProv = "10";
                            //         break;
                            //     case "Prov. Jateng": idProv = "11";
                            //         break;
                            //     case "Prov. DIY": idProv = "12";
                            //         break;
                            //     case "Prov. Jawa Timur": idProv = "13";
                            //         break;
                            //     case "Prov. Kalbar": idProv = "14";
                            //         break;
                            //     case "Prov. Kalteng": idProv = "15";
                            //         break;
                            //     case "Prov. Kalsel": idProv = "16";
                            //         break;
                            //     case "Prov. Kaltim": idProv = "17";
                            //         break;
                            //     case "Prov. Sulut": idProv = "18";
                            //         break;
                            //     case "Prov. Sulteng": idProv = "19";
                            //         break;
                            //     case "Prov. Sulsel": idProv = "20";
                            //         break;
                            //     case "Prov. Sultra": idProv = "21";
                            //         break;
                            //     case "Prov. Bali": idProv = "22";
                            //         break;
                            //     case "Prov. NTB": idProv = "23";
                            //         break;
                            //     case "Prov. NTT": idProv = "24";
                            //         break;
                            //     case "Prov. Maluku": idProv = "25";
                            //         break;
                            //     case "Prov. Papua": idProv = "26";
                            //         break;
                            //     case "Prov. Malut": idProv = "27";
                            //         break;
                            //     case "Prov. Banten": idProv = "28";
                            //         break;
                            //     case "Prov. Babel": idProv = "29";
                            //         break;
                            //     case "Prov. Gorontalo": idProv = "30";
                            //         break;
                            //     case "Prov. Kepulauan Riau": idProv = "31";
                            //         break;
                            //     case "Prov. Papua Barat": idProv = "32";
                            //         break;
                            //     case "Prov. Sulawesi Barat": idProv = "33";
                            //         break;
                            //     case "Prov. Kalimantan Utara": idProv = "34";
                            //         break;
                            // }
                            //alert(idProv);
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