$(document).ready(function() {
	function abbr(number, decimal) {
		decimal = Math.pow(10,decimal);
		var abbrev = [ " K", " M", " B", " T" ];
		for (var i=abbrev.length-1; i>=0; i--) {
			var size = Math.pow(10,(i+1)*3);
			if(size <= number) {
				number = Math.round(number*decimal/size)/decimal;
				if((number == 1000) && (i < abbrev.length - 1)) {
					number = 1;
					i++;
				}
				number += abbrev[i];
				break;
			}
		}
		return number;
	}

	function L0Chart(divID,n,type,result) {
		var color;

        if(type==='apbd') {
            $result = result.apbd;
        } else if (type==='penyaluran') {
            $result = result.Penyaluran;
        }

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
				$target = abbr($target000,2);
                $realization000 = $achievement[0].realization;
				$realization = abbr($realization000,2);
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



            var tab = '<i class="material-icons">assignment</i><br><span class="sikd-lagging-tab__persen">'+$percentage+'%</span>';

            var linkdetail = './level-1';
            var tabcontent = '<div class="uk-grid uk-grid-collapse" data-uk-grid-match data-uk-grid-margin> \
							<div class="uk-width-medium-1-2"> \
								<h5 class="sikd-chart--title sikd-blue">'+$name+'</h5> \
							</div> \
							<div class="uk-width-medium-1-2"> \
								<div class="uk-progress slim uk-margin-bottom-remove sikd-yellow-bg"> \
									<div class="uk-progress-bar uk-animation-slide-left sikd-blue-bg '+color+'" style="width: '+$percentage+';">'+$percentage+'%</div> \
								</div> \
								<ul class="uk-subnav uk-margin-bottom-remove uk-margin-top-remove sikd-text-ptr"> \
									<li class="uk-margin-small-top"><strong>'+$percentage+'%</strong></li> \
									<li class="uk-margin-small-top">(Alokasi : <strong>'+$target+'</strong></li> \
									<li class="uk-margin-small-top">Realisasi : <strong>'+$realization+'</strong>)</li> \
								</ul> \
							</div> \
							<div class="uk-width-medium-1-1"> \
								<hr class="uk-margin-bottom-remove uk-margin-small-top"> \
								<div id="'+divID+'Chart" class="sikd-chart-lagging"></div> \
								<ul class="uk-subnav sikd-chart-action"> \
									<li><a class=""><i class="material-icons" data-uk-tooltip title="'+$info+'">info</i></a></li> \
									<li><a href="'+linkdetail+'" class="btn z-depth-0 sikd-pink-bg white-text" title="Lihat Detail '+$name+'" data-uk-tooltip>LIHAT DETAIL</a></li> \
								</ul> \
							</div> \
						</div>';
            $('#' + divID).html(tabcontent);

            $('#' + divID +'tab a').html(tab);
            $('#' + divID +'tab a').attr('title', ''+$name+'');

            $(".sikd-lagging-tab__title").html(function(i, html) {
                return html.replace(/ /g, '<br>');
            });

            var w = $('#L0A').width();
            $('.sikd-chart-lagging').width(w);
            $('.sikd-chart-lagging').height(w/2);

            //CHART
            var dom = document.getElementById(divID+'Chart');
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
                    data: chartData.legend,
                    padding: ['0','0','0','0'],
                    x: 'left',
                    y: 'bottom'
                },
                toolbox: {
                    show : true,
                    x: 'right',
                    padding: ['20','1','0','0'],
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
                        data : chartData.cat
                    }
                ],
                yAxis : [
                    {
                        type : 'value',
                        //splitArea : {show : true}
						axisLabel : {
							formatter: function(v) {
								$v = abbr(v,2);
								return $v;
							}
						}
                    }
                ],
                series : chartData.content
            };
            //chart.setOption(option);
            clearTimeout(loadingTicket);
            loadingTicket = setTimeout(function (){
                chart.hideLoading();
                chart.setOption(option);
            },1800);

            $(window).trigger("resize");
        }
	}


	var $tkddData = jQuery.parseJSON(tkddData);

	L0Chart('A1','0','penyaluran', $tkddData);
	L0Chart('A2','1','penyaluran', $tkddData);
	L0Chart('A3','2','penyaluran', $tkddData);
	L0Chart('A4','3','penyaluran', $tkddData);
	L0Chart('A5','4','penyaluran', $tkddData);
	L0Chart('A6','5','penyaluran', $tkddData);
	L0Chart('A7','6','penyaluran', $tkddData);

	// L0Chart('B1','0','apbd','data/L0_B_apbd.json');
	// L0Chart('B2','1','apbd','data/L0_B_apbd.json');
	// L0Chart('B3','2','apbd','data/L0_B_apbd.json');
	// L0Chart('B4','3','apbd','data/L0_B_apbd.json');
	// L0Chart('B5','4','apbd','data/L0_B_apbd.json');
	// L0Chart('B6','5','apbd','data/L0_B_apbd.json');
	// L0Chart('B7','6','apbd','data/L0_B_apbd.json');


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

		$(window).trigger("resize");



		/*$('#'+id).highcharts({
		chart: {
			type: type,
			height: 370,
			spacingBottom: 30
		},
		title: {
			text: null
		},
		subtitle: {
			text: null
		},
		xAxis: {
			categories: [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ],
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: null
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
				name: '2016',
				data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
			}, {
				name: '2015',
				data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
			}, {
				name: '2014',
				data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]
			}, {
				name: '2013',
				data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
			}]
		});*/
	};
	Row2('LOC1','bar');
	Row2('LOC2','line');
	Row2('LOC3','bar');
	Row2('LOC4','line');
	Row2('LOC5','scatter');
});