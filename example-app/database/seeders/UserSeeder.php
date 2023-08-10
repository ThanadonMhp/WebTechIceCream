<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Test_Account01';
        $user->email = 'test01@gmail.com';
        $user->password = Hash::make("password");
        $user->certificate = fake()->realTextBetween(10, 20, 5);
        $user->year = fake()->numberBetween(1,8);
        $user->save();

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make("password");
        $user->role = "ADMIN";
        $user->save();

        $user = User::factory()->count(10)->create();
    }
}
