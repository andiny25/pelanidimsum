<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class CreatePelangganDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $data = [];
        for ($i = 0; $i < 1000; $i++) {
            $data[] = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'birthday' => $faker->date('Y-m-d', '-18 years'), // Assume minimum age of 18
                'gender' => $faker->randomElement(['Male', 'Female']),
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->unique()->numerify('08##########'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('pelanggan')->insert($data);
    }
}
