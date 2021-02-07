<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(OrderSeeder::class);
        $this->call(DishSeeder::class);
        $this->call(CustomerSeeder::class);
    }
}
