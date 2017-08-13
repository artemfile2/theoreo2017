<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'name' => 'Nissan',
            'user_id' => 3,
            'addresses' => 'ул. Ленина, 15',
            'phones' => '999-333-33-44',
            'site_link' => 'https://nissan.forever.com',
            'vk_link' => 'https://vk.com/nissan_2017',
        ]);

        DB::table('brands')->insert([
            'name' => 'Якитория',
            'user_id' => 1,
            'addresses' => 'пр-т Свободы, 8',
            'phones' => '999-888-33-44',
            'site_link' => 'https://yakitoriya.ru',
            'vk_link' => 'https://vk.com/95846787',
            'is_federal' => 1,
        ]);

        DB::table('brands')->insert([
            'name' => 'Nike',
            'user_id' => 1,
            'addresses' => 'ул. Гагарина, 140',
            'phones' => '999-888-55-44',
            'site_link' => 'https://nike.com',
            'vk_link' => 'https://vk.com/my_nike',
            'is_federal' => 1,
            'is_internet_shop' => 1,
        ]);

        DB::table('brands')->insert([
            'name' => 'Самсон-фарма',
            'user_id' => 1,
            'addresses' => 'площадь Восстания, 23',
            'phones' => '999-888-00-44',
            'site_link' => 'https://samson-pharma.ru',
            'vk_link' => 'https://vk.com/samson_pharma',
            'is_internet_shop' => 1,
        ]);

        DB::table('brands')->insert([
            'name' => 'Магнит',
            'user_id' => 1,
            'addresses' => 'ул. Самойлова, 34',
            'phones' => '999-345-00-44',
            'site_link' => 'https://magnit-foods.ru',
            'vk_link' => 'https://vk.com/6879080',
        ]);
    }
}
