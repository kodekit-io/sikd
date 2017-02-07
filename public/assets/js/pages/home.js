$(document).ready(function() {
	function L0Chart(divID,n,type,result) {
		var color;

        if(type==='apbd') {
            $result = result.apbd;
        } else if (type==='tkdd') {
            $result = result.tkdd;
        }

        if ($result[n] !== undefined) {
            if ($result.length === 0) {
                $('#' + divID).html("<div class='center'>No data chart</div>");
            } else {
                var $content = [];
                var $legend = [];
                $data = $result[n].trend;
                $id = $result[n].id;
                $name = $result[n].name;
                $info = $result[n].info;
                $achievement = $result[n].achievement;

                for (i = 0; i < $data.length; i++) {
                    $target000 = $achievement[0].target;
                    $target = numeral($target000).format('0.00a');

                    $realization000 = $achievement[0].realization;
                    $realization = numeral($realization000).format('0.00a');

                    $percentage000 = $achievement[0].percentage;
                    $percentage = Math.round($percentage000 * 100) / 100

                    $type = 'line';
                    $year = $data[i].year.toString();
                    $value = $data[i].value;
                    $cat = $data[i].month;

                    $content[i] = {name: $year, type: $type, data: $value};
                    $legend[i] = $year;
                }

                var chartData = {
                    content: $content,
                    cat: $cat,
                    legend: $legend
                };

                var slug = function (str) {
                    var $slug = '';
                    var trimmed = $.trim(str);
                    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
                    return $slug.toLowerCase();
                }

                var tab = '<i class="material-icons">assignment</i><br><span class="sikd-lagging-tab__persen">' + $percentage + '%</span>';
                if (type == 'tkdd') {
                    var linkdetail = $baseUrl + '/level-1/' + $id;
                } else {
                    $reportTypes = jQuery.parseJSON(reportTypes);
                    $reportCode = $reportTypes[$id];
                    var linkdetail = $baseUrl + '/level-1/' + $reportCode;
                }
                var tabcontent = '<div class="uk-grid uk-grid-collapse" data-uk-grid-match data-uk-grid-margin> \
							<div class="uk-width-medium-1-2"> \
								<h5 class="sikd-chart--title sikd-blue">' + $name + '</h5> \
							</div> \
							<div class="uk-width-medium-1-2"> \
								<div class="uk-progress slim uk-margin-bottom-remove sikd-yellow-bg"> \
									<div class="uk-progress-bar uk-animation-slide-left sikd-blue-bg ' + color + '" style="width: ' + $percentage + '%;">' + $percentage + '%</div> \
								</div> \
								<ul class="uk-subnav uk-margin-bottom-remove uk-margin-top-remove sikd-text-ptr"> \
									<li class="uk-margin-small-top"><strong>' + $percentage + '%</strong></li> \
									<li class="uk-margin-small-top">(Alokasi : <strong>' + $target + '</strong></li> \
									<li class="uk-margin-small-top">Realisasi : <strong>' + $realization + '</strong>)</li> \
								</ul> \
							</div> \
							<div class="uk-width-medium-1-1"> \
								<hr class="uk-margin-bottom-remove uk-margin-small-top"> \
								<div id="' + divID + 'Chart" class="sikd-chart-lagging"></div> \
								<ul class="uk-subnav sikd-chart-action"> \
									<li><a class=""><i class="material-icons" data-uk-tooltip title="' + $info + '">info</i></a></li> \
									<li><a href="' + linkdetail + '" class="btn z-depth-0 sikd-pink-bg white-text" title="Lihat Detail ' + $name + '" data-uk-tooltip>LIHAT DETAIL</a></li> \
								</ul> \
							</div> \
						</div>';
                $('#' + divID).html(tabcontent);

                $('#' + divID + 'tab a').html(tab);
                $('#' + divID + 'tab a').attr('title', '' + $name + '');

                $(".sikd-lagging-tab__title").html(function (i, html) {
                    return html.replace(/ /g, '<br>');
                });

                var w = $('#L0A').width();
                $('.sikd-chart-lagging').width(w);
                $('.sikd-chart-lagging').height(w / 2);

                //CHART
                var dom = document.getElementById(divID + 'Chart');
                var theme = 'sikd';
                var chart = echarts.init(dom, theme);
                var loadingTicket;
                var effectIndex = -1;
                var effect = ['spin'];
                //var effectIndex = ++effectIndex % effect.length;
                chart.showLoading({
                    text: '',
                    //effect : effect[effectIndex],
                });
                var option = {
                    //color: clrs,
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        data: chartData.legend,
                        padding: ['0', '0', '0', '0'],
                        left: 'center',
                        bottom: 'bottom'
                    },
                    toolbox: {
                        show: true,
                        left: 'left',
						bottom: 'bottom',
                        padding: ['0', '0', '0', '0'],
                        feature: {
                            mark: {show: true},
                            //dataView : {show: false, readOnly: false},
                            magicType: {
                                show: true,
                                type: ['line', 'bar'],
                                title: {line: 'Line', bar: 'Bar'},
                            },
                            restore: {show: true, title: 'Reload'},
                            saveAsImage: {show: true, title: 'Save'}
                        }
                    },
					grid: {
						x: '30px',
						x2: '10px',
						y: '10px',
						y2: '50px'
					},
                    xAxis: [
                        {
                            type: 'category',
                            boundaryGap: false,
                            data: chartData.cat
                        }
                    ],
                    yAxis: [
                        {
                            type: 'value',
                            //splitArea : {show : true}
                            axisLabel: {
                                formatter: function (v) {
                                    //$v = abbr(v,2);
                                    $v = numeral(v).format('0a');
                                    return $v;
                                }
                            }
                        }
                    ],
                    series: chartData.content
                };
                //chart.setOption(option);
                clearTimeout(loadingTicket);
                loadingTicket = setTimeout(function () {
                    chart.hideLoading();
                    chart.setOption(option);
                }, 1800);
				$(window).on('resize', function(){
                    if(chart != null && chart != undefined){
                        chart.resize();
                    }
                });
            }
        }
	}


	var $tkddData = jQuery.parseJSON(tkddData);
	L0Chart('A1','0','tkdd', $tkddData);
	L0Chart('A2','1','tkdd', $tkddData);
	L0Chart('A3','2','tkdd', $tkddData);
	L0Chart('A4','3','tkdd', $tkddData);
	L0Chart('A5','4','tkdd', $tkddData);
	L0Chart('A6','5','tkdd', $tkddData);
	L0Chart('A7','6','tkdd', $tkddData);
    L0Chart('A8','7','tkdd', $tkddData);

    // var $apbdData = jQuery.parseJSON(apbdData);
    // L0Chart('B1','0','apbd', $apbdData);
    // L0Chart('B2','1','apbd', $apbdData);
    // L0Chart('B3','2','apbd', $apbdData);
    // L0Chart('B4','3','apbd', $apbdData);
    // L0Chart('B5','4','apbd', $apbdData);
    // L0Chart('B6','5','apbd', $apbdData);
    // L0Chart('B7','6','apbd', $apbdData);
    // L0Chart('B8','7','apbd', $apbdData);
    // L0Chart('B9','8','apbd', $apbdData);
    // L0Chart('B10','9','apbd', $apbdData);
    // L0Chart('B11','10','apbd', $apbdData);


	function Row2(divID,type) {

		var w = $('.sikd-leading').width();
		var h = $('.sikd-leading').height();
		$('#'+divID).width(w);
		$('#'+divID).height(h);

		//CHART
		var dom = document.getElementById(divID);
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
		var option = {
			//color: clrs,
			tooltip : {
				trigger: 'axis'
			},
			legend: {
				data: ['2013','2014','2015','2016'],
				padding: ['0','0','0','0'],
				x: 'left',
				y: 'bottom'
			},
			toolbox: {
				show : true,
				x: 'right',
				padding: ['20','0','0','0'],
				feature : {
					mark : {show: true},
					//dataView : {show: false, readOnly: false},
					magicType: {
						show : true,
						type : ['line', 'bar'],
						title : { line : 'Line', bar : 'Bar' },
					},
					restore : {show: true, title: 'Reload'},
					saveAsImage : {show: true, title: 'Save'}
				}
			},
			//calculable : true,
			xAxis : [
				{
					type : 'category',
					boundaryGap: false,
					data : [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ]
				}
			],
			yAxis : [
				{
					type : 'value',
					//splitArea : {show : true}
				}
			],
			series : [{
					name: '2016',
					type: type,
					data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
				}, {
					name: '2015',
					type: type,
					data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
				}, {
					name: '2014',
					type: type,
					data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]
				}, {
					name: '2013',
					type: type,
					data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
				}]
		};
		//chart.setOption(option);
		clearTimeout(loadingTicket);
		loadingTicket = setTimeout(function (){
			chart.hideLoading();
			chart.setOption(option);
		},1800);
		$(window).on('resize', function(){
            if(chart != null && chart != undefined){
                chart.resize();
            }
        });

	};
	//Row2('LOC1','bar');
	//Row2('LOC2','line');
	//Row2('LOC3','bar');
	//Row2('LOC4','line');
	//Row2('LOC5','scatter');
	chartL0Row2A('LOC1')

	function chartL0Row2A(id) {
	    $.ajax({
	        url: 'data/L0_row2_infrastruktur.json',
	        //dataType: 'jsonp',
	        success: function(result){
	            var data = result.data;
				var t = result.properties.Label;
				//console.log(t);

	            if (data.length === 0) {
	                $('#'+id).html("<div class='center'>No Data</div>");
	            } else {
	                var $series=[], $legend=[];
	                for (var i = 0; i < data.length; i++) {
	                    $name = data[i].name;
						$dataName = data[i].dataName;
						$dataValue = data[i].dataValue;
						$legend[i] = $name;
						//console.log($dataValue);
						$series[i] = {
							name: $name,
							type:'bar',
							stack: 'data',
							//barMaxWidth: 50,
							//itemStyle : { normal: {label : {show: true, position: 'center'}}},
							data: $dataValue
						}
	                }

	                var dataseries = {
						cat: $dataName,
	                    legend: $legend,
						series: $series
	                }


	                //CHART
	                var dom = document.getElementById(id);
	                var theme = 'sikd';
	                var theChart = echarts.init(dom,theme);
	                var loadingTicket;
	                var effectIndex = -1;
	                var effect = ['spin'];
	                //var effectIndex = ++effectIndex % effect.length;
	                theChart.showLoading({
	                    text : '',
	                    //effect : effect[effectIndex],
	                });

	                var option = {
						title: {
							text: t,
							left: 'center',
							top: 0
						},
	                    tooltip : {
	                        trigger: 'axis',
	                        axisPointer : {
	                            type : 'shadow'
	                        }
	                    },
	                    legend: {
	                        data: dataseries.legend,
	                        x: 'left',
	                        y: 'bottom',
	                    },
	                    grid: {
	                        x: '20px',
	                        x2: '20px',
	                        y: '25px',
	                        y2: '60px'
	                    },
	                    toolbox: {
	                        show: true,
	                        x: 'right',
	                        y: 'bottom',
	                        padding: ['0', '0', '0', '0'],
	                        feature: {
	                            mark: {show: true},
	                            //dataView : {show: false, readOnly: false},
	                            magicType: {
	                                show: true,
	                                type: ['stack', 'tiled'],
	                                title: {stack: 'Stack', tiled: 'Bar'},
	                            },
	                            restore: {show: true, title: 'Reload'},
	                            saveAsImage: {show: true, title: 'Save'}
	                        }
	                    },
	                    //calculable : true,
	                    xAxis : [
	                        {
	                            type : 'category',
	                            data : dataseries.cat,
	                            axisLabel: {
	                                textStyle: {
	                                    fontSize: 10
	                                }
	                            }
	                        }
	                    ],
	                    yAxis : [
	                        {
	                            type : 'value',
	                            axisLabel: {
	                                textStyle: {
	                                    fontSize: 10
	                                },
	                                formatter: function (v) {
	                                    $v = numeral(v).format('0a');
	                                    return $v;
	                                }
	                            },
	                        }
	                    ],
	                    series : dataseries.series
	                };

	                clearTimeout(loadingTicket);
	                loadingTicket = setTimeout(function (){
	                    theChart.hideLoading();
	                    theChart.setOption(option);
	                    theChart.resize();
	                },1800);
	                $(window).on('resize', function(){
	                    if(theChart != null && theChart != undefined){
	                        theChart.resize();
	                    }
	                });
	            }
	        }
	    });
	}
	tableRow3('topBottom','Realisasi-TKDD','data/L0_row3_tkdd.json');
	tableRow3('topBottom','DAK-Fisik','data/L0_row3_dak-fisik.json');
	tableRow3('topBottom','Dandes','data/L0_row3_dana-desa.json');
	tableRow3('topBottom','Belanja','data/L0_row3_belanja.json');
	tableRow3('topBottom','PAD','data/L0_row3_pad.json');
	function tableRow3(id,type,url) {
		jQuery.support.cors = true;
	    $.ajax({
	        type: "GET",
	        url: url,
	        //data: "{}",
	        contentType: "application/json; charset=utf-8",
	        dataType: "json",
	        cache: false,
	        success: function (param) {
				var result = param['top-bottom-'+type];
				var top = result.top;
				var topData = top.data;
				var topTitle = top.name;
				var topId = top.id;

				var bottom = result.bottom;
				var botData = bottom.data;
				var botTitle = bottom.name;
				var botId = bottom.id;

				var card = '<div> \
					<div class="uk-panel uk-panel-box z-depth-0"> \
						<h5 class="uk-text-center"> \
							<a href="#pop_'+type+'" data-uk-modal>'+topTitle+'<br>'+botTitle+'</a> \
						</h5> \
					</div> \
					<div id="pop_'+type+'" class="uk-modal"> \
						<div class="uk-modal-dialog uk-modal-dialog-large"> \
							<a class="uk-modal-close uk-close"></a> \
							<h3>'+topTitle+'</h3> \
							<table id="top_'+type+'" class="uk-table uk-table-striped"> \
								<thead><tr><th width="20%">Satker</th><th width="20%">Pemda</th><th width="20%" class="uk-text-right">Target</th><th width="20%" class="uk-text-right">Realization</th><th width="20%" class="uk-text-right">Percentage</th></tr></thead> \
							</table> \
							<h3>'+botTitle+'</h3> \
							<table id="bot_'+type+'" class="uk-table uk-table-striped"> \
								<thead><tr><th width="20%">Satker</th><th width="20%">Pemda</th><th width="20%" class="uk-text-right">Target</th><th width="20%" class="uk-text-right">Realization</th><th width="20%" class="uk-text-right">Percentage</th></tr></thead> \
							</table> \
						</div> \
					</div> \
				</div>';
				$('#'+id).append(card);

		        var trTop = '';
		        $.each(topData[0].kodeSatker, function (i, item) {
					trTop += "<tr><td>" + topData[0].kodeSatker[i] + "</td><td>" + topData[0].namaPemda[i] + "</td><td class=\"uk-text-right\">" + numeral(topData[0].target[i]).format('0,0') + "</td><td class=\"uk-text-right\">" + numeral(topData[0].realization[i]).format('0,0') + "</td><td class=\"uk-text-right\">" + numeral(topData[0].percentage[i]).format('0.00') + "%</td></tr>";
		        });
		        $('#top_'+type).append(trTop);

				var trBot = '';
				$.each(botData[0].kodeSatker, function (i, item) {
					trBot += "<tr><td>" + botData[0].kodeSatker[i] + "</td><td>" + botData[0].namaPemda[i] + "</td><td class=\"uk-text-right\">" + numeral(botData[0].target[i]).format('0,0') + "</td><td class=\"uk-text-right\">" + numeral(botData[0].realization[i]).format('0,0') + "</td><td class=\"uk-text-right\">" + numeral(botData[0].percentage[i]).format('0.00') + "%</td></tr>";
		        });
		        $('#bot_'+type).append(trBot);

	        },

	        error: function (msg) {
	            alert("error");
	        }
	    });

	}
});