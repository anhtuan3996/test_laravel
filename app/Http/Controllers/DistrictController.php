<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateDistrictRequest;
use App\Model\City;
use App\Repository\NationRepository;

class DistrictController extends Controller
{
    private $nationRepository;

    public function __construct(NationRepository $nationRepository)
    {
        $this->nationRepository = $nationRepository;
    }

    public function create(City $city)
    {
        return view('district.create', ['cityId' => $city->id]);
    }

    public function store(City $city,CreateDistrictRequest $request)
    {
        $params = $request->validated();
        $params['city_id'] = $city->id;
        $this->nationRepository->createDistrict($params);
        return redirect(route('city.districts', $city->id))->with('alert-success', 'Successfully');
    }

//    public function districts(City $city)
//    {
//        $districts = $this->nationRepository->districtOfCity($city);
//        return view('city.districts', ['districts' => $districts, 'city' => $city]);
//    }
}
