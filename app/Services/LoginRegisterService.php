<?php

namespace App\Services;

use App\Repositories\RoleUserRepository;
use App\Repositories\ShoppingSessionRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LoginRegisterService
{
    protected $userRepository;
    protected $shoppingSessionRepository;
    protected $roleUserRepository;

    public function __construct(
        UserRepository $userRepository,
        ShoppingSessionRepository $shoppingSessionRepository,
        RoleUserRepository $roleUserRepository
    ) {
        $this->userRepository = $userRepository;
        $this->shoppingSessionRepository = $shoppingSessionRepository;
        $this->roleUserRepository = $roleUserRepository;
    }

    public function register (
        array $data
    ){
        $registerUser = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
            'sex' => $data['sex'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $createUser = $this->userRepository->createUser($registerUser);
        $this->shoppingSessionRepository->createShoppingSession([
            'user_id' => $createUser->id,
        ]);
        $this->roleUserRepository->createRoleUser($createUser->id,4);
    }

    public function login (
        array $data
    ){
        $loginUser = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        if (Auth::attempt($loginUser)) {
            return true;
        }else {
            return false;
        }
    }

    public function getViewByRole (
        array $data
    ){
        array_key_exists('login-admin',$data) ? $checkRole = true : $checkRole = false;
        if ($this->login($data)){
            if ($checkRole) {
                if (Gate::allows('is-admin') || Gate::allows('is-poster')){
                    return redirect()->route('admin.view.home');
                }
                abort(401);
            } else {
                if (Gate::allows('is-user')) {
                    return redirect()->route('user.view.home');
                }
                Auth::logout();
                abort(401);
            }
        } else {
            if ($checkRole){
                return redirect()->route('admin.view.login');
            } else {
                return redirect()->route('user.view.login');
            }
        }
    }
}
