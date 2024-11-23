<?php
namespace App\Repositories\Sql;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface{

    public function __construct(protected User $model)
    {
        
    }
    public function register($data)
    {
        $user = $this->model->create($data);

        return $user;
    }

    public function findByEmail($email){
        return $this->model->where('email', $email)->first();
    }

    public function login($data){
        
        $user = $this->findByEmail($data["email"]);

        if (!$user || !Hash::check($data["password"], $user->password)) {
            throw ValidationException::withMessages([
                'email' => [__('The provided credentials are incorrect.')],
            ]);
        }

        return $user;
    }

    public function logout(){
        
        $user = auth()->user();
        $user->currentAccessToken()->delete();
    }
}