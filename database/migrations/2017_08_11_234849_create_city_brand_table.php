<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('city_brand', function (Blueprint $table) {
            $table->integer('city_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['city_id', 'brand_id'], 'UN_city_brand');
        });

        Schema::table('city_brand', function (Blueprint $table) {
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
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
        Schema::dropIfExists('city_brand');
    }
}
