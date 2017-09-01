<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('actions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('brand_id')->unsigned();
            $table->integer('upload_id')->nullable();
            $table->integer('status_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->text('addresses')->nullable();
            $table->text('phones')->nullable();
            $table->text('description');
            $table->string('shop_link')->nullable();
            $table->date('active_from');
            $table->date('active_to');
            $table->integer('rating')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('actions', function (Blueprint $table) {
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');

            $table->foreign('status_id')
                ->references('id')
                ->on('statuses');

            $table->foreign('type_id')
                ->references('id')
                ->on('types');

            $table->foreign('city_id')
                ->references('id')
                ->on('cities');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('actions');
        Schema::enableForeignKeyConstraints();
    }
}
