@component('layout', [
    'chartData' => $chartData,
    'country' => $country
])
    @slot('head')
        <style>
        </style>
    @endslot

    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable({!! $chartData !!});

            var options = {
                curveType: 'function',
                width: '100%',
                height: '630',
                chartArea: {'width': '100%', 'height': '100%'},
                lineWidth: 4,
                series: {
                    0: {color: '#1c91c0'},
                    1: {color: '#e2431e'},
                    2: {color: '#6f9654'},
                },
                vAxis: {
                    viewWindowMode: 'explicit',
                    viewWindow: {
                        min: 0
                    },
                    gridlines: {
                        color: 'none'
                    },
                    textPosition: 'none'
                },
                hAxis: {
                    textPosition: 'none'
                },
                legend: 'none'
            };

            var chart = new google.visualization.AreaChart(document.getElementById('curve'));

            chart.draw(data, options);
        }
    </script>
    <div id="curve"></div>
@endcomponent
