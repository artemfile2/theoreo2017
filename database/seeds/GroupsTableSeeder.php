<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'code' => 'by_sight',
            'name' => 'По виду',
        ]);

        DB::table('groups')->insert([
            'code' => 'kitchens',
            'name' => 'Кухни',
        ]);

        DB::table('groups')->insert([
            'code' => 'services',
            'name' => 'Услуги',
        ]);

        DB::table('groups')->insert([
            'code' => 'by_gender',
            'name' => 'По полу',
        ]);

        DB::table('groups')->insert([
            'code' => 'grocery',
            'name' => 'Бакалея',
        ]);

        DB::table('groups')->insert([
            'code' => 'gastronomy',
            'name' => 'Гастрономия',
        ]);

        DB::table('groups')->insert([
            'code' => 'cookery',
            'name' => 'Кулинария',
        ]);
    }
}
