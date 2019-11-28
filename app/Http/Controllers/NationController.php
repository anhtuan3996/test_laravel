<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreateNationRequest;
use App\Model\Nation;
use App\Repository\NationRepository;

class NationController extends Controller
{
    private $nationRepository;

    public function __construct(NationRepository $nationRepository)
    {
        $this->nationRepository = $nationRepository;
    }

    public function index()
    {
        $nations =  $this->nationRepository->pagination();

        return view('nation.list', ['nations' => $nations]);
    }

    public function detail(Nation $nation)
    {
        $cities = $this->nationRepository->citiesInNation($nation);

        return view('nation.detail', ['nation' => $nation, 'cities' => $cities]);
    }

    public function create()
    {
        return view('nation.create');
    }

    public function store(CreateNationRequest $request)
    {
        $this->nationRepository->create($request->validated());
        return redirect(route('nations'))->with('alert-success', 'Successfully');
    }
}
