<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('statuses')->truncate();
        Status::create(['name' => 'Complete']);
        Status::create(['name' => 'In-Progress']);
        Status::create(['name' => 'In-Hypercacre']);
        Status::create(['name' => 'To-Do']);
        Status::create(['name' => 'Backlog']);
    }
}
