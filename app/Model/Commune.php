<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $table = 'communes';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'district_id', 'code'
    ];
}
