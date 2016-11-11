function gauge($id,$data,$title,$info) {
	$('#'+$id).highcharts({
		'chart': {
			'type': 'solidgauge'
		},
		'title': {
			'text': $title
		},
		'credits': {
			'enabled': false
		},
		'tooltip': {
			'enabled': false
		},
		'pane': {
			'center': ['50%', '50%'],
			'size': '120px',
			'startAngle': 0,
			'endAngle': 360,
			'background': {
				'backgroundColor': '#EEE',
				'innerRadius': '80%',
				'outerRadius': '100%',
				'borderWidth': 0
			}
		},
		'yAxis': {
			'min': 0,
			'max': 100,
			'labels': {
				'enabled': false
			},
			'lineWidth': 0,
			'minorTickInterval': null,
			'tickPixelInterval': 100,
			'tickWidth': 0
		},
		'plotOptions': {
			'solidgauge': {
				'innerRadius': '80%',
				'dataLabels': {
					enabled: true,
					formatter: function() {
						//return this.series.name + '<br>' + this.y + '%';
						return this.y + '%';
					},
					align: 'center',
					x: 0,
					y: -15,
					style: {
						fontSize: 24,
						fontWeight: 'normal',
						textAlign: 'center',
						color: '#FF8800'
					}
				},
			}
		},
		'series': [{
			'name': $title,
			'data': [$data],
			'dataLabels': {
				borderColor: 'red',
				borderWidth: 0,
				padding: 0,
				shadow: false,
				style: {
					fontWeight: 'bold'
				}
			}
		}]
	});
}
function gauge12($id,$data,$title,$info) {
	$('#'+$id).highcharts({
		'chart': {
			'type': 'solidgauge'
		},
		'title': {
			'text': $title
		},
		'credits': {
			'enabled': false
		},
		'tooltip': {
			'enabled': false
		},
		'pane': {
			'center': ['50%', '50%'],
			'size': '120px',
			'startAngle': 0,
			'endAngle': 360,
			'background': {
				'backgroundColor': '#EEE',
				'innerRadius': '80%',
				'outerRadius': '100%',
				'borderWidth': 0
			}
		},
		'yAxis': {
			'min': 0,
			'max': 12,
			'labels': {
				'enabled': false
			},
			'lineWidth': 0,
			'minorTickInterval': null,
			'tickPixelInterval': 36,
			'tickWidth': 1,
			'tickColor': '#ffffff'
		},
		'plotOptions': {
			'solidgauge': {
				'innerRadius': '80%',
				'dataLabels': {
					enabled: true,
					formatter: function() {
						//return this.series.name + '<br>' + this.y + '%';
						if ($info) {
							return $info;
						} else {
							return ''+$data+'/12';
						}

					},
					align: 'center',
					x: 0,
					y: -15,
					style: {
						fontSize: 24,
						fontWeight: 'normal',
						textAlign: 'center',
						color: '#FF8800'
					}
				},
			}
		},
		'series': [{
			'name': $title,
			'data': [$data],
			'dataLabels': {
				borderColor: 'red',
				borderWidth: 0,
				padding: 0,
				shadow: false,
				style: {
					fontWeight: 'bold'
				}
			}
		}]
	});
}
gauge('g1',77,'TKDD');
gauge('g2',67,'APBD');
gauge12('g3',7,'Penyampaian Data');
gauge12('g4',9,'Peringkat','BB+');
