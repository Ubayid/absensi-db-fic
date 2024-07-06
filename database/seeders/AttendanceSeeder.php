<?php

namespace Database\Seeders;

use App\Models\attendance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //data dummy dor attendance auto generate
        attendance::factory(20)->create();
    }
}
