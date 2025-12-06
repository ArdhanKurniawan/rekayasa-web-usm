<?php

namespace App\Models\Traits;

use Carbon\Carbon;

trait WIBTimezone
{
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)
            ->timezone('Asia/Jakarta')
            ->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)
            ->timezone('Asia/Jakarta')
            ->format('Y-m-d H:i:s');
    }
}