/**
 * @license Highcharts JS v5.0.0 (2016-09-29)
 *
 * (c) 2009-2016 Torstein Honsi
 *
 * License: www.highcharts.com/license
 */
(function(factory) {
    if (typeof module === 'object' && module.exports) {
        module.exports = factory;
    } else {
        factory(Highcharts);
    }
}(function(Highcharts) {
    (function(Highcharts) {
        /**
         * (c) 2010-2016 Torstein Honsi
         *
         * License: www.highcharts.com/license
         *
         * Gray theme for Highcharts JS
         * @author Torstein Honsi
         */

        'use strict';
		Highcharts.theme = {
			colors: ["#3f51b5", "#7986cb", "#c5cae9", "#b3e5fc", "#b2ebf2", "#b2dfdb"],
			chart: {
				backgroundColor: null,
				style: {
					fontFamily: '"Montserrat", sans-serif;'
				}
			},
			title: {
				style: {
					fontSize: '1em',
					fontWeight: 'normal',
					textTransform: 'uppercase'
				}
			},
			subtitle: {

			},
			tooltip: {
				borderWidth: 0,
				backgroundColor: 'rgba(255, 255, 255, 0.85)',
				shadow: false,
				style: {
					color: '#333'
				},
                shadow: true,
                useHTML: true,
            },
			xAxis: {
				labels: {

				},
				title: {

				}
			},
			yAxis: {
				labels: {

				},
				title: {

				}
			},
			legend: {
		        align: 'left',
		        verticalAlign: 'bottom',
				layout: 'horizontal',
		        x: 0,
		        y: 30,
				backgroundColor: '#fff',
		        borderColor: '#eee',
		        borderWidth: 1,
				itemStyle: {
					fontWeight: 'normal',
					fontSize: '12px'
				}
			},
			labels: {

			}
		};

        // Apply the theme
        Highcharts.setOptions(Highcharts.theme);

    }(Highcharts));
}));
