<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateCityRequest;
use App\Http\Requests\CreateNationRequest;
use App\Model\City;
use App\Model\Nation;
use App\Repository\NationRepository;

class CityController extends Controller
{
    private $nationRepository;

    public function __construct(NationRepository $nationRepository)
    {
        $this->nationRepository = $nationRepository;
    }

    public function create(Nation $nation)
    {
        return view('city.create', ['nationId' => $nation->id]);
    }

    public function store(Nation $nation,CreateCityRequest $request)
    {
        $params = $request->validated();
        $params['nation_id'] = $nation->id;
        $this->nationRepository->createCity($params);
        return redirect(route('nations.detail', $nation->id))->with('alert-success', 'Successfully');
    }

    public function districts(City $city)
    {
        $districts = $this->nationRepository->districtOfCity($city);
        return view('city.districts', ['districts' => $districts, 'city' => $city]);
    }
}
