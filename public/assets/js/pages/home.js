$(document).ready(function() {
	function L0Chart(divID,n,type,url) {
		var clrs;
		var color;
		/*switch (type) {
			case "apbd":
				clrs = ['#ff8f00', '#ffe0b2'];
				color = "orange";
				break;
			case "penyaluran":
				clrs = ["#3f51b5", "#7986cb"];
				color = "indigo";
				break;
		}*/

		//console.log(clrs);
		$.ajax({
			url : url,
			beforeSend : function(xhr) {
				$('#' + divID).hide();
			},
			complete : function(xhr, status) {
				$('#' + divID).show();
			},
			success : function(result) {
				if(type==='apbd') {
					$result = result.apbd;
					$data = result.apbd[n].trend;
				} else if (type==='penyaluran') {
					$result = result.penyaluran;
					$data = result.penyaluran[n].trend;
				}

				//console.log($data);
				if ($data.length === 0) {
					$('#' + divID).html("<div class='center'>No data chart</div>");
				} else {
					var $content = [];
					var $legend = [];
					for (i = 0; i < $data.length; i++) {
						$id = $result[n].id;
						$name = $result[n].name;
						$achievement = $result[n].achievement;
						$target = $achievement[0].target;
						$realization = $achievement[0].realization;
						$percentage = $achievement[0].percentage;

						$type = 'line';
						$year = $data[i].year;
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


					var tab = '<i class="material-icons">assignment</i><br><span class="sikd-lagging-tab__persen">'+$percentage+'</span>';

					var linkdetail = './level-1';
					var tabcontent = '<div class="uk-grid uk-grid-collapse" data-uk-grid-match data-uk-grid-margin> \
							<div class="uk-width-medium-1-2"> \
								<h5 class="sikd-chart--title sikd-blue">'+$name+'</h5> \
							</div> \
							<div class="uk-width-medium-1-2"> \
								<div class="uk-progress slim uk-margin-bottom-remove sikd-yellow-bg"> \
									<div class="uk-progress-bar uk-animation-slide-left sikd-blue-bg '+color+'" style="width: '+$percentage+';">'+$percentage+'</div> \
								</div> \
								<ul class="uk-subnav uk-margin-bottom-remove uk-margin-top-remove"> \
									<li class="uk-margin-small-top"><strong>'+$percentage+'</strong></li> \
									<li class="uk-margin-small-top">( Alokasi : <strong>'+$target+'</strong></li> \
									<li class="uk-margin-small-top">Realisasi : <strong>'+$realization+'</strong> )</li> \
								</ul> \
							</div> \
							<div class="uk-width-medium-1-1"> \
								<hr class="uk-margin-bottom-remove uk-margin-small-top"> \
								<div id="'+divID+'Chart" class="sikd-chart-lagging"></div> \
								<ul class="uk-subnav sikd-chart-action"> \
									<li><a class=""><i class="material-icons" data-uk-tooltip title="Data Per 30 Oktober 2016">info</i></a></li> \
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
			                    data : chartData.cat
			                }
			            ],
			            yAxis : [
			                {
			                    type : 'value',
			                    //splitArea : {show : true}
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
		});
	}

	L0Chart('A1','0','penyaluran','data/L0_A_penyaluran.json');
	L0Chart('A2','1','penyaluran','data/L0_A_penyaluran.json');
	L0Chart('A3','2','penyaluran','data/L0_A_penyaluran.json');
	L0Chart('A4','3','penyaluran','data/L0_A_penyaluran.json');
	L0Chart('A5','4','penyaluran','data/L0_A_penyaluran.json');
	L0Chart('A6','5','penyaluran','data/L0_A_penyaluran.json');
	L0Chart('A7','6','penyaluran','data/L0_A_penyaluran.json');

	L0Chart('B1','0','apbd','data/L0_B_apbd.json');
	L0Chart('B2','1','apbd','data/L0_B_apbd.json');
	L0Chart('B3','2','apbd','data/L0_B_apbd.json');
	L0Chart('B4','3','apbd','data/L0_B_apbd.json');
	L0Chart('B5','4','apbd','data/L0_B_apbd.json');
	L0Chart('B6','5','apbd','data/L0_B_apbd.json');
	L0Chart('B7','6','apbd','data/L0_B_apbd.json');
});
