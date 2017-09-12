<?php

use Illuminate\Database\Seeder;

class ActionTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('action_tag')->insert([
            'action_id' => 1,
            'tag_id' => 1,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 1,
            'tag_id' => 2,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 2,
            'tag_id' => 1,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 2,
            'tag_id' => 9,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 2,
            'tag_id' => 10,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 3,
            'tag_id' => 6,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 3,
            'tag_id' => 11,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 4,
            'tag_id' => 6,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 4,
            'tag_id' => 11,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 5,
            'tag_id' => 3,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 5,
            'tag_id' => 7,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 5,
            'tag_id' => 8,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 6,
            'tag_id' => 7,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 6,
            'tag_id' => 8,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 7,
            'tag_id' => 4,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 7,
            'tag_id' => 5,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 8,
            'tag_id' => 4,
        ]);

        DB::table('action_tag')->insert([
            'action_id' => 8,
            'tag_id' => 5,
        ]);
    }
}
