<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create superuser
        User::create([
            'name' => 'Admin Name',
            'email' => 'admin@gmail.com',
            'primary_phone' => '01700000000',
            'secondary_phone' => '01500000000',
            'address' => 'Admin Address',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@gmail.com'),
            'remember_token' => Str::random(10),
            'is_admin'=>true,
        ]);
    }
}
