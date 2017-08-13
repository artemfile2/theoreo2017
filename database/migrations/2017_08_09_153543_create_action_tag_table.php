<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('action_tag', function (Blueprint $table) {
            $table->integer('action_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['action_id', 'tag_id'], 'UN_action_tag');
        });

        Schema::table('action_tag', function (Blueprint $table) {
            $table->foreign('action_id')
                ->references('id')
                ->on('actions')
                ->onDelete('cascade');

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
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
        Schema::dropIfExists('action_tag');
    }
}
