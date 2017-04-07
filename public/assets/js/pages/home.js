(function ($, window, document, $baseUrl, $tkddData, $apbdData, $reportTypes, $year) {
    $(function () {
        l0r1card('l0r1a');
        l0r1card('l0r1b');
        l0r2card('l0r2');
        l0r3card('l0r3');

        var tkddData = jQuery.parseJSON($tkddData);
        l0r1('l0r1a','0','tkdd', tkddData);
        l0r1('l0r1a','1','tkdd', tkddData);
        l0r1('l0r1a','2','tkdd', tkddData);
        l0r1('l0r1a','3','tkdd', tkddData);
        l0r1('l0r1a','4','tkdd', tkddData);
        l0r1('l0r1a','5','tkdd', tkddData);
        //l0r1('l0r1a','6','tkdd', tkddData);
        l0r1('l0r1a','7','tkdd', tkddData);

        var apbdData = jQuery.parseJSON($apbdData);
        l0r1('l0r1b','0','apbd', apbdData);
        l0r1('l0r1b','1','apbd', apbdData);
        l0r1('l0r1b','2','apbd', apbdData);
        l0r1('l0r1b','3','apbd', apbdData);
        l0r1('l0r1b','4','apbd', apbdData);
        l0r1('l0r1b','5','apbd', apbdData);
        l0r1('l0r1b','6','apbd', apbdData);
        l0r1('l0r1b','7','apbd', apbdData);
        l0r1('l0r1b','8','apbd', apbdData);
        l0r1('l0r1b','9','apbd', apbdData);
        l0r1('l0r1b','10','apbd', apbdData);
        l0r1('l0r1b','11','apbd', apbdData);

        var $infraUrl = $baseUrl + '/get-infrastructure-data/' + $year;
        var $simpananPemdaUrl = $baseUrl + '/get-simpanan-pemda-data';
		var $dataIpm = $baseUrl + '/get-ipm';
		var $dataPpm = $baseUrl + '/get-ppm';
		var $dataTpt = $baseUrl + '/get-tpt';
        $('.bxslider').bxSlider({
            auto: true,
            controls: false,
            pause: 24000,
            mode: 'fade',
            onSliderLoad: function(currentIndex) {
                l0r2a('l0r2a', $infraUrl, true);
                l0r2b('l0r2b', $simpananPemdaUrl);
				l0r2a('l0r2c', $dataIpm, true);
				l0r2a('l0r2d', $dataPpm, true);
				l0r2a('l0r2e', $dataTpt, true);
            },
        });

        var $realisasiTkddUrl = $baseUrl + '/get-realisasi-tkdd-data/' + $year;
        var $dakFisikUrl = $baseUrl + '/get-dak-fisik-data/' + $year;
        var $danaDesaUrl = $baseUrl + '/get-dana-desa-data/' + $year;
        var $lraUrl = $baseUrl + '/get-lra-data/' + $year;
        var $realisasiPadUrl = $baseUrl + '/get-realisasi-pad-data/' + $year;
        l0r3('l0r3grid', 'Realisasi-TKDD', $realisasiTkddUrl);
        l0r3('l0r3grid', 'DAK-Fisik', $dakFisikUrl);
        l0r3('l0r3grid', 'Dandes', $danaDesaUrl);
        l0r3('l0r3grid', 'LRA', $lraUrl);
        l0r3('l0r3grid', 'PAD', $realisasiPadUrl);

        $('select.select-year').change(function(){
            $year = $(this).val();
            window.location = $baseUrl + '/home/' + $year;
        });

        $('select.select-year').each(function (){
            var href = window.location.href;
            var array = href.split('/');
            var year = array[array.length-1];
            $(this).find('option[value="'+year+'"]').prop('selected',true);
            // console.log(year);
            if (year=='home') {
                $(this).find('option[value="2016"]').prop('selected',true);
            }
        });

    });
    function l0r1card(div) {
        var card =  '<div class="uk-card uk-card-hover uk-card-default uk-card-small uk-height-1-1 uk-animation-fade">'
                    + '<div class="uk-grid-collapse" uk-grid>'
                        + '<div class="uk-width-auto@m uk-flex-last@m sikd-l0r1-tab">'
                            + '<ul id="'+div+'TabItem" class="uk-tab-right uk-child-width-expand" uk-tab="connect: #'+div+'TabContent;"></ul>'
                        + '</div>'
                        + '<div class="uk-width-expand@m">'
                            + '<ul id="'+div+'TabContent" class="uk-switcher"></ul>'
                        + '</div>'
                    + '</div>'
                + '</div>';
        $('#' + div).append(card);
    }
    function l0r2card(div) {
        var card =  '<div class="uk-card uk-card-body uk-card-hover uk-card-default uk-card-mini uk-height-1-1 uk-animation-fade">'
                        + '<ul class="bxslider">'
                            + '<li id="l0r2a" class="sikd-l0r2-chart"></li>'
                            + '<li id="l0r2b" class="sikd-l0r2-chart"></li>'
							+ '<li id="l0r2c" class="sikd-l0r2-chart"></li>'
                            + '<li id="l0r2d" class="sikd-l0r2-chart"></li>'
							+ '<li id="l0r2e" class="sikd-l0r2-chart"></li>'
                        + '</ul>'
                    + '</div>';
        $('#' + div).append(card);

    }
    function l0r3card(div) {
        var card =  '<div class="uk-card uk-card-body uk-card-hover uk-card-default uk-card-mini uk-height-1-1 uk-animation-fade">'
            + '<h5 class="uk-text-center sikd-l0r3-title sikd-blue-text">Top 5 & Bottom 5</h5>'
            + '<div id="l0r3grid" class="uk-flex uk-flex-center uk-flex-top uk-grid-small uk-child-width-1-3 uk-child-width-1-5@m" uk-grid></div>'
        + '</div>';
        $('#' + div).append(card);

    }


    function l0r1(div, n, type, result) {
        //console.log(result);
        numeral.locale('id');
        if(type==='apbd') {
            $result = result.apbd;
        } else if (type==='tkdd') {
            $result = result.tkdd;
        }

        if ($result[n] !== undefined) {
            if ($result.length === 0) {
                $('#' + div).html('<div class="uk-position-center">Tidak ada data!</div>');
            } else {
                var $content = [];
                var $legend = [];
                $data = $result[n].trend;
                $id = $result[n].id;
                $name = $result[n].name;
                $icon = $result[n].icon;
                $info = $result[n].info;
                $achievement = $result[n].achievement;

                for (i = 0; i < $data.length; i++) {
                    $target000 = $achievement[0].target;
                    $target = numeral($target000).format('0.00a');

                    $realization000 = $achievement[0].realization;
                    $realization = numeral($realization000).format('0.00a');

                    $percentage000 = $achievement[0].percentage;
                    //$percentage = Math.round($percentage000 * 100) / 100;
                    $percentage = numeral($percentage000).format('0.0');

                    $type = 'line';
                    $thn = $data[i].year.toString();
                    $value = $data[i].value;
                    $cat = $data[i].month;

                    $content[i] = {name: $thn, type: $type, data: $value};
                    $legend[i] = $thn;
                }

                var chartData = {
                    content: $content,
                    cat: $cat,
                    legend: $legend
                };

                if (type == 'tkdd') {
                    var linkdetail = $baseUrl + '/level-1/tkdd/' + $id + '/' + $year;
                } else {
                    if ($id == '10') {
                        $id = 'lra';
                    }
                    var linkdetail = $baseUrl + '/level-1/apbd/' + $id + '/' + $year;
                }

                var tabItem = '<li><a title="'+$name+' '+$percentage+'%" uk-tooltip="pos:left" style="line-height:normal"><span class="sikd-icon">'+$icon+'</span></a></li>';
                $('#'+div+'TabItem').append(tabItem);

                var progress = '<div class="uk-progress">'
                    + '<div class="progress-bar uk-animation-slide-left" style="width: '+$percentage000+'%;"><span class="progress-text">A '+$target+' / R '+$realization+'</span></div>'
                + '</div>';

                var selectYear = '<select name="select-year" class="uk-select uk-form-small select-year">'
                    + '<option value="2017">2017</option>'
                    + '<option value="2016">2016</option>'
                    + '<option value="2015">2015</option>'
                + '</select>'

                var tabContent = '<li>'
                    + '<div class="uk-card-body">'
                        + '<div class="uk-grid-collapse" uk-grid>'
                            + '<div class="uk-width-1-2"><h4 class="sikd-l0r1-title uk-text-uppercase sikd-blue-text uk-text-truncate" title="'+$name+'" uk-tooltip>'+$name+'</h4></div>'
                            + '<div class="uk-width-1-2">'
                                + '<div class="uk-grid-collapse progress-wrap" uk-grid>'
                                    + '<div class="uk-width-auto">'
                                        + '<div class="sikd-progress-persen">'+$percentage+'%</div>'
                                    + '</div>'
                                    + '<div class="uk-width-expand">'
                                        + progress
                                    + '</div>'
                                + '</div>'
                            + '</div>'
                            + '<div class="uk-width-1-1 sikd-l0r1-wrap">'
                                + '<div id="'+div+'chart'+n+'" class="sikd-l0r1-chart"></div>'
                                + '<div class="sikd-l0r1-footer">'
                                        + '<a title="'+$info+'" uk-tooltip class="sikd-chart-info uk-margin-small-right" uk-icon="icon: info"></a>'
                                        + '<a href="'+linkdetail+'" class="uk-button uk-button-small uk-button-default uk-text-bold" title="Lihat Detail" uk-tooltip><span class="fa fa-binoculars fa-fw"></span> Detail</a>'
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
                //var effectIndex = -1;
                //var effect = ['spin'];

                chart.showLoading({
                    text: '',
                });
                var option = {
                    tooltip : {
                        trigger: 'axis',
                        axisPointer : {
                            type : 'shadow'
                        },
                        formatter: function (params){
                            //console.log(params);
                            var naam=[], waarde=[], color=[], serie=[];
                            for (var i = 0; i < params.length; i++) {
                                naam[i] = params[i].seriesName;
                                waarde[i] = numeral(params[i].value).format('0.00a');
                                color[i] = '<i class="fa fa-circle fa-fw" style="color:'+params[i].color+'"></i>';
                                serie[i] = '<br>'+color[i]+' '+naam[i]+' '+waarde[i]+'%';
                            }
                            return '<strong>' + params[0].name + '</strong>' + serie.join('');
                        }
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
                    chart.hideLoading();
                    chart.setOption(option);
                    chart.resize();
                    //$(window).trigger('resize');
                    $('.uk-switcher').on('show.uk.switcher', function(){
                        chart.resize();
                    });
                }, 1000);

                $(window).on('resize', function(){
                    if(chart != null && chart != undefined){
                        chart.resize();
                    }
                });

            }
        }
    }
    function l0r2a(id, chartUrl, stack) {
        numeral.locale('id');
        $.ajax({
    		url: chartUrl,
            dataType: 'json',
            success: function(result){
                var data = result.data;
    			var t = result.properties.Label;

                if (data.length === 0) {
                    $('#'+id).html('<div class="uk-position-center">Tidak ada data!</div>');
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
    						top: '-5px',
                            textStyle: {
                                fontSize: 14,
                                color: '#09355B',
                            },
    					},
                        tooltip : {
                            trigger: 'axis',
                            axisPointer : {
                                type : 'shadow'
                            },
                            // position: function (point, params, dom) {
                            //     return [point[0], '10%'];
                            // },
                            formatter: function (params){
                                var naam=[], waarde=[], color=[], serie=[];
                                for (var i = 0; i < params.length; i++) {
                                    naam[i] = params[i].seriesName;
                                    waarde[i] = numeral(params[i].value).format('0.00a');
                                    color[i] = '<i class="fa fa-circle fa-fw" style="color:'+params[i].color+'"></i>';
                                    serie[i] = '<br>'+color[i]+' '+naam[i]+' '+waarde[i];
                                }
                                return '<strong>' + params[0].name + '</strong>' + serie.join('');
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
                            y: '20px',
                            y2: '50px'
                        },
                        toolbox: {
                            show: true,
                            x: 'right',
                            bottom: 0,
                            padding: ['0', '0', '0', '0'],
                            feature: {
                                mark: {show: true},
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

    function l0r2b(id, chartUrl) {
        numeral.locale('id');
        $.ajax({
            url: chartUrl,
            success: function(result){
                result = jQuery.parseJSON(result);
                var data = result.trend;
                var t = result.name;

                if (data.length === 0) {
                    $('#'+id).html('<div class="uk-position-center">Tidak ada data!</div>');
                } else {
                    var $series=[], $legend=[];
                    for (var i = 0; i < data.length; i++) {
                        $year = String(data[i].year);
                        $month = data[i].month;
                        $value = data[i].value;
                        $legend[i] = $year;

                        $series[i] = {
                            name: $year,
                            type:'line',
                            data: $value
                        }
                    }

                    var dataseries = {
                        cat: $month,
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
    						top: '-5px',
                            textStyle: {
                                fontSize: 14,
                                color: '#09355B',
                            },
    					},
                        tooltip : {
                            trigger: 'axis',
                            axisPointer : {
                                type : 'shadow'
                            },
                            // position: function (point, params, dom) {
                            //     return [point[0], '10%'];
                            // },
                            formatter: function (params){
                                //console.log(params);
                                var naam=[], waarde=[], color=[], serie=[];
                                for (var i = 0; i < params.length; i++) {
                                    naam[i] = params[i].seriesName;
                                    waarde[i] = numeral(params[i].value).format('0.00a');
                                    color[i] = '<i class="fa fa-circle fa-fw" style="color:'+params[i].color+'"></i>';
                                    serie[i] = '<br>'+color[i]+' '+naam[i]+' '+waarde[i];
                                }
                                return '<strong>' + params[0].name + '</strong>' + serie.join('');
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
                            y: '20px',
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

    function l0r3(id, type, url) {
        numeral.locale('id');
        $.ajax({
            url: url,
            dataType: "json",
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

                var topBotTitle = topTitle.replace("Top 5 ", "");

    			var itemlink =  '<a href="#modal'+type+'" uk-toggle title="'+topTitle+' &amp; '+botTitle+'" uk-tooltip class="sikd-text5 sikd-blue-text">'
                        + '<span class="uk-icon-button sikd-icon5 sikd-icon-'+type+'"></span><br>'
                        + topBotTitle
                    + '</a>';

                var pop =   '<div id="modal'+type+'" uk-modal>'
                                + '<div class="uk-modal-dialog uk-modal-body">'
                                    + '<button class="uk-modal-close-default" type="button" uk-close></button>'
                                    + '<h5 class="sikd-title-topbottom">'+topTitle+'</h5>'
                                    + '<hr class="uk-margin-remove">'
                                    + '<div class="uk-overflow-auto uk-margin-small-bottom">'
                                        + '<table id="top_'+type+'" class="uk-table uk-table-small">'
                                            + '<thead><tr><th width="15%">Satker</th><th width="35%">Pemda</th><th width="25%" class="uk-text-right">Alokasi</th><th width="25%" class="uk-text-right">Persentase</th></tr></thead>'
                                        + '</table>'
                                    + '</div>'
                                    + '<h5 class="sikd-title-topbottom">'+botTitle+'</h5>'
                                    + '<hr class="uk-margin-remove">'
                                    + '<div class="uk-overflow-auto">'
                                        + '<table id="bot_'+type+'" class="uk-table uk-table-small">'
                                            + '<thead><tr><th width="15%">Satker</th><th width="35%">Pemda</th><th width="25%" class="uk-text-right">Alokasi</th><th width="25%" class="uk-text-right">Persentase</th></tr></thead>'
                                        + '</table>'
                                    + '</div>'
                                + '</div>'
                            + '</div>';
                var item =  '<div class="uk-text-center">'+itemlink+''+pop+'</div>';
    			$('#'+id).append(item);

    	        var trTop = '';
    	        $.each(topData[0].kodeSatker, function (i, item) {
                    trTop +=    '<tr>'
                                    + '<td>' + topData[0].kodeSatker[i] + '</td>'
                                    + '<td>' + topData[0].namaPemda[i] + '</td>'
                                    + '<td class="uk-text-right">' + numeral(topData[0].target[i]).format('0,0') + '</td>'
                                    + '<td class="uk-text-right">' + numeral(topData[0].percentage[i]).format('0.0') + '%</td>'
                                + '</tr>';
    	        });
    	        $('#top_'+type).append(trTop);

    			var trBot = '';
    			$.each(botData[0].kodeSatker, function (i, item) {
                    trBot +=    '<tr>'
                                    + '<td>' + botData[0].kodeSatker[i] + '</td>'
                                    + '<td>' + botData[0].namaPemda[i] + '</td>'
                                    + '<td class="uk-text-right">' + numeral(botData[0].target[i]).format('0,0') + '</td>'
                                    + '<td class="uk-text-right">' + numeral(botData[0].percentage[i]).format('0.0') + '%</td>'
                                + '</tr>';
    	        });
    	        $('#bot_'+type).append(trBot);

            },

            error: function (msg) {
                alert("error");
            }
        });

    }

}(window.jQuery, window, document, $baseUrl, $tkddData, $apbdData, $reportTypes, $year));
