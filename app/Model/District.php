<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'city_id', 'code'
    ];

    public function city()
    {
        return $this->belongsTo(District::class, 'city_id', 'id');
    }

    public function communes()
    {
        return $this->hasMany(Commune::class, 'district_id', 'id');
    }
}
