<?php
namespace App\Repository;

use App\Model\City;
use App\Model\Commune;
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

    public function districtOfCity(City $city)
    {
        return District::where('city_id', $city->id)->paginate(self::PAGINATION_DEFAULT);
    }

    public function communesOfDistrict(District $district)
    {
        return Commune::where('district_id', $district->id)->paginate(self::PAGINATION_DEFAULT);
    }

    public function create($params)
    {
        return Nation::create($params);
    }

    public function createCity($params)
    {
        return City::create($params);
    }

    public function createCommune($params)
    {
        return Commune::create($params);
    }

    public function createDistrict($params)
    {
        return District::create($params);
    }
}
