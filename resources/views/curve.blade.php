<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Flatten the curve</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
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
            series: {
                0: { color: '#1c91c0' },
                1: { color: '#e2431e' },
                2: { color: '#6f9654' },
            },
            vAxis: {
                viewWindowMode: 'explicit',
                viewWindow: {
                    min: 0
                }
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve'));

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
</body>
</html>
