<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create a user
        $user = User::create([
            'firstName' => 'pavan',
            'lastName' => 'seller',
            'mobile' => "+918341837776-1",
            'email' => 'seller@gmail.com',
            'password' => bcrypt('password'),
            'userType' => 'seller',
        ]);

        // create a user
        $user = User::create([
            'firstName' => 'pavan',
            'lastName' => 'buyer',
            'mobile' => "+918341837776-2",
            'email' => 'buyer@gmail.com',
            'password' => bcrypt('password'),
            'userType' => 'buyer',
        ]);
    }
}
