<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateCommuneRequest;
use App\Http\Requests\CreateDistrictRequest;
use App\Model\City;
use App\Model\District;
use App\Repository\NationRepository;

class CommuneController extends Controller
{
    private $nationRepository;

    public function __construct(NationRepository $nationRepository)
    {
        $this->nationRepository = $nationRepository;
    }

    public function create(District $district)
    {
        return view('commune.create', ['districtId' => $district->id]);
    }

    public function store(District $district,CreateCommuneRequest $request)
    {
        $params = $request->validated();
        $params['district_id'] = $district->id;
        $this->nationRepository->createCommune($params);
        return redirect(route('district.communes', $district->id))->with('alert-success', 'Successfully');
    }
}
