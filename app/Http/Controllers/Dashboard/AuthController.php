<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Dashboard\LoginRequest;

class AuthController extends Controller
{
   /*  protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    } */

    public function showLoginForm()
    {
        return view('dashboard.auth.login');
    }

     public function login(LoginRequest $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('orders.index')->with('success', 'login_success');
        }
        
        return redirect()->back()->with('error', 'login_error');
    } 

  
}

