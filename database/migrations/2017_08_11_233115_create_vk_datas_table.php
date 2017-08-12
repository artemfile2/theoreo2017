<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVkDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vk_feeds', function (Blueprint $table) {
            $table->increments('id');//post_id
            $table->integer('group_id');//source_id
            $table->string('group_name')->nullable();//
            $table->string('title')->nullable();//
            $table->text('content');//text
            $table->string('photo_75')->nullable();//attachments->type:photo
            $table->string('photo_130')->nullable();//attachments->type:photo
            $table->string('photo_604')->nullable();//attachments->type:photo
            $table->string('photo_640')->nullable();//attachments->type:photo
            $table->string('photo_807')->nullable();//attachments->type:photo
            $table->string('photo_1280')->nullable();//attachments->type:photo
            $table->string('photo_2560')->nullable();//attachments->type:photo
            $table->string('photo_origin')->nullable();//
            $table->timestamp('post_date');//date
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
        Schema::dropIfExists('vk_feeds');
    }
}
