<?php
namespace App\Http\Controllers;

use App\Repository\UserRepository;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users =  $this->userRepository->pagination();

        return view('user.list', ['users' => $users]);
    }
}
