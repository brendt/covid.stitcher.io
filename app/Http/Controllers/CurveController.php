<?php

namespace App\Http\Controllers;

use App\Day;

class CurveController
{
    public function __invoke($country = null)
    {
        $countryCode = $country ?? 'BE';

        $days = Day::query()
            ->where('country_code', $countryCode)
            ->where('confirmed', '>', 0)
            ->orderBy('date')
            ->get();

        $chartData = json_encode([
            ['Day (d/m/Y)', 'Confirmed', 'Deaths', 'Recovered'],
            ...$days->map(function (Day $day) {
                return [
                    $day->date->format('d/m/Y'),
                    $day->confirmed ?? 0,
                    $day->deaths ?? 0,
                    $day->recovered ?? 0,
                ];
            }),
        ]);

        $country = $days->first()->country;

        return view('curve', [
            'days' => $days,
            'chartData' => $chartData,
            'country' => $country,
        ]);
    }
}
