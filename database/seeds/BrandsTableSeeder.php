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
            'addresses' => 'г. Москва, ул. Ленина, 15',
            'phones' => '999-333-33-44',
            'site_link' => 'https://nissan.forever.com',
            'vk_link' => 'https://vk.com/nissan_2017',
        ]);

        DB::table('brands')->insert([
            'name' => 'Renault',
            'user_id' => 4,
            'addresses' => 'г. Москва, ул. Ленина, 17',
            'phones' => '999-333-33-55',
            'site_link' => 'https://renault.com',
            'vk_link' => 'https://vk.com/renault_2017',
        ]);

        DB::table('brands')->insert([
            'name' => 'Якитория',
            'user_id' => 1,
            'addresses' => 'г. Санкт-Петербург, пр-т Свободы, 8',
            'phones' => '999-888-33-44',
            'site_link' => 'https://yakitoriya.ru',
            'vk_link' => 'https://vk.com/95846787',
            'is_federal' => 1,
        ]);

        DB::table('brands')->insert([
            'name' => 'Смайл',
            'user_id' => 1,
            'addresses' => 'г. Санкт-Петербург, пр-т Людвига Свободы, 18',
            'phones' => '999-777-33-44',
            'site_link' => 'https://smile.ru',
            'vk_link' => 'https://vk.com/9584678789',
            'is_federal' => 1,
        ]);

        DB::table('brands')->insert([
            'name' => 'Nike',
            'user_id' => 1,
            'addresses' => 'г. Москва, ул. Гагарина, 140',
            'phones' => '999-888-55-44',
            'site_link' => 'https://nike.com',
            'vk_link' => 'https://vk.com/my_nike',
            'is_federal' => 1,
            'is_internet_shop' => 1,
        ]);

        DB::table('brands')->insert([
            'name' => 'Adidas',
            'user_id' => 1,
            'addresses' => 'г. Москва, ул. Жукова, 150',
            'phones' => '999-822-55-44',
            'site_link' => 'https://adidas.com',
            'vk_link' => 'https://vk.com/adidas_together',
            'is_internet_shop' => 1,
        ]);

        DB::table('brands')->insert([
            'name' => 'Самсон-фарма',
            'user_id' => 1,
            'addresses' => 'г. Санкт-Петербург, площадь Восстания, 23',
            'phones' => '999-888-00-44',
            'site_link' => 'https://samson-pharma.ru',
            'vk_link' => 'https://vk.com/samson_pharma',
            'is_internet_shop' => 1,
        ]);

        DB::table('brands')->insert([
            'name' => 'Магнит',
            'user_id' => 1,
            'addresses' => 'г. Санкт-Петербург, ул. Самойлова
                            г. Москва, ул. Гагарина, 37',
            'phones' => '999-345-00-44',
            'site_link' => 'https://magnit-foods.ru',
            'vk_link' => 'https://vk.com/6879080',
        ]);
    }
}
