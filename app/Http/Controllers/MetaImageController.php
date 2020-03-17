<?php

namespace App\Http\Controllers;

use App\Day;
use App\Http\Resources\DayChartResource;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Spatie\Browsershot\Browsershot;

class MetaImageController
{
    public function __invoke($country)
    {
        $query = Day::query()
            ->where('confirmed', '>', 0)
            ->whereCountry($country ?? 'BE')
            ->orderBy('date');

        $days = $query->get();

        $chartData = DayChartResource::make($days);

        $country = $days->first()->country;

        $slug = Str::slug($country);

        $view = view('meta', [
            'days' => $days,
            'chartData' => $chartData->toJson(),
            'country' => $country,
        ]);

        if (request()->get('html')) {
            return $view;
        }

        if (! is_dir(storage_path('images'))) {
            mkdir(storage_path('images'));
        }

        $targetPath = storage_path("images/{$slug}.jpg");

        if (! Cache::has($targetPath) || !file_exists($targetPath)) {
            Browsershot::html(
                $view->render()
            )->windowSize(1200, 630)->save($targetPath);

            Cache::put($targetPath, true, 60 * 12);
        }

        return response()->file($targetPath);
    }
}
