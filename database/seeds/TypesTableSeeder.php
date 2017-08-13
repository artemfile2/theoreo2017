<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'code' => 'action',
            'name' => 'Акция',
        ]);

        DB::table('types')->insert([
            'code' => 'discount',
            'name' => 'Скидка',
        ]);
    }
}
