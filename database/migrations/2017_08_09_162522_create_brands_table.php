<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')->unsigned();
            $table->integer('upload_id')->nullable();
            $table->text('addresses');
            $table->text('phones');
            $table->string('site_link')->nullable();
            $table->string('vk_link');
            $table->boolean('is_federal')->default(0);
            $table->boolean('is_internet_shop')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('brands');
        Schema::enableForeignKeyConstraints();
    }
}
