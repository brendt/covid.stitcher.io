<?php

namespace App\Http\Controllers;

use App\Day;

class CurveController
{
    public function __invoke($country = null)
    {
        $country = $country ?? 'BE';

        $query = Day::query()
            ->where('confirmed', '>', 0)
            ->orderBy('date');

        if (strlen($country) === 2) {
            $query->where('country_code', $country);
        } else {
            $query->where('country', $country);
        }

        $days = $query->get();

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
