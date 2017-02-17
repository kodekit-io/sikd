function l0r1card(div) {
    var card =  '<div class="uk-card uk-card-hover uk-card-default uk-card-small uk-height-1-1 uk-animation-fade">'
                + '<div class="uk-grid-collapse" uk-grid>'
                    + '<div class="uk-width-auto@m uk-flex-last@m sikd-l0r1-tab">'
                        + '<ul id="'+div+'TabItem" class="uk-tab-right uk-child-width-expand" uk-tab="connect: #'+div+'TabContent; animation: uk-animation-fade"></ul>'
                    + '</div>'
                    + '<div class="uk-width-expand@m">'
                        + '<ul id="'+div+'TabContent" class="uk-switcher"></ul>'
                    + '</div>'
                + '</div>'
            + '</div>';
    $('#' + div).append(card);
}
l0r1card('l0r1a');
l0r1card('l0r1b');

function l0r1(div,n,type,result) {
    if(type==='apbd') {
        $result = result.apbd;
    } else if (type==='tkdd') {
        $result = result.tkdd;
    }

    if ($result[n] !== undefined) {
        if ($result.length === 0) {
            $('#' + div).html("<div class='center'>No data chart</div>");
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

            if (type == 'tkdd') {
                var linkdetail = $baseUrl + '/level-1/tkdd/' + $id;
            } else {
                var linkdetail = $baseUrl + '/level-1/apbd/' + $id;
            }

            var tabItem = '<li><a href="#" title="'+$name+'" uk-tooltip="pos:left"><spin class="icon-'+slug($name)+'"></spin>'+$percentage+'</a></li>';
            $('#'+div+'TabItem').append(tabItem);

            var tabContent = '<li>'
                + '<div class="uk-card-body">'
                    + '<div class="uk-grid-collapse" uk-grid>'
                        + '<div class="uk-width-1-2"><h4 class="sikd-l0r1-title uk-text-uppercase sikd-blue-text">'+$name+'</h4></div>'
                        + '<div class="uk-width-1-2">'
                            + '<div class="sikd-progress uk-grid-small" uk-grid>'
                                + '<div class="uk-width-auto"><span class="uk-text-bold sikd-blue-text">'+$percentage+'%</span></div>'
                                + '<div class="uk-width-expand">'
                                    + '<progress id="progress'+n+'" class="uk-progress" value="'+$percentage+'" max="100"></progress>'
                                    + '<div class="sikd-progress-text">A '+$target+' / R '+$realization+'</div>'
                                + '</div>'
                            + '</div>'
                        + '</div>'
                        + '<div class="uk-width-1-1"><div id="'+div+'chart'+n+'" class="sikd-l0r1-chart"></div></div>'
                        + '<div class="uk-width-1-1">'
                            + '<div class="sikd-l0r1-footer uk-flex uk-flex-between">'
                                + '<div>'
                                    + '<select class="uk-select uk-form-small">'
                                        + '<option>2016</option>'
                                        + '<option>2015</option>'
                                    + '</select>'
                                + '</div>'
                                + '<div>'
                                    + '<a title="'+$info+'" uk-tooltip class="sikd-blue-text sikd-chart-info" uk-icon="icon: info"></a>'
                                    + '<a href="'+linkdetail+'" class="uk-button uk-button-small uk-button-default uk-text-bold rem1 sikd-blue-text" title="Lihat Detail" uk-tooltip><span class="fa fa-binoculars fa-fw"></span> Detail</a>'
                                + '</div>'
                            + '</div>'
                        + '</div>'
                    + '</div>'
                + '</div>'
            + '</li>';
            $('#'+div+'TabContent').append(tabContent);

            //CHART
            var dom = document.getElementById(div+'chart'+n);
            var theme = 'default';
            var chart = echarts.init(dom, theme);
            var loadingTicket;
            var effectIndex = -1;
            var effect = ['spin'];

            chart.showLoading({
                text: '',
            });
            var option = {
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: chartData.legend,
                    padding: ['0', '0', '0', '0'],
                    left: 'left',
                    bottom: '5'
                },
                toolbox: {
                    show: true,
                    left: 'right',
                    bottom: '5',
                    padding: ['0', '0', '0', '0'],
                    feature: {
                        mark: {show: true},
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
                    x: '35px',
                    x2: '10px',
                    y: '5px',
                    y2: '50px'
                },
                xAxis: {
                    type: 'category',
                    boundaryGap: false,
                    data: chartData.cat
                },
                yAxis: {
                    type: 'value',
                    axisLabel: {
                        formatter: function (v) {
                            $v = numeral(v).format('0a');
                            return $v;
                        }
                    }
                },
                series: chartData.content
            };

            clearTimeout(loadingTicket);
            loadingTicket = setTimeout(function () {
                $('.uk-switcher').on('show.uk.switcher', function(){
                    $(window).trigger('resize');
                });
                chart.hideLoading();
                chart.setOption(option);
                chart.resize();
            }, 1000);
            $(window).on('resize', function(){
                if(chart != null && chart != undefined){
                    chart.resize();
                }
            });
        }
    }
}
var $tkddData = jQuery.parseJSON(tkddData);
l0r1('l0r1a','0','tkdd', $tkddData);
l0r1('l0r1a','1','tkdd', $tkddData);
l0r1('l0r1a','2','tkdd', $tkddData);
l0r1('l0r1a','3','tkdd', $tkddData);
l0r1('l0r1a','4','tkdd', $tkddData);
l0r1('l0r1a','5','tkdd', $tkddData);
//l0r1('l0r1a','6','tkdd', $tkddData);
l0r1('l0r1a','7','tkdd', $tkddData);

var $apbdData = jQuery.parseJSON(apbdData);
l0r1('l0r1b','0','apbd', $apbdData);
l0r1('l0r1b','1','apbd', $apbdData);
l0r1('l0r1b','2','apbd', $apbdData);
l0r1('l0r1b','3','apbd', $apbdData);
l0r1('l0r1b','4','apbd', $apbdData);
l0r1('l0r1b','5','apbd', $apbdData);
l0r1('l0r1b','6','apbd', $apbdData);
l0r1('l0r1b','7','apbd', $apbdData);
l0r1('l0r1b','8','apbd', $apbdData);
l0r1('l0r1b','9','apbd', $apbdData);
l0r1('l0r1b','10','apbd', $apbdData);
l0r1('l0r1b','11','apbd', $apbdData);

function l0r2card(div) {
    var card =  '<div class="uk-card uk-card-body uk-card-hover uk-card-default uk-card-small uk-height-1-1 uk-animation-fade">'
                    + '<ul class="bxslider">'
                        + '<li id="l0r2a" class="sikd-l0r2-chart"></li>'
                        + '<li id="l0r2b" class="sikd-l0r2-chart"></li>'
                    + '</ul>'
                + '</div>';
    $('#' + div).append(card);

}
l0r2card('l0r2');

function l0r2(id, chartUrl, stack) {
    $.ajax({
        //url: 'data/L0_row2_infrastruktur.json',
		url: chartUrl,
        dataType: 'json',
        success: function(result){
			//console.log(result);
		    // result = jQuery.parseJSON(result);
            var data = result.data;
			var t = result.properties.Label;

            if (data.length === 0) {
                $('#'+id).html("<div class='center'>No Data</div>");
            } else {
                var $series=[], $legend=[];
				//console.log(data.length);
                for (var i = 0; i < data.length; i++) {
                    $name = String(data[i].name);
					$dataName = data[0].dataName;
					$dataValue = data[i].dataValue;
					$legend[i] = $name;

					$series[i] = {
						name: $name,
						type:'bar',
						stack: stack,
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
                var theme = 'default';
                var theChart = echarts.init(dom,theme);
                var loadingTicket;
                var effectIndex = -1;
                var effect = ['spin'];

                theChart.showLoading({
                    text : '',
                });

                var option = {
					backgroundColor: '#fff',
					title: {
						text: t,
						left: 'center',
						top: 10
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
                        bottom: 0,
                    },
                    grid: {
                        x: '30px',
                        x2: '10px',
                        y: '10px',
                        y2: '50px'
                    },
                    toolbox: {
                        show: true,
                        x: 'right',
                        bottom: 0,
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
                                },
                                interval: 0,
                                rotate: 15
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
                    $('.bxslider').bxSlider({
                        auto: true,
                        controls: false,
                        pause: 10000,
                        mode: 'fade',
        				onSliderLoad: function(currentIndex) {
        			        $(window).trigger('resize');
        			    },
        			});
                    theChart.hideLoading();
                    theChart.setOption(option);
                    theChart.resize();
                },1000);
                $(window).on('resize', function(){
                    if(theChart != null && theChart != undefined){
                        theChart.resize();
                    }
                });
            }
        }
    });
}
var $infraUrl = $baseUrl + '/get-infrastructure-data/' + thisYear;
var $simpananPemdaUrl = $baseUrl + '/get-simpanan-pemda-data';
l0r2('l0r2a', $infraUrl, true)
l0r2('l0r2b', $simpananPemdaUrl, false)


function l0r3card(div) {
    var card =  '<div class="uk-card uk-card-body uk-card-hover uk-card-default uk-card-small uk-height-1-1 uk-animation-fade"><div id="l0r3grid" class="uk-grid-small uk-grid-match uk-child-width-1-5@m" uk-grid></div></div>';
    $('#' + div).append(card);

}
l0r3card('l0r3');

function l0r3(id, type, url) {
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

			var imgType = '<i class="uk-icon uk-icon-button sikd-icon-'+type+'"></i>';

            var item =  '<a href="#modal'+type+'" uk-toggle title="'+topTitle+' &amp; '+botTitle+'" uk-tooltip>'+imgType+'</a>'
                        + '<div id="modal'+type+'" uk-modal>'
                            + '<div class="uk-modal-dialog uk-modal-body">'
                                + '<button class="uk-modal-close-default" type="button" uk-close></button>'
                                + '<h4>'+topTitle+'</h4>'
                                + '<div class="uk-overflow-auto"><table id="top_'+type+'" class="uk-table uk-table-small">'
                                    + '<thead><tr><th width="15%">Satker</th><th width="35%">Pemda</th><th width="25%" class="uk-text-right">Alokasi</th><th width="25%" class="uk-text-right">Persentase</th></tr></thead>'
                                + '</table></div>'
                                + '<h4>'+botTitle+'</h4>'
                                + '<div class="uk-overflow-auto"><table id="bot_'+type+'" class="uk-table uk-table-small">'
                                    + '<thead><tr><th width="15%">Satker</th><th width="35%">Pemda</th><th width="25%" class="uk-text-right">Alokasi</th><th width="25%" class="uk-text-right">Persentase</th></tr></thead>'
                                + '</table></div>'
                            + '</div>'
                        + '</div>';
			$('#'+id).append(item);

	        var trTop = '';
	        $.each(topData[0].kodeSatker, function (i, item) {
                trTop +=    '<tr>'
                                + '<td>' + topData[0].kodeSatker[i] + '</td>'
                                + '<td>' + topData[0].namaPemda[i] + '</td>'
                                + '<td class="uk-text-right">' + numeral(topData[0].target[i]).format('0,0') + '</td>'
                                + '<td class="uk-text-right">' + numeral(topData[0].percentage[i]).format('0.00') + '</td>'
                            + '</tr>';
	        });
	        $('#top_'+type).append(trTop);

			var trBot = '';
			$.each(botData[0].kodeSatker, function (i, item) {
				//trBot += "<tr><td>" + botData[0].kodeSatker[i] + "</td><td>" + botData[0].namaPemda[i] + "</td><td class=\"uk-text-right\">" + numeral(botData[0].target[i]).format('0,0') + "</td><td class=\"uk-text-right\">" + numeral(botData[0].realization[i]).format('0,0') + "</td><td class=\"uk-text-right\">" + numeral(botData[0].percentage[i]).format('0.00') + "%</td></tr>";
                trBot +=    '<tr>'
                                + '<td>' + botData[0].kodeSatker[i] + '</td>'
                                + '<td>' + botData[0].namaPemda[i] + '</td>'
                                + '<td class="uk-text-right">' + numeral(botData[0].target[i]).format('0,0') + '</td>'
                                + '<td class="uk-text-right">' + numeral(botData[0].percentage[i]).format('0.00') + '</td>'
                            + '</tr>';
	        });
	        $('#bot_'+type).append(trBot);

        },

        error: function (msg) {
            alert("error");
        }
    });

}
var $realisasiTkddUrl = $baseUrl + '/get-realisasi-tkdd-data/' + thisYear;
var $dakFisikUrl = $baseUrl + '/get-dak-fisik-data/' + thisYear;
var $danaDesaUrl = $baseUrl + '/get-dana-desa-data/' + thisYear;
var $belanjaUrl = $baseUrl + '/get-belanja-data/' + thisYear;
var $realisasiPadUrl = $baseUrl + '/get-realisasi-pad-data/' + thisYear;

l0r3('l0r3grid', 'Realisasi-TKDD', $realisasiTkddUrl);
l0r3('l0r3grid', 'DAK-Fisik', $dakFisikUrl);
l0r3('l0r3grid', 'Dandes', $danaDesaUrl);
l0r3('l0r3grid', 'Belanja', $belanjaUrl);
l0r3('l0r3grid', 'PAD', $realisasiPadUrl);