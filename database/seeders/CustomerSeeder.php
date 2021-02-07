<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0 ; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'lastname' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'dateIfBirth' => Carbon::create(1990, rand(1, 12), rand(1, 28), 0, 0),
                'extraNapkins' => (rand(0, 1) == 1),
                'frequentRefill' => (rand(0, 1) == 1),
            ]);
        }
    }
}
