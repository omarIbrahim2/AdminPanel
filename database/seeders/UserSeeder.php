<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "Fname" => "Omar",
            "lname" => "Ibrahim",
            "email" => "omar12@gmail.com",
            "ipAdress" => "127.0.0.1",
            "password" => Hash::make('12345678'),
        ]);

       User::factory()->count(10)->create();
  

      
    }
}
