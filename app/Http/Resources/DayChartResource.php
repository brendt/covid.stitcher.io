<?php

namespace App\Http\Resources;

use App\Day;
use Illuminate\Http\Resources\Json\JsonResource;

class DayChartResource extends JsonResource
{
    /** @var \Illuminate\Support\Collection|\App\Day[] */
    public $resource;

    public function toArray($request)
    {
        $headers = ['Day (d/m/Y)', 'Confirmed', 'Deaths', 'Recovered'];

        $rows = $this->resource->map(function (Day $day) {
            return [
                $day->date->format('d/m/Y'),
                $day->confirmed ?? 0,
                $day->deaths ?? 0,
                $day->recovered ?? 0,
            ];
        });

        return [
            $headers,
            ...$rows,
        ];
    }
}
