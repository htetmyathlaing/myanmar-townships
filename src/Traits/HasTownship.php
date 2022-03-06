<?php

namespace  HtetMyatHlaing\MyanmarTownships\Traits;

use  HtetMyatHlaing\MyanmarTownships\Models\Township;

trait HasTownship
{
    public function township()
    {
        return $this->belongsTo(Township::class,);
    }
}
