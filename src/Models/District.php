<?php

namespace  HtetMyatHlaing\MyanmarTownships\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class District extends Model
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
        "dist_id",
        "lat",
        "lng",
        "state_id",
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function townships()
    {
        return $this->hasMany(Township::class);
    }
}
