<?php

use Illuminate\Database\Seeder;

class PrivilegeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privilege')->insert([
            'code' => 'admin_access',
            'name' => 'доступ администратора',
            'description' => 'Доступ в админскую панель.',
        ]);

        DB::table('privilege')->insert([
            'code' => 'brand_management',
            'name' => 'управление брендами',
            'description' => 'Доступ к управлению брендами.',
        ]);

        DB::table('privilege')->insert([
            'code' => 'actions_management',
            'name' => 'управление акциями',
            'description' => 'Доступ к управлению акциями.',
        ]);

        DB::table('privilege')->insert([
            'code' => 'content_moderation',
            'name' => 'модерация контента',
            'description' => 'Доступ к модерации контента.',
        ]);

        DB::table('privilege')->insert([
            'code' => 'users_management',
            'name' => 'управление пользователями',
            'description' => 'Доступ к управлению пользователями.',
        ]);

        DB::table('privilege')->insert([
            'code' => 'search_queries_review',
            'name' => 'просмотр поисковых запросов',
            'description' => 'Доступ к просмотру поисковых запросов.',
        ]);

        DB::table('privilege')->insert([
            'code' => 'parser_logs_review',
            'name' => 'просмотр логов парсера',
            'description' => 'Доступ к просмотру логов парсера.',
        ]);
    }
}
