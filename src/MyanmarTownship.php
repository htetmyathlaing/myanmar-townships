<?php

namespace HtetMyatHlaing\MyanmarTownships;

use Illuminate\Database\Eloquent\Builder;
use HtetMyatHlaing\MyanmarTownships\Models\State;
use HtetMyatHlaing\MyanmarTownships\Models\District;
use HtetMyatHlaing\MyanmarTownships\Models\Township;

class MyanmarTownship
{
    public function searchTownships($search, array $options = [])
    {
        return $this->search(Township::query(), $search, $options);
    }

    public function searchDistricts($search, array $options = [])
    {
        return $this->search(District::query(), $search, $options);
    }

    public function searchStates($search, array $options = [])
    {
        return $this->search(State::query(), $search, $options);
    }

    public function search(Builder $query, ?string $search, array $options = [])
    {
        $keys = !isset($options['keys']) || !is_array($options['keys']) ? ['name_en', 'name_mm'] : $options['keys'];
        $limt =  $options['limit'] ?? 10;
        $paginate = $options['paginate'] ?? 0;
        $sort = $options['sort'] ?? 'name_mm';
        $order = $options['order'] ?? 'asc';
        $with = isset($options['with']) && is_array($options['with']) ? $options['with'] : [];

        if ($search) {
            if (!$keys) {
                $keys = ['name_en', 'name_mm'];
            }

            $query = $query->where(function ($query) {
                $query;
            });

            foreach ($keys as $key) {
                $query = $query->orWhere($key, 'like', "%{$search}%");
            }
        }

        $query = $query->orderBy($sort, $order);

        if ($with) {
            $query =  $query->with($with);
        }

        if ($paginate) {
            return $query->paginate($paginate);
        }
        return  $query->limit($limt)->get();
    }
}
