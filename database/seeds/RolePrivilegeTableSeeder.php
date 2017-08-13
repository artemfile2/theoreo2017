<?php

use Illuminate\Database\Seeder;

class RolePrivilegeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 7; $i++) {
            DB::table('role_privilege')->insert([
                'role_id' => 1,
                'privilege_id' => $i,
            ]);
        }

        DB::table('role_privilege')->insert([
            'role_id' => 2,
            'privilege_id' => 1,
        ]);

        DB::table('role_privilege')->insert([
            'role_id' => 2,
            'privilege_id' => 3,
        ]);

        DB::table('role_privilege')->insert([
            'role_id' => 2,
            'privilege_id' => 4,
        ]);

        DB::table('role_privilege')->insert([
            'role_id' => 2,
            'privilege_id' => 6,
        ]);

        DB::table('role_privilege')->insert([
            'role_id' => 2,
            'privilege_id' => 7,
        ]);
    }
}
