<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryFilterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('category_filter', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->integer('filter_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['category_id', 'filter_id'], 'UN_category_filter');
        });

        Schema::table('category_filter', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('filter_id')
                ->references('id')
                ->on('filters')
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
        Schema::dropIfExists('category_filter');
    }
}
