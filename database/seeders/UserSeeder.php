<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'admin',
            'email'=>'admin@admin.com',
            'phone'=>"123456789",
            'email_verified_at' => now(), 
            'password'=>'password'
        ];

        $user = User::create($admin);

        $user->assignRole('admin');
    }
}
