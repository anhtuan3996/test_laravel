<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
    protected $table = 'nations';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'code'
    ];

    public function cities()
    {
        return $this->hasMany(City::class, 'nation_id', 'id');
    }
}
