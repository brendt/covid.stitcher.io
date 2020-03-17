@component('layout', [
    'chartData' => $chartData,
    'country' => $country
])
    @slot('head')
        <style>
            h1 {
                position: absolute;
                top: 3rem;
                left: 190px;
                z-index: 999;
            }

            #curve {
                margin-top: 2rem;
            }

            body {
                overflow: hidden;
            }
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
                height: '600',
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
                        color: '#ddd'
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
    <div class="full-height">
        <div>
            <h1>Corona cases in {{ $country }}</h1>
        </div>

        <div id="curve"></div>
    </div>
@endcomponent
