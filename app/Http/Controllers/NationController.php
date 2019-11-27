<?php
namespace App\Http\Controllers;

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
}
