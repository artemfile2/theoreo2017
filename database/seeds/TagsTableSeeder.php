<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => 'Автомобили',
        ]);

        DB::table('tags')->insert([
            'name' => 'Nissan',
        ]);

        DB::table('tags')->insert([
            'name' => 'Суши',
        ]);

        DB::table('tags')->insert([
            'name' => 'Аптеки',
        ]);

        DB::table('tags')->insert([
            'name' => 'Здоровье',
        ]);

        DB::table('tags')->insert([
            'name' => 'Спорт',
        ]);

        DB::table('tags')->insert([
            'name' => 'Рестораны',
        ]);

        DB::table('tags')->insert([
            'name' => 'Пицца',
        ]);
    }
}
