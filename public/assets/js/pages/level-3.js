$(document).ready(function() {
    var url = "data/L3_A_detail-kotakab-top.json";

	function panelMap(id) {
	    $.ajax({
	        url : url,
	        beforeSend : function(xhr) {
	            $('#'+id).hide();
	        },
	        complete : function(xhr, status) {
	            $('#'+id).show();
	        },
	        success : function(result) {
	            data = result.detailKotakabTop[0].mapInfo;
	            //console.log(data);
	            if (data.length === 0) {
					$('#'+id).html("<div class='center'>No data</div>");
				} else {
					for (i = 0; i < data.length; i++) {
	                    $mapId = data[i].id;
						$mapName = data[i].name;
						$mapImg = data[i].image;
						$mapDetail = data[i].detail;
						$mapTitle = $mapDetail[0].title;
						$mapValue = $mapDetail[0].value;
						//console.log($mapValue[0]);
					}

					var panelmap = '<div class="card-panel z-depth-3 soft hoverable bgmap uk-margin-remove" style="background-image:url('+$mapImg+')"> \
						<div class="note"> \
							<h5 class="uk-margin-remove">'+$mapTitle[0]+' ('+$mapValue[0]+')</h5> \
							<ul class="uk-grid uk-grid-collapse uk-grid-width-1-2"> \
								<li>'+$mapTitle[1]+'</li><li>'+$mapValue[1]+'</li> \
								<li>'+$mapTitle[2]+'</li><li>'+$mapValue[2]+'</li> \
								<li>'+$mapTitle[3]+'</li><li>'+$mapValue[3]+'</li> \
								<li>'+$mapTitle[4]+'</li><li>'+$mapValue[4]+'</li> \
							</ul> \
						</div> \
					</div>';
					$('#'+id).html(panelmap);
	            }
	        }
	    });
	}
	function panelGauge(id,divID) {
        //id = jenis data
        //divID = id container

        $.ajax({
	        url : url,
	        beforeSend : function(xhr) {
	            $('#'+divID).hide();
	        },
	        complete : function(xhr, status) {
	            $('#'+divID).show();
	        },
	        success : function(result) {
	            data = result.detailKotakabTop;
	            //console.log(data);
	            if (data.length === 0) {
					$('#'+divID).html("<div class='center'>No data</div>");
				} else {
                    var content = [];
					for (i = 0; i < data.length; i++) {
	                    $id = data[id].id;
						$name = data[id].name;
						$target = data[id].target;
						$realisasi = data[id].realisasi;
						$value = data[id].value;

					}
                    var chartData = {
                        i : $id,
						n : $name,
						t : $target,
						r : $realisasi,
                        v : $value,
						p : $realisasi/$target * 100,
					};
                    var value = chartData.p;
                    value = Math.round(value * 1) / 1;
                    //console.log(value);

					var panelgauge = '<div class="card-panel z-depth-3 soft hoverable uk-margin-remove"> \
        				<div id="'+divID+'gauge" class="skid-gauge"></div> \
        			</div>';
					$('#'+divID).html(panelgauge);

                    var w = $('.uk-width-1-5').width();
					$('.skid-gauge').width(w-40);

                    //CHART
					var dom = document.getElementById(divID+'gauge');
					var theme = 'sikd';
					var chart = echarts.init(dom,theme);
			        var loadingTicket;
			        var effectIndex = -1;
			        var effect = ['spin'];
					//var effectIndex = ++effectIndex % effect.length;
					chart.showLoading({
						text : '',
						//effect : effect[effectIndex],
					});

                    var optionTooltip = "";
                    if (id==3) {
                        optionTooltip = chartData.n+'('+chartData.v+')<br>Realisasi: '+chartData.r+' Bulan<br>Target: '+chartData.t+' Bulan';
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
                        optionDetail = chartData.r+'/'+chartData.t
                    } else if (id==4) {
                        optionTooltip = chartData.n+'<br>'+chartData.v;
                        optionSplitNumber = '12';
                        optionColor = [
                            [0.0833, 'rgba(233, 30, 99, 0.0833)'],
                            [0.1666, 'rgba(233, 30, 99, 0.1666)'],
                            [0.2500, 'rgba(233, 30, 99, 0.2500)'],
                            [0.3333, 'rgba(233, 30, 99, 0.3333)'],
                            [0.4166, 'rgba(233, 30, 99, 0.4166)'],
                            [0.5000, 'rgba(233, 30, 99, 0.5000)'],
                            [0.5833, 'rgba(233, 30, 99, 0.5833)'],
                            [0.6666, 'rgba(233, 30, 99, 0.6666)'],
                            [0.7500, 'rgba(233, 30, 99, 0.7500)'],
                            [0.8333, 'rgba(233, 30, 99, 0.8333)'],
                            [0.9166, 'rgba(233, 30, 99, 0.9166)'],
                            [1, 'rgba(233, 30, 99, 1)']
                        ];
                        optionDetail = chartData.v;
                    } else {
                        optionTooltip = chartData.n+'('+chartData.v+')<br>Realisasi: '+chartData.r+'<br>Target: '+chartData.t;
                        optionSplitNumber = '10';
                        optionColor = [[1, '#00bcd4']];
                        optionDetail = chartData.v;
                    }

                    var option = {
        			    tooltip : {
        			        formatter: optionTooltip
        			    },
                        toolbox: {
			                show : true,
							x: 'right',
							padding: ['30','0','0','5'],
			                feature : {
			                    mark : {show: true},
			                    restore : {show: true, title: 'Reload'},
			                    saveAsImage : {show: true, title: 'Save'}
			                }
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
                                    show: false,
                                    /*
                                    splitNumber: 5,
                                    length :10,
                                    lineStyle: {
                                        color: '#fff',
                                        width: 1,
                                        type: 'solid'
                                    }
                                    */
                                },

                                axisLabel: {
                                    show: false,
                                    /*
                                    formatter: function(v){
                                        switch (v+''){
                                            case '10': return '10';
                                            case '30': return '30';
                                            case '60': return '60';
                                            case '90': return '90';
                                            default: return '';
                                        }
                                    },
                                    textStyle: {
                                        color: '#000'
                                    }
                                    */
                                },

                                splitLine: {
                                    show: false,
                                    length :25,
                                    lineStyle: {
                                        color: '#fff',
                                        width: 1,
                                        type: 'solid'
                                    }
                                },

        			            pointer : {
        			                length : '50%',
        			                width : 5,
        			                color : 'auto'
        			            },

        			            title : {
        			                show : true,
        			                offsetCenter: [0, '-160%'],
        			                textStyle: {
        			                    color: '#000',
        			                    fontSize : 16
        			                }
        			            },

                                detail : {
                                    show : true,
                                    backgroundColor: 'rgba(0,0,0,0)',
                                    borderWidth: 0,
                                    borderColor: '#ccc',
                                    //width: 100,
                                    //height: 40,
                                    offsetCenter: [0, '75%'],       // x, y，单位px
                                    formatter: optionDetail,
                                    textStyle: {       // 其余属性默认使用全局文本样式，详见TEXTSTYLE
                                        color: 'auto',
                                        fontSize : 24
                                    }
                                },

        			            data:[{value: value, name: chartData.n}]
        			        }
        			    ]
        			};

                    clearTimeout(loadingTicket);
					loadingTicket = setTimeout(function (){
					    chart.hideLoading();
					    chart.setOption(option);
					},1800);

					$(window).trigger("resize");
	            }
	        }
	    });
    }

	panelMap('panel1');
	panelGauge('1','panel2');
    panelGauge('2','panel3');
    panelGauge('3','panel4');
    panelGauge('4','panel5');
});