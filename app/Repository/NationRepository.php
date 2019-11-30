<?php
namespace App\Repository;

use App\Model\City;
use App\Model\District;
use App\Model\Nation;

class NationRepository {
    const PAGINATION_DEFAULT = 15;

    public function nationInfo($code)
    {
        return Nation::with(['cities'])->where('code', $code)->first();
    }

    public function cityInfo($code)
    {
        return City::with(['districts'])->where('code', $code)->first();
    }

    public function districtInfo($code)
    {
        return District::with(['communes'])->where('code', $code)->first();
    }

    public function communeInfo($code)
    {
        return District::where('code', $code)->first();
    }

    public function pagination()
    {
        return Nation::orderBy('id', 'DESC')->paginate(self::PAGINATION_DEFAULT);
    }

    public function citiesInNation(Nation $nation)
    {
        return City::where('nation_id', $nation->id)->paginate(self::PAGINATION_DEFAULT);
    }

    public function create($params)
    {
        return Nation::create($params);
    }

    public function createCity($params)
    {
        return City::create($params);
    }
}
