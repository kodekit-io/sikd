$(function() {
    L1Map('Realisasi Total Penyaluran PAD Nasional','PAD','data/map-apbd-pad.json','./level-2?idprovinsi');

    function L1Map(title,titleShort,type,linkTo) {
        $("#titleMap").html(title);
        $.ajax({
            url : type,
            success : function(result) {
                //result = jQuery.parseJSON(result);
                data = result.map;

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
                    //console.log(_array);

                    var map = {
                        content: $content
                    };


                    var myMap = echarts.init(document.getElementById('map'));
                    myMap.showLoading();
                    $.get('assets/js/pages/indonesia.json', function (idJson) {
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
                                color: ['#e74c3c', '#e67e22', '#f1c40f', '#27ae60', '#85C1E9'],
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
                                    name: titleShort,
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
                        //myMap.setOption(option);
                        myMap.setOption(option,true);
                        myMap.on('click', function (params) {
                            //alert(params.name);
                            location.href = linkTo;
                        });
                    });

                }
            }
        });
    }
});
