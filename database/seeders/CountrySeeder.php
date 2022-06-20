<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Shop;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::factory()->count(8)
            ->has(City::factory()->count(random_int(2,8))
                ->has(Shop::factory()->count(random_int(4,7)))
            )
            ->create();
    }
}
