<?php

namespace HtetMyatHlaing\MyanmarTownships\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Township extends Model
{
    use HasFactory, SoftDeletes;

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        "name_en",
        "name_mm",
        "tsp_code_en",
        "tsp_code_mm",
        "tsp_id",
        "postal_code",
        "lat",
        "lng",
        'district_id',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
