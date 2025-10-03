<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepo->all();
        return view("panel.user.index", compact("users"));
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit(User $user)
    {

    }

    public function update(User $user)
    {

    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('panel.user.index');
    }
}
