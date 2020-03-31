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
        $headers = ['Day (d/m/Y)', 'Deaths', 'Recovered', 'Ongoing'];

        $rows = $this->resource->map(function (Day $day) {
            return [
                $day->date->format('d/m/Y'),
                $day->deaths ?? 0,
                $day->recovered ?? 0,
                $day->ongoing ?? 0,
            ];
        });

        return [
            $headers,
            ...$rows,
        ];
    }
}
