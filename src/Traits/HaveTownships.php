<?php

namespace  HtetMyatHlaing\MyanmarTownships\Traits;

use  HtetMyatHlaing\MyanmarTownships\Models\Township;

trait HaveTownships
{
    public function townships()
    {
        return $this->morphToMany(Township::class, 'townshipable');
    }

    public function saveTownship($township)
    {
        if ($township instanceof Township) {
            $township = $township->id;
        }
        if (is_numeric($township)) {
            $this->townships()->sync([$township]);
            return true;
        }

        return false;
    }

    public function saveTownships(array $imageIds)
    {
        if (is_array($imageIds)) {
            $this->images()->sync($imageIds);
            return true;
        }

        return false;
    }

    public function removeTownship($township)
    {
        if ($township instanceof Township) {
            $township = $township->id;
        }
        if (is_numeric($township)) {
            $this->townships()->detach($township);
            return true;
        }

        return false;
    }

    public function removeTownships(array $removedTownshipIds)
    {
        if (is_array($removedTownshipIds)) {
            $originalIds = $this->townships()->pluck('id');
            $townshipIds = $originalIds->diff($removedTownshipIds);
            $this->townships()->sync($townshipIds);
            return true;
        }

        return false;
    }

    public function getTownshipAttribute()
    {
        return $this->townships()->first();
    }
}
