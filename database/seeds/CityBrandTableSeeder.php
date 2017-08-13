<?php

use Illuminate\Database\Seeder;

class CityBrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('city_brand')->insert([
            'city_id' => 1,
            'brand_id' => 1,
        ]);

        DB::table('city_brand')->insert([
            'city_id' => 2,
            'brand_id' => 1,
        ]);

        DB::table('city_brand')->insert([
            'city_id' => 1,
            'brand_id' => 2,
        ]);

        DB::table('city_brand')->insert([
            'city_id' => 2,
            'brand_id' => 2,
        ]);

        DB::table('city_brand')->insert([
            'city_id' => 2,
            'brand_id' => 3,
        ]);

        DB::table('city_brand')->insert([
            'city_id' => 1,
            'brand_id' => 4,
        ]);

        DB::table('city_brand')->insert([
            'city_id' => 2,
            'brand_id' => 5,
        ]);

        DB::table('city_brand')->insert([
            'city_id' => 1,
            'brand_id' => 5,
        ]);
    }
}
