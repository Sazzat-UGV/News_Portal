<?php

namespace Database\Seeders;

use App\Models\Livetv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivetvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Livetv::create();
    }
}
