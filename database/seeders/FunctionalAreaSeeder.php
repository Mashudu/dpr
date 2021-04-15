<?php

namespace Database\Seeders;

use App\Models\FunctionalArea;
use Illuminate\Database\Seeder;

class FunctionalAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        FunctionalArea::factory()->times(10)->create();
    }
}
