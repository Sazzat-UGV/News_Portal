<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $division = [
            'Barishal' => 'বরিশাল',
            'Chattogram' => 'চট্টগ্রাম',
            'Dhaka' => 'ঢাকা',
            'Khulna' => 'খুলনা',
            'Rajshahi' => 'রাজশাহী',
            'Rangpur' => 'রংপুর',
            'Mymensingh' => 'ময়মনসিংহ',
            'Sylhet' => 'সিলেট',
        ];
        foreach ($division as $key => $value) {
            Division::create([
                'division_name_en' => $key,
                'division_name_bn' => $value,
            ]);
        }
    }
}
