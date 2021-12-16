<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(1)->create();
        \App\Models\Role::generateRole();
        \App\Models\UpaZila::generateUpaZila();
        \App\Models\Union::generateUnions();
        \App\Models\User::generateUser();
    }
}
