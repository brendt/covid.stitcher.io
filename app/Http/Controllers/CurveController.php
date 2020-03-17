<?php

namespace App\Http\Controllers;

use App\Day;
use App\Http\Resources\DayChartResource;

class CurveController
{
    public function __invoke($country = null)
    {
        $query = Day::query()
            ->where('confirmed', '>', 0)
            ->whereCountry($country ?? 'BE')
            ->orderBy('date');

        $days = $query->get();

        $chartData = DayChartResource::make($days);

        return view('curve', [
            'days' => $days,
            'chartData' => $chartData->toJson(),
            'country' => $days->first()->country,
        ]);
    }
}
