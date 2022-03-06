<?php

namespace  HtetMyatHlaing\MyanmarTownships\Traits;

use  HtetMyatHlaing\MyanmarTownships\Models\Township;

trait HasTownshipPolyMorph
{
    public function township()
    {
        return $this->morphToMany(Township::class, 'townshipable');
    }

    public function saveTownship($township)
    {
        if ($township instanceof Township) {
            $township = $township->id;
        }
        if (is_numeric($township)) {
            $this->township()->sync([$township]);
            return true;
        }

        return false;
    }
}
