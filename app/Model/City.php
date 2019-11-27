<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'nation_id', 'code'
    ];

    public function nation()
    {
        return $this->belongsTo(Nation::class, 'nation_id', 'id');
    }

    public function districts()
    {
        return $this->hasMany(District::class, 'city_id', 'id');
    }
}
