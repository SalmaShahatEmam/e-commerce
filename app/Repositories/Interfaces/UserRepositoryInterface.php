<?php

namespace App\Repositories\Interfaces;

Interface UserRepositoryInterface
{
    public function register(array $data);
    public function login(array $credentials);
    public function findByEmail($email);
    public function logout();
    
}