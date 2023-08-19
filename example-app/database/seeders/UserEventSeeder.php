<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;


class UserEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::get();
        $events = Event::get();

        for ($i=1; $i < 21; $i++) { 
            User::find($i)->events()->attach(Event::find($i), [
                'role' => "HOST"
            ]);
        }

    }
}
