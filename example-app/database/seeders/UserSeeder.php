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
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make("password");
        $user->role = "ADMIN";
        $user->save();

        $user = new User();
        $user->name = 'Test_Account01';
        $user->email = 'test01@gmail.com';
        $user->password = Hash::make("password");
        $user->year = fake()->numberBetween(1,8);
        $user->save();

        $user = new User();
        $user->name = 'Test_Account02';
        $user->email = 'test02@gmail.com';
        $user->password = Hash::make("password");
        $user->year = fake()->numberBetween(1,8);
        $user->save();

        $user = User::factory()->count(50)->create();

        $user = new User();
        $user->name = 'BoostChavit';
        $user->email = 'chavit.si@ku.th';
        $user->password = Hash::make("password");
        $user->year = 3;
        $user->save();

        $user = new User();
        $user->name = 'oOTEEOo';
        $user->email = 'thanadon.kr@ku.th';
        $user->password = Hash::make("password");
        $user->year = 3;
        $user->save();

        $user = new User();
        $user->name = 'ThanadonMhp';
        $user->email = 'thanadon.mah@ku.th';
        $user->password = Hash::make("password");
        $user->year = 3;
        $user->save();
    }
}
