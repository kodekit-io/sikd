function L0Chart(div,n,type,url) {
	$.ajax({
		url : url,
		beforeSend : function(xhr) {
			$('#' + div).hide();
		},
		complete : function(xhr, status) {
			$('#' + div).show();
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
				$('#' + div).html("<div class='center'>No data chart</div>");
			} else {
				var $content = [];
				for (i = 0; i < $data.length; i++) {
					$id = $result[n].id;
					$name = $result[n].name;
					$achievement = $result[n].achievement;
					$target = $achievement[0].target;
					$realization = $achievement[0].realization;
					$percentage = $achievement[0].percentage;

					$year = $data[i].year;
					$value = $data[i].value;
					$cat = $data[i].month;

					$content[i] = {name: $year, data: $value};

				}
				var chartData = {
					content: $content,
					cat: $cat
				};

				var clrs = ['#ff8f00', '#ffe0b2'];
				var color = "";
				switch (type) {
					case "apbd":
						clrs = ['#ff8f00', '#ffe0b2'];
						color = "orange";
						break;
					case "penyaluran":
						clrs = ["#3f51b5", "#7986cb"];
						color = "indigo";
						break;
					case "":
						clrs = ["#3f51b5", "#7986cb"];
						color = "";
						break;
				}
				//console.log(clrs);

				var tab = '<span class="sikd-lagging-tab__title">'+$name+'</span> \
				<span class="sikd-lagging-tab__persen">'+$percentage+'</span>';

				var linkdetail = './level-1';
				var tabcontent = '<div class="uk-grid uk-grid-collapse sikd-'+color+'" data-uk-grid-match data-uk-grid-margin> \
						<div class="uk-width-medium-1-2"> \
							<h5 class="sikd-chart--title '+color+'-text">'+$name+'</h5> \
						</div> \
						<div class="uk-width-medium-1-2"> \
							<div class="uk-progress uk-margin-bottom-remove"> \
								<div class="uk-progress-bar uk-animation-slide-left '+color+'" style="width: '+$percentage+';">'+$percentage+'</div> \
							</div> \
							<ul class="uk-subnav uk-margin-bottom-remove uk-margin-top-remove"> \
								<li class="uk-margin-small-top">Alokasi : <strong>'+$target+'</strong></li> \
								<li class="uk-margin-small-top">Realisasi : <strong>'+$realization+'</strong></li> \
							</ul> \
						</div> \
						<div class="uk-width-medium-1-1"> \
							<div id="'+div+'Chart" class="sikd-chart-lagging"></div> \
							<div class="sikd-chart-action right"> \
								<a class="btn-floating uk-margin-small-right grey lighten-1 sikd-i"><i class="material-icons" data-uk-tooltip title="Data Per 30 Oktober 2016">info</i></a> \
								<a href="'+linkdetail+'" class="btn '+color+'" title="Lihat Detail '+$name+'" data-uk-tooltip>LIHAT DETAIL</a> \
							</div> \
						</div> \
					</div>';
				$('#' + div).html(tabcontent);

				$('#' + div +'tab a').html(tab);
				$('#' + div +'tab a').attr('title', ''+$name+'');

				$(".sikd-lagging-tab__title").html(function(i, html) {
					return html.replace(/ /g, '<br>');
				});

				var w = $('#L0A').width();
				//console.log(w);
				var $trendChart = new Highcharts.Chart({
					chart: {
						renderTo: div+'Chart',
						type: 'line',
						height: 260,
						width: w,
						spacingBottom: 40
					},
					colors: clrs,
					title: {
						text: null
					},
					credits: {
						enabled: false
					},
					xAxis: {
						categories: chartData.cat,
						crosshair: true
					},
					yAxis: {
						title: {
							text: null
						},
						min: 0,
						plotLines: [{
							value: 0,
							width: 1,
							color: '#808080'
						}]
					},
					tooltip: {
						headerFormat: '<span>{point.key}</span><table>',
						pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
							'<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
						footerFormat: '</table>',
						shared: true,
						useHTML: true
					},
					series: chartData.content
				});

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


function Row2(id,type) {
	$('#'+id).highcharts({
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
	});
};
Row2('LOC1','column');
Row2('LOC2','line');
Row2('LOC3','bar');
Row2('LOC4','area');
Row2('LOC5','scatter');
