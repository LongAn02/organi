<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\LoginRegisterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $loginRegisterService;

    public function __construct(
        LoginRegisterService $loginRegisterService
    ) {
        $this->loginRegisterService = $loginRegisterService;
    }

    public function registerUser(
        RegisterRequest $request
    ){
        $this->loginRegisterService->register($request->all());
        return view('login');
    }

    public function loginUser(
        LoginRequest $request
    ) {
        return $this->loginRegisterService->getViewByRole($request->all());
    }

    public function logoutUser()
    {
        Auth::logout();
        return view('login');
    }
}
