<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateSuperAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Dhea',
            'email' => 'dhea23si@mahasiswa.pcr.ac.id',
            'password' => Hash::make('dhea'),
            'role' => 'Super Admin',
        ]);
    }
}
