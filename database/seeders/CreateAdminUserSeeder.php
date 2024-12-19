<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Bas',
            'email' => 'bas@huisverkopen.nl',
            'password' => Hash::make('Bb1234sG'),
        ]);
    }
} 