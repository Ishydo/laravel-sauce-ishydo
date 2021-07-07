<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Stuff;

class StuffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stuff::factory()->count(50)->create();
    }
}
