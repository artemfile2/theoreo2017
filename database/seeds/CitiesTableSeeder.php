<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'code' => 'Moscow',
            'name' => 'Москва',
        ]);

        DB::table('cities')->insert([
            'code' => 'St_Petersburg',
            'name' => 'Санкт-Петербург',
        ]);
    }
}
