<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePrivilegeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('role_privilege', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('privilege_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['role_id', 'privilege_id'], 'UN_role_privilege');
        });

        Schema::table('role_privilege', function (Blueprint $table) {
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreign('privilege_id')
                ->references('id')
                ->on('privilege')
                ->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_privilege');
    }
}
