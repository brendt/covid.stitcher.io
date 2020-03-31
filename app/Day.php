<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $guarded = [];

    protected $casts = [
        'date' => 'datetime',
        'confirmed' => 'integer',
        'deaths' => 'integer',
        'recovered' => 'integer',
    ];

    public function scopeWhereCountry(Builder $builder, string $country): Builder
    {
        if (strlen($country) === 2) {
            $builder->where('country_code', $country);
        } else {
            $builder->where('country', $country);
        }

        return $builder;
    }

    public function getOngoingAttribute(): int
    {
        return ($this->confirmed ?? 0) - (($this->deaths ?? 0) + ($this->recovered ?? 0));
    }
}
