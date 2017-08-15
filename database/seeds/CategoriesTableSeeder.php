<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'code' => 'entertainment',
            'name' => 'Развлечения',
        ]);

        DB::table('categories')->insert([
            'code' => 'cafe_restaurantes',
            'name' => 'Кафе/рестораны',
        ]);

        DB::table('categories')->insert([
            'code' => 'сlothing_accessories',
            'name' => 'Одежда и аксессуары',
        ]);

        DB::table('categories')->insert([
            'code' => 'sport_health_beauty',
            'name' => 'Спорт/здоровье/красота',
        ]);

        DB::table('categories')->insert([
            'code' => 'foods',
            'name' => 'Продукты',
        ]);

        DB::table('categories')->insert([
            'code' => 'others',
            'name' => 'Разное',
        ]);
    }
}
