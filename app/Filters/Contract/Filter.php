<?php
namespace App\Filters\Contract;

use Illuminate\Database\Eloquent\Builder;

interface Filter
{
    public function apply(Builder $builder, $value);
}
