<?php

use Illuminate\Database\Seeder;

class CategoryFilterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_filter')->insert([
            'category_id' => 1,
            'filter_id' => 1,
        ]);

        DB::table('category_filter')->insert([
            'category_id' => 1,
            'filter_id' => 2,
        ]);

        DB::table('category_filter')->insert([
            'category_id' => 1,
            'filter_id' => 3,
        ]);

        DB::table('category_filter')->insert([
            'category_id' => 1,
            'filter_id' => 4,
        ]);

        DB::table('category_filter')->insert([
            'category_id' => 3,
            'filter_id' => 5,
        ]);

        DB::table('category_filter')->insert([
            'category_id' => 3,
            'filter_id' => 6,
        ]);

        DB::table('category_filter')->insert([
            'category_id' => 3,
            'filter_id' => 7,
        ]);

        DB::table('category_filter')->insert([
            'category_id' => 4,
            'filter_id' => 8,
        ]);

        DB::table('category_filter')->insert([
            'category_id' => 4,
            'filter_id' => 9,
        ]);

        DB::table('category_filter')->insert([
            'category_id' => 4,
            'filter_id' => 10,
        ]);

        DB::table('category_filter')->insert([
            'category_id' => 2,
            'filter_id' => 11,
        ]);

        DB::table('category_filter')->insert([
            'category_id' => 2,
            'filter_id' => 12,
        ]);

        DB::table('category_filter')->insert([
            'category_id' => 2,
            'filter_id' => 13,
        ]);

        DB::table('category_filter')->insert([
            'category_id' => 2,
            'filter_id' => 14,
        ]);

        DB::table('category_filter')->insert([
            'category_id' => 2,
            'filter_id' => 15,
        ]);

        DB::table('category_filter')->insert([
            'category_id' => 2,
            'filter_id' => 16,
        ]);

         DB::table('category_filter')->insert([
             'category_id' => 2,
             'filter_id' => 17,
         ]);

        DB::table('category_filter')->insert([
            'category_id' => 2,
            'filter_id' => 18,
        ]);

         DB::table('category_filter')->insert([
             'category_id' => 2,
             'filter_id' => 19,
         ]);

        DB::table('category_filter')->insert([
            'category_id' => 3,
            'filter_id' => 20,
        ]);

         DB::table('category_filter')->insert([
             'category_id' => 3,
             'filter_id' => 21,
         ]);

        DB::table('category_filter')->insert([
            'category_id' => 3,
            'filter_id' => 22,
        ]);

         DB::table('category_filter')->insert([
             'category_id' => 5,
             'filter_id' => 23,
         ]);

        DB::table('category_filter')->insert([
            'category_id' => 5,
            'filter_id' => 24,
        ]);

         DB::table('category_filter')->insert([
             'category_id' => 5,
             'filter_id' => 25,
         ]);

        DB::table('category_filter')->insert([
            'category_id' => 5,
            'filter_id' => 26,
        ]);

         DB::table('category_filter')->insert([
             'category_id' => 5,
             'filter_id' => 27,
         ]);

        DB::table('category_filter')->insert([
            'category_id' => 5,
            'filter_id' => 28,
        ]);
    }
}
