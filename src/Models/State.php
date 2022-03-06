<?php

namespace  HtetMyatHlaing\MyanmarTownships\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class State extends Model
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
        "sr_code",
        "sr_id",
        "lat",
        "lng",
    ];
    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function townships()
    {
        return $this->hasManyThrough(
            Township::class,
            District::class
        );
    }
}
