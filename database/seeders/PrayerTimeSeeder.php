<?php

namespace Database\Seeders;

use App\Models\PrayerTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrayerTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      PrayerTime::create();
    }
}
