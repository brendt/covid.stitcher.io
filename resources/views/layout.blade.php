<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>#FlattenTheCurve</title>

    <meta name="twitter:card" content="article">
    <meta property="og:type" content="article">

    <meta name="title" content="Corona progression over time">
    <meta name="twitter:title" content="Corona progression over time">
    <meta property="og:title" content="Corona progression over time">
    <meta itemprop="name" content="Corona progression over time">

    <meta name="description" content="Daily timeline of covid-19 cases per country">
    <meta name="twitter:description" content="Daily timeline of covid-19 cases per country">
    <meta property="og:description" content="Daily timeline of covid-19 cases per country">
    <meta itemprop="description" content="Daily timeline of covid-19 cases per country">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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

    {{ $head ?? '' }}
</head>
<body>
{{ $slot ?? '' }}
</body>
</html>
