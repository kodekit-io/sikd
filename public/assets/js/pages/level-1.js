$(function() {
    var data = [
        {name : "Aceh",  value : 4822023},
        {name : "Bali",  value : 4822023},
        {name : "Banten",  value : 4822023},
        {name : "Bengkulu",  value : 4822023},
        {name : "DIY",  value : 4822023},
        {name : "DKI Jakarta",  value : 4822023},
        {name : "Gorontalo",  value : 4822023},
        {name : "Jambi",  value : 4822023},
        {name : "Jabar",  value : 4822023},
        {name : "Jateng",  value : 4822023},
        {name : "Jatim",  value : 4822023},
        {name : "Kalbar",  value : 4822023},
        {name : "Kalsel",  value : 4822023},
        {name : "Kalteng",  value : 4822023},
        {name : "Kaltim",  value : 4822023},
        {name : "Kaltara",  value : 4822023},
        {name : "Babel",  value : 4822023},
        {name : "Kepri",  value : 4822023},
        {name : "Lampung",  value : 4822023},
        {name : "Maluku",  value : 4822023},
        {name : "Malut",  value : 4822023},
        {name : "NTB",  value : 4822023},
        {name : "NTT",  value : 4822023},
        {name : "Papua",  value : 4822023},
        {name : "Pabar",  value : 4822023},
        {name : "Riau",  value : 4822023},
        {name : "Sulbar",  value : 4822023},
        {name : "Sulsel",  value : 4822023},
        {name : "Sulteng",  value : 4822023},
        {name : "Sultra",  value : 4822023},
        {name : "Sulut",  value : 4822023},
        {name : "Sumbar",  value : 4822023},
        {name : "Sumsel",  value : 4822023},
        {name : "Sumut", value : 4822023},
    ];

    var myMap = echarts.init(document.getElementById('map'));

    // Specify configurations and data graphs
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
            /*
            visualMap: {
                left: 'right',
                min: 500000,
                max: 38000000,
                //color: ['orangered','yellow','lightskyblue'],
                text:['High','Low'],
                calculable : true
            },
            */
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
                    name: 'TKDD',
                    type: 'map',
                    roam: true,
                    map: 'Indonesia',
                    itemStyle:{
                        emphasis:{label:{show:true}}
                    },
                    data:data
                }
            ]
        };
        //myMap.setOption(option);
        myMap.setOption(option,true);
        myMap.on('click', function (params) {
            //alert(params.name);
            location.href = './level-2';
        });

    });
});
