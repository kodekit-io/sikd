(function ($, window, document, $satkerCode, $year) {
    //console.log('satkerCode:'+$satkerCode+' year:'+$year);

    $(function () {
		var url = $baseUrl + '/get-pemda-chart/' + $year + '/' + $satkerCode;

		panelMap('panel1',url);
		panelGauge('1','panel2',url);
	    panelGauge('2','panel3',url);
	    panelGauge('3','panel4',url);
	    panelGauge('4','panel5',url);
    });

	function panelMap(div,url) {
        var w = $('#'+div).width();
        $('#'+div).height(w);
		var x = 0;
	    $.ajax({
	        url : url,
	        beforeSend : function(xhr) {
				$('#'+div).append('<div class="preload"><div class="uk-position-center" uk-spinner></div></div>');
                x++;
	        },
	        complete : function(xhr, status) {
				x--;
                if (x <= 0) {
                    $('#'+div+' .preload').remove();
                }
	        },
	        success : function(result) {
	            result = jQuery.parseJSON(result);
	            data = result.detailKotakabTop[0].mapInfo;
	            detail = result.detailKotakabTop[0].detail;
                //console.log(data+' + '+detail);
	            if (data.id == undefined) {
					$('#'+div).append('<div class="uk-border-rounded" style="height:'+w+'px;background:rgba(200, 200, 200, 0.25);">Tidak ada data</div>');
				} else {
					var tr = [];
					for(var i = 1; i < detail.title.length; i++) {
						tr[i] = '<tr>'
							+ '<td>' + detail.title[i] + '</td>'
							+ '<td>' + detail.value[i] + '</td>'
						+ '</tr>';
					}

					var panelimg = '<div class="uk-cover-container uk-border-rounded green lighten-5" style="height:'+w+'px">'
					    + '<img class="uk-blend-multiply" src="'+data.image+'" alt="" uk-cover>'
					    + '<div class="uk-overlay uk-overlay-default uk-position-bottom uk-padding-small">'
							+ '<h5 class="uk-margin-small-bottom">'+detail.title[0]+' ('+detail.value[0]+')</h5>'
					        + '<table cellspacing="0" cellpadding="0" width="100%">'+tr.join('')+'</table>'
					    + '</div>'
					+ '</div>';
                    var panel = '<div class="uk-cover-container uk-border-rounded" style="height:'+w+'px;overflow:hidden;z-index:1;">'
					    + '<div id="map" class="uk-width-1-1 uk-height-1-1 uk-border-rounded"></div>'
					    + '<div class="uk-overlay uk-position-center uk-padding-small uk-width-1-1 uk-height-1-1">'
							+ '<h5 class="uk-text-center">'+detail.title[0]+' ('+detail.value[0]+')</h5>'
					        + '<table class="sikd-table-map uk-border-rounded" cellspacing="0" cellpadding="0" width="100%">'+tr.join('')+'</table>'
					    + '</div>'
					+ '</div>';
					$('#'+div).append(panel);
                    getMap('map',$satkerCode);
	            }
	        },
            error: function (request, status, error) {
                $('#'+div).append('<div class="uk-position-center">FOUT!</div>');
            }
	    });
	}
    function getMap(div,satkerCode) {
        var dom = document.getElementById(div);
        var theme = 'default';
        var theMap = echarts.init(dom,theme);
        var loadingTicket;
        var effectIndex = -1;
        var effect = ['spin'];

        theMap.showLoading({
            text : '',
        });

        $.get($baseUrl + '/assets/js/geojson/kabkot.json', function (result) {

            var data = result.features;
            if (data.length > 0){
                var prop = [];
                for(var i = 0; i < data.length; i++) {

                    prop = data[i].properties.satker;

                    if(prop==$satkerCode) {
                        var coortot = data[i].geometry.coordinates[0].length;
                        var lat=[], lang=[], latsum=0, latmean='', langsum=0, langmean='';
                        for(var x = 0; x < coortot; x++) {
                            lat[x] = data[i].geometry.coordinates[0][x][1];
                            lang[x] = data[i].geometry.coordinates[0][x][0];
                            latsum += data[i].geometry.coordinates[0][x][1];
                            latmean = latsum/coortot;
                            langsum += data[i].geometry.coordinates[0][x][0];
                            langmean = langsum/coortot;
                            //console.log(lang+' | '+lat);
                        }

                        echarts.registerMap('Indonesia', result, {});
                        var option = {
                            backgroundColor: 'rgba(200, 200, 200, 0.25)',
                            title : {
                                show: false
                            },
                            tooltip : {
                                show: false
                            },
                            grid: {
                                x: '0',
                                x2: '0',
                                y: '0',
                                y2: '0'
                            },
                            toolbox: {
                            },
                            series : [
                                {
                                    name: 'chart',
                                    type: 'map',
                                    z: 0,
                                    roam: false,
                                    map: 'Indonesia'
                                }
                            ]
                        };

                        clearTimeout(loadingTicket);
                        loadingTicket = setTimeout(function () {
                            theMap.hideLoading();
                            theMap.setOption(option,true);
                            theMap.resize();
                        }, 1000);

                        var locations = [{
                            name: data[i].properties.name,
                            coord: [langmean,latmean]
                        }];
                        var currentLoc = 0;
                        setInterval(function () {
                            theMap.setOption({
                                series: [{
                                    center: locations[currentLoc].coord,
                                    zoom: 15,
                                    // layoutSize: 100,
                                    // aspectScale: 1,
                                    data:[
                                        {name: locations[currentLoc].name, selected: true}
                                    ],
                                    animationDurationUpdate: 1000,
                                    animationEasingUpdate: 'cubicInOut'
                                }]
                            });
                            currentLoc = (currentLoc + 1) % locations.length;
                        }, 2000);

                        $(window).on('resize', function(){
                            if(theMap != null && theMap != undefined){
                                theMap.resize();
                            }
                        });
                    } else {
                        //alert('no');
                    }
                }
            }

        });


    }
	function panelGauge(id,div,url) {
		numeral.locale('id');
		var x = 0;
	    $.ajax({
	        url : url,
	        beforeSend : function(xhr) {
				$('#'+div).append('<div class="preload"><div class="uk-position-center" uk-spinner></div></div>');
                x++;
	        },
	        complete : function(xhr, status) {
				x--;
                if (x <= 0) {
                    $('#'+div+' .preload').remove();
                }
	        },
	        success : function(result) {
	            result = jQuery.parseJSON(result);
	            data = result.detailKotakabTop[id];
	            //console.log(data);
	            if (data.length === 0) {
					$('#'+div).append('<div>Geen data</div>');
				} else {
                    $id = data.id;
                    $name = data.name;
                    $target = data.target;
                    $realisasi = (data.realization != undefined) ? data.realization : 0;
                    $value = (data.percentage != undefined) ? data.percentage : (data.value != undefined) ? data.value : 0;
					//$value = numeral($value000).format('0.0');
					//$target = numeral($target000).format('0.00a');
					//$realisasi = numeral($realisasi000).format('0.00a');

                    var chartData = {
                        i : $id,
						n : $name,
						t : $target,
						r : $realisasi,
                        v : $value,
						p : $realisasi/$target * 100,
					};
                    //console.log(chartData);
                    //var value = chartData.p;
                    //value = Math.round(value * 1) / 1;
                    //console.log(value);
					var paneltitle = '<h5 class="sikd-title-gauge">'+chartData.n+'</h5>';
					var panelgauge = '<div id="'+div+'gauge" class="sikd-gauge uk-border-rounded"></div>';
					$('#'+div).append( paneltitle + panelgauge);

                    //CHART
					var dom = document.getElementById(div+'gauge');
					var theme = 'default';
					var chart = echarts.init(dom,theme);
			        var loadingTicket;
			        var effectIndex = -1;
			        var effect = ['spin'];
					chart.showLoading({
						text : '',
					});

                    //var optionTooltip = "";
                    if (id==3) {
                        optionTooltip = chartData.n+' ('+ numeral(chartData.v).format('0.0') +'%)<br>'
							+ 'Target: '+chartData.t+' Bulan<br>'
							+ 'Realisasi: '+chartData.r+' Bulan';
                        optionSplitNumber = '12';
                        optionColor = [
                            [0.0833, 'rgba(0, 150, 136, 0.0833)'],
                            [0.1666, 'rgba(0, 150, 136, 0.1666)'],
                            [0.2500, 'rgba(0, 150, 136, 0.2500)'],
                            [0.3333, 'rgba(0, 150, 136, 0.3333)'],
                            [0.4166, 'rgba(0, 150, 136, 0.4166)'],
                            [0.5000, 'rgba(0, 150, 136, 0.5000)'],
                            [0.5833, 'rgba(0, 150, 136, 0.5833)'],
                            [0.6666, 'rgba(0, 150, 136, 0.6666)'],
                            [0.7500, 'rgba(0, 150, 136, 0.7500)'],
                            [0.8333, 'rgba(0, 150, 136, 0.8333)'],
                            [0.9166, 'rgba(0, 150, 136, 0.9166)'],
                            [1, 'rgba(0, 150, 136, 1)']
                        ];
                        optionDetail = chartData.r+'/'+chartData.t;
						optionValue = chartData.p;
                    } else if (id==4) {
                        optionTooltip = chartData.n+'<br>'+ chartData.v +'';
                        optionSplitNumber = '12';
                        optionColor = [
                            //[0.0833, 'rgba(233, 30, 99, 0.0833)'],
                            [0.1666, 'rgba(233, 30, 99, 0.1666)'],
                            //[0.2500, 'rgba(233, 30, 99, 0.2500)'],
                            [0.3333, 'rgba(233, 30, 99, 0.3333)'],
                            //[0.4166, 'rgba(233, 30, 99, 0.4166)'],
                            [0.5000, 'rgba(233, 30, 99, 0.5000)'],
                            //[0.5833, 'rgba(233, 30, 99, 0.5833)'],
                            [0.6666, 'rgba(233, 30, 99, 0.6666)'],
                            //[0.7500, 'rgba(233, 30, 99, 0.7500)'],
                            [0.8333, 'rgba(233, 30, 99, 0.8333)'],
                            //[0.9166, 'rgba(233, 30, 99, 0.9166)'],
                            [1, 'rgba(233, 30, 99, 1)']
                        ];
                        optionDetail = chartData.v;
						v = 0;
						switch (optionDetail) {
							case 'DD-':
								v = 1;
								break;
							case 'DD':
								v = 2;
								break;
							case 'DD+':
								v = 3;
								break;
							case 'CC-':
								v = 4;
								break;
							case 'CC':
								v = 5;
								break;
							case 'CC+':
								v = 6;
								break;
							case 'BB-':
								v = 7;
								break;
							case 'BB':
								v = 8;
								break;
							case 'BB+':
								v = 9;
								break;
							case 'AA-':
								v = 10;
								break;
							case 'AA':
								v = 11;
								break;
							case 'AA+':
								v = 12;
								break;
						}
						optionValue = v/12 * 100;
                    } else {
                        optionTooltip = chartData.n+' ('+ numeral(chartData.v).format('0.0') +'%)<br>'
							+ 'Alokasi: '+ numeral(chartData.t).format('0.00a') +'<br>'
							+ 'Realisasi: '+ numeral(chartData.r).format('0.00a') +'';
                        optionSplitNumber = '10';
                        optionColor = [[1, '#00bcd4']];
                        optionDetail = numeral(chartData.v).format('0.0') +'%';
						optionValue = chartData.p;
                    }

                    var option = {
						backgroundColor: 'rgba(200, 200, 200, 0.25)',
        			    tooltip : {
        			        formatter: optionTooltip
        			    },
                        toolbox: {
			                show : true,
							right: 10,
							bottom: 10,
							padding: ['0','0','0','0'],
			                feature : {
			                    mark : {show: true},
			                    restore : {show: false, title: 'Reload'},
			                    saveAsImage : {show: true, title: 'Save'}
			                }
			            },
						grid: {
							x: '0',
							x2: '0',
							y: '0',
							y2: '0'
						},
        			    series : [
        			        {
                                name: $name,
                                type: 'gauge',
                                center : ['50%', '60%'],
                                //radius : ['0', '100%'],
                                //startAngle: 0,
                                //endAngle : 360,
                                min: 0,
                                max: '100',
                                precision: 0,
                                splitNumber: optionSplitNumber,

                                axisLine: {
                                    show: true,
                                    lineStyle: {
                                        color: optionColor,
                                        width: 25
                                    }
                                },

                                axisTick: {
                                    show: false
                                },

                                axisLabel: {
                                    show: false
                                },

                                splitLine: {
                                    show: false
                                },

        			            pointer : {
        			                length : '50%',
        			                width : 5,
        			                color : 'auto'
        			            },

        			            title : {
        			                show : false
        			            },

                                detail : {
                                    show : true,
                                    backgroundColor: 'rgba(0,0,0,0)',
                                    borderWidth: 0,
                                    borderColor: '#ccc',
                                    //width: 100,
                                    //height: 40,
                                    offsetCenter: [0, '75%'],
									formatter: optionDetail,
                                    textStyle: {
										color: 'auto',
                                        fontSize : 24
                                    }
                                },
        			            data:[{value: optionValue, name: chartData.n}]
        			        }
        			    ]
        			};

                    clearTimeout(loadingTicket);
					loadingTicket = setTimeout(function (){
						$(window).trigger('resize');
					    chart.hideLoading();
					    chart.setOption(option);
						chart.resize();
					},1000);
					$(window).on('resize', function(){
	                    if(chart != null && chart != undefined){
	                        chart.resize();
	                    }
	                });
	            }
	        },
            error: function (request, status, error) {
                $('#'+div).append('<div class="uk-position-center">FOUT!</div>');
            }
	    });
    }

}(window.jQuery, window, document, $satkerCode, $year));