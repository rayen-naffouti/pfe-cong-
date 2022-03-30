<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(10)->create();
        \App\Models\TypeFonction::factory(10)->create();
        \App\Models\Natureagent::factory(10)->create();
        \App\Models\Conge::factory(10)->create();
        \App\Models\Cconge::factory(10)->create();
        \App\Models\NatureConge::factory(3)->create();
        \App\Models\Natabse::factory(10)->create();
        \App\Models\H52_MvtPointageBrut::factory(10)->create();
        \App\Models\Personnel::factory(10)->create();
        \App\Models\Absence::factory(60)->create();
    }
}
