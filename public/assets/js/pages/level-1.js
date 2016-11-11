$(function() {

    var data = [{
        "hc-key": "id-3700",
        "value": 0
    }, {
        "hc-key": "id-ac",
        "value": 3868
    }, {
        "hc-key": "id-ki",
        "value": 6987
    }, {
        "hc-key": "id-jt",
        "value": 6355
    }, {
        "hc-key": "id-be",
        "value": 5135
    }, {
        "hc-key": "id-bt",
        "value": 6500
    }, {
        "hc-key": "id-kb",
        "value": 5677
    }, {
        "hc-key": "id-bb",
        "value": 6242
    }, {
        "hc-key": "id-ba",
        "value": 8829
    }, {
        "hc-key": "id-ji",
        "value": 6626
    }, {
        "hc-key": "id-ks",
        "value": 9106
    }, {
        "hc-key": "id-nt",
        "value": 7072
    }, {
        "hc-key": "id-se",
        "value": 5910
    }, {
        "hc-key": "id-kr",
        "value": 8830
    }, {
        "hc-key": "id-ib",
        "value": 6749
    }, {
        "hc-key": "id-su",
        "value": 8902
    }, {
        "hc-key": "id-ri",
        "value": 7271
    }, {
        "hc-key": "id-sw",
        "value": 7204
    }, {
        "hc-key": "id-la",
        "value": 4824
    }, {
        "hc-key": "id-sb",
        "value": 6873
    }, {
        "hc-key": "id-ma",
        "value": 9146
    }, {
        "hc-key": "id-nb",
        "value": 8969
    }, {
        "hc-key": "id-sg",
        "value": 6851
    }, {
        "hc-key": "id-st",
        "value": 9680
    }, {
        "hc-key": "id-pa",
        "value": 5422
    }, {
        "hc-key": "id-jr",
        "value": 8781
    }, {
        "hc-key": "id-1024",
        "value": 6433
    }, {
        "hc-key": "id-jk",
        "value": 8646
    }, {
        "hc-key": "id-go",
        "value": 7742
    }, {
        "hc-key": "id-yo",
        "value": 4103
    }, {
        "hc-key": "id-kt",
        "value": 9264
    }, {
        "hc-key": "id-sl",
        "value": 4734
    }, {
        "hc-key": "id-sr",
        "value": 32
    }, {
        "hc-key": "id-ja",
        "value": 33
    }];

    // Initiate the chart
    $('#map').highcharts('Map', {

        title: {
            text: null
        },

        subtitle: {
            text: null
        },

        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },
        colorAxis: {
            min: 0
        },
		plotOptions:{
        	series:{
            	point:{
                	events:{
                    	click: function(){
                        	//alert(this.name);
							location.href = './level-2';
                        }
                    }
                }
            }
        },
		tooltip: {
			borderWidth: 0,
			backgroundColor: 'rgba(0,0,0,0.5)',
			shadow: false,
			style: {
				color: '#ffffff'
			}
		},
        series: [{
            data: data,
			name: 'Realisasi TKDD',
            mapData: Highcharts.maps['countries/id/id-all'],
            joinBy: 'hc-key',
            states: {
                hover: {
                    color: '#BADA55'
                }
            },
            dataLabels: {
                enabled: true,
                format: '{point.name}',
				style: {
                    textShadow: false,
					fontFamily: '"Montserrat", sans-serif;',
					fontWeight: 'normal',
					color: '#111',
                }
            }
        }]
    });
});
