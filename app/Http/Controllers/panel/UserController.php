<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

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
        return view('panel.user.index', compact("users"));
    }

    public function create()
    {
        return view('panel.user.create');
    }

    public function store(Request $request)
    {
        $this->userRepo->store($request);
        return redirect()->route('panel.user.index');
    }

    public function edit(User $user)
    {
        return view('panel.user.edit', compact("user"));
    }

    public function update(User $user, Request $request)
    {
        $this->userRepo->update($user, $request);
        return redirect()->route('panel.user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('panel.user.index');
    }
}
