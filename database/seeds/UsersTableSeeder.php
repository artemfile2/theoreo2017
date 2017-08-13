<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'login' => 'admin',
            'password' => bcrypt('admin'),
            'name' => 'Админ',
            'surname' => 'Иванов',
            'role_id' => 1,
            'gender' => 'male',
        ]);

        DB::table('users')->insert([
            'login' => 'moder',
            'password' => bcrypt('moder'),
            'name' => 'Модер',
            'surname' => 'Сидоров',
            'role_id' => 2,
            'gender' => 'male',
        ]);

        DB::table('users')->insert([
            'login' => 'nissan',
            'password' => bcrypt('nissan'),
            'name' => 'Клиент',
            'surname' => 'Петров',
            'role_id' => 3,
            'gender' => 'female',
        ]);
    }
}
