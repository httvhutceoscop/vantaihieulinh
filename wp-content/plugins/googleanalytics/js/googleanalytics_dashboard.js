(function ($) {

    const wrapperSelector = '#ga_dashboard_widget';
    const minWidth = 350;
    const offset = 10;

    ga_dashboard = {
        chartData: [],
        init: function (dataArr) {
            ga_loader.show();
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(function () {
                ga_dashboard.drawChart(dataArr);
                ga_dashboard.setChartData(dataArr);
            });
        },
        events: function (data) {
            $(document).ready(function () {
                $('#range-selector').on('change', function () {
                    const selected = $(this).val();
                    const selected_name = $('#metrics-selector option:selected').html();
                    const selected_metric = $('#metrics-selector option:selected').val() || null;

                    ga_loader.show();

                    $.ajax({
                        type: "post",
                        dataType: "json",
                        url: ajaxurl,
                        data: {action: "ga_ajax_data_change", date_range: selected, metric: selected_metric},
                        success: function (response) {

                            ga_loader.hide();

                            var dataT = [['Day', selected_name]];
                            $.each(response.chart, function (k, v) {
                                dataT.push([v.day, parseInt(v.current)]);
                            });

                            $.each(response.boxes, function (k, v) {
                                $('#ga_box_dashboard_label_' + k).html(v.label)
                                $('#ga_box_dashboard_value_' + k).html(v.value);
                            });

                            ga_dashboard.drawChart(dataT, selected_name);

                            // Set new data
                            ga_dashboard.setChartData(dataT);
                        }
                    });
                });

                $('#metrics-selector').on('change', function () {
                    const selected = $(this).val();
                    const selected_name = $('#metrics-selector option:selected').html();
                    const selected_range = $('#range-selector option:selected').val() || null;

                    ga_loader.show();

                    $.ajax({
                        type: "post",
                        dataType: "json",
                        url: ajaxurl,
                        data: {action: "ga_ajax_data_change", metric: selected, date_range: selected_range},
                        success: function (response) {
                            ga_loader.hide();
                            var dataT = [['Day', selected_name]];
                            $.each(response.chart, function (k, v) {
                                dataT.push([v.day, parseInt(v.current)]);
                            });
                            ga_dashboard.drawChart(dataT, selected_name);

                            // Set new data
                            ga_dashboard.setChartData(dataT);
                        }
                    });
                });

                $(window).on('resize', function () {
                    ga_dashboard.drawChart(ga_dashboard.getChartData(), ga_tools.recomputeChartWidth(minWidth, offset, wrapperSelector));
                });
            });
        },
        /**
         * Returns chart data array.
         * @returns {Array}
         */
        getChartData: function () {
            return ga_dashboard.chartData;
        },
        /**
         * Overwrites initial data array.
         * @param new_data
         */
        setChartData: function (new_data) {
            ga_dashboard.chartData = new_data;
        },
        drawChart: function (dataArr, title) {
            const chart_dom_element = document.getElementById('chart_div');

            if (typeof title == 'undefined') {
                title = 'Pageviews';
            }

            const data = google.visualization.arrayToDataTable(dataArr);

            const options = {
                /*title: title,*/
                legend: 'top',
                lineWidth: 2,
                chartArea: {
                    left: 10,
                    top: 60,
                    bottom: 50,
                    right: 10

                },
                width: '95%',
                height: 300,
                hAxis: {title: 'Day', titleTextStyle: {color: '#333'}, direction: 1},
                vAxis: {minValue: 0},
                pointSize: 5
            };

            var chart = new google.visualization.AreaChart(chart_dom_element);
            google.visualization.events.addListener(chart, 'ready', function () {
                ga_loader.hide();
            });
            chart.draw(data, options);
        }
    };

})(jQuery);