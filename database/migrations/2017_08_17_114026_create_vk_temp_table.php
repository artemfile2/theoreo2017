<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVkTempTable extends Migration
{
    /**
     * Run the migrations.
     * Временная таблица
     * Содержит в себе записи из таблицы парсера,
     * только те которые не пустые
     * @return void
     */
    public function up()
    {
        Schema::create('vk_temps', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('group_id');
            $table->string('group_name')->nullable();
            $table->string('title')->nullable();
            $table->text('content');
            $table->string('photo_75')->nullable();
            $table->string('photo_130')->nullable();
            $table->string('photo_604')->nullable();
            $table->string('photo_640')->nullable();
            $table->string('photo_807')->nullable();
            $table->string('photo_1280')->nullable();
            $table->string('photo_2560')->nullable();
            $table->string('photo_origin')->nullable();
            $table->timestamp('post_date');
            $table->text('response_item');
            $table->boolean('status')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vk_temps');
    }
}
