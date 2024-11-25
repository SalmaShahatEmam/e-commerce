<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\Api\SignInRequest;
use App\Http\Requests\Api\SignUpRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;

class AuthController extends Controller
{
    use ApiResponse;

    public function __construct(protected UserRepositoryInterface $userRepo)
    {

    }

    public function SignUp(SignUpRequest $request)
    {
        $data = $request->only(["name","phone","email","password"]);

        $user = $this->userRepo->register($data);

        $user->assignRole('user');

        $token = $user->generateToken($request->device_id);

        return $this->response(
            [
                'user' => new UserResource($user),
                'token' => $token
            ],
            __("sign up successfully"),
            200
        );
    }

    public function SignIn(SignInRequest $request)
    {
        $data = $request->only(['email','password']);

        $user = $this->userRepo->login($data);

        $token = $user->generateToken($request->device_id);

        return $this->response(
            [
                'user' => new UserResource($user),
                'token' => $token
            ],
            __("sign up successfully"),
            200
        );
    }

    public function logout(){

        $user = $this->userRepo->logout();
        
        return $this->response(null , __("logged out successfully") , 200);
    }
}
