<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            'user_id' => User::all()->random()->id,
            'license_number' => Str::random(10),
            'vin' => Str::random(10),
            'year' => Integer::random(4),
            'model' => Str::random(10),
            'manufacturer' => Str::random(10),
        ]);
    }
}
