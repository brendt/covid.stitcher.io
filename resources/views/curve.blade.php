@component('layout', [
    'chartData' => $chartData,
    'country' => $country
])

    @slot('head')
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:creator" content="@bendt_gd">
        <meta name="twitter:title" content="Corona cases in {{ $country }}">
        <meta property="twitter:image" content="{{ action(\App\Http\Controllers\MetaImageController::class, $country) }}">
    @endslot

    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable({!! $chartData !!});

            var options = {
                title: 'Corona cases in {{ $country }}',
                curveType: 'function',
                legend: {position: 'bottom'},
                width: '100%',
                height: '800',
                lineWidth: 3,
                series: {
                    0: {color: '#1c91c0'},
                    1: {color: '#e2431e'},
                    2: {color: '#6f9654'},
                },
                vAxis: {
                    viewWindowMode: 'explicit',
                    viewWindow: {
                        min: 0
                    }
                }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('curve'));

            chart.draw(data, options);
        }
    </script>

    <div class="full-height">
        <div id="curve"></div>

        <div class="flex-center">
            <p>
                Data gathered from <a
                    href="https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_time_series"
                    target="_blank" rel="noopener noreferrer"
                >https://github.com/CSSEGISandData/COVID-19/tree/master/csse_covid_19_data/csse_covid_19_time_series</a>
            </p>
        </div>
    </div>
@endcomponent
