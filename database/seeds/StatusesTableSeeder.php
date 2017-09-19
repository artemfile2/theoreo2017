<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'code' => 'added',
            'name' => 'Добавлена',
        ]);

        DB::table('statuses')->insert([
            'code' => 'rejected',
            'name' => 'Отклонена',
        ]);

        DB::table('statuses')->insert([
            'code' => 'approved',
            'name' => 'Утверждена',

        ]);

        DB::table('statuses')->insert([
            'code' => 'paid',
            'name' => 'Оплачена',
        ]);
    }
}
