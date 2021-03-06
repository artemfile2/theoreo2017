<?php

use Illuminate\Database\Seeder;

class BrandCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brand_category')->insert([
            'brand_id' => 1,
            'category_id' => 6,
        ]);

        DB::table('brand_category')->insert([
            'brand_id' => 2,
            'category_id' => 2,
        ]);

        DB::table('brand_category')->insert([
            'brand_id' => 3,
            'category_id' => 3,
        ]);

        DB::table('brand_category')->insert([
            'brand_id' => 3,
            'category_id' => 4,
        ]);

        DB::table('brand_category')->insert([
            'brand_id' => 4,
            'category_id' => 4,
        ]);

        DB::table('brand_category')->insert([
            'brand_id' => 5,
            'category_id' => 5,
        ]);
    }
}
