<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'code' => 'admin',
            'name' => 'админ',
        ]);

        DB::table('roles')->insert([
            'code' => 'moder',
            'name' => 'модератор',
        ]);

        DB::table('roles')->insert([
            'code' => 'client',
            'name' => 'клиент',
        ]);
    }
}
