<?php

use Illuminate\Database\Seeder;

class FiltersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filters')->insert([
            'group_id' => 1,
            'code' => 'camping',
            'name' => 'Турбазы и отдых на природе',
        ]);

        DB::table('filters')->insert([
            'group_id' => 1,
            'code' => 'children_entertainment',
            'name' => 'Детские развлечения',
        ]);

        DB::table('filters')->insert([
            'group_id' => 1,
            'code' => 'city_entertainment',
            'name' => 'Городские развлечения',
        ]);

        DB::table('filters')->insert([
            'group_id' => 1,
            'code' => 'saunas_swimming_pools',
            'name' => 'Сауны и бассейны',
        ]);

        DB::table('filters')->insert([
            'group_id' => 1,
            'code' => 'clothes',
            'name' => 'Одежда',
        ]);

        DB::table('filters')->insert([
            'group_id' => 1,
            'code' => 'footwear',
            'name' => 'Обувь',
        ]);

        DB::table('filters')->insert([
            'group_id' => 1,
            'code' => 'accessories',
            'name' => 'Аксессуары',
        ]);

        DB::table('filters')->insert([
            'group_id' => 1,
            'code' => 'cosmetics',
            'name' => 'Косметика',
        ]);

        DB::table('filters')->insert([
            'group_id' => 1,
            'code' => 'sport',
            'name' => 'Спорт',
        ]);

        DB::table('filters')->insert([
            'group_id' => 1,
            'code' => 'health',
            'name' => 'Здоровье',
        ]);

        DB::table('filters')->insert([
            'group_id' => 2,
            'code' => 'european',
            'name' => 'Европейская',
        ]);

        DB::table('filters')->insert([
            'group_id' => 2,
            'code' => 'russian',
            'name' => 'Русская',
        ]);

        DB::table('filters')->insert([
            'group_id' => 2,
            'code' => 'italian',
            'name' => 'Итальянская',
        ]);

        DB::table('filters')->insert([
            'group_id' => 2,
            'code' => 'japanese',
            'name' => 'Японская',
        ]);

        DB::table('filters')->insert([
            'group_id' => 2,
            'code' => 'uzbek',
            'name' => 'Узбекская',
        ]);

        DB::table('filters')->insert([
            'group_id' => 2,
            'code' => 'caucasian',
            'name' => 'Кавказская',
        ]);

        DB::table('filters')->insert([
            'group_id' => 3,
            'code' => 'delivery',
            'name' => 'С доставкой',
        ]);

        DB::table('filters')->insert([
            'group_id' => 3,
            'code' => 'in_cafe',
            'name' => 'В кафе',
        ]);

        DB::table('filters')->insert([
            'group_id' => 3,
            'code' => 'round_the_clock',
            'name' => 'Круглосуточно',
        ]);

        DB::table('filters')->insert([
            'group_id' => 4,
            'code' => 'male',
            'name' => 'Мужская',
        ]);

        DB::table('filters')->insert([
            'group_id' => 4,
            'code' => 'female',
            'name' => 'Женская',
        ]);

        DB::table('filters')->insert([
            'group_id' => 4,
            'code' => 'childrens',
            'name' => 'Детская',
        ]);

        DB::table('filters')->insert([
            'group_id' => 5,
            'code' => 'pasta',
            'name' => 'Макаронные изделия',
        ]);

        DB::table('filters')->insert([
            'group_id' => 5,
            'code' => 'spice',
            'name' => 'Специи',
        ]);

        DB::table('filters')->insert([
            'group_id' => 6,
            'code' => 'meat_canned_fish',
            'name' => 'Мясные и рыбные консервы',
        ]);

        DB::table('filters')->insert([
            'group_id' => 6,
            'code' => 'cheeses',
            'name' => 'Сыры',
        ]);

        DB::table('filters')->insert([
            'group_id' => 7,
            'code' => 'pickles',
            'name' => 'Соленья',
        ]);

        DB::table('filters')->insert([
            'group_id' => 7,
            'code' => 'boiled_vegetables',
            'name' => 'Вареные овощи',
        ]);
    }
}
