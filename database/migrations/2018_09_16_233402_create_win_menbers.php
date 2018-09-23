<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinMenbers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('win_menbers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('my1_id')->unsigned();
            $table->tinyInteger('my1_star')->unsigned();
            $table->integer('my2_id')->unsigned();
            $table->tinyInteger('my2_star')->unsigned();
            $table->integer('my3_id')->unsigned();
            $table->tinyInteger('my3_star')->unsigned();
            $table->integer('my4_id')->unsigned();
            $table->tinyInteger('my4_star')->unsigned();
            $table->integer('my5_id')->unsigned();
            $table->tinyInteger('my5_star')->unsigned();
            $table->integer('enemy1_id')->unsigned();
            $table->tinyInteger('enemy1_star')->unsigned();
            $table->integer('enemy2_id')->unsigned();
            $table->tinyInteger('enemy2_star')->unsigned();
            $table->integer('enemy3_id')->unsigned();
            $table->tinyInteger('enemy3_star')->unsigned();
            $table->integer('enemy4_id')->unsigned();
            $table->tinyInteger('enemy4_star')->unsigned();
            $table->integer('enemy5_id')->unsigned();
            $table->tinyInteger('enemy5_star')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('password')->nullable();
            $table->integer('env_id')->unsigned();
            $table->string('image');
            $table->timestamps();
            
            // 外部キー制約
            /*$table->foreign('my1_id')->references('id')->on('characters');
            $table->foreign('my2_id')->references('id')->on('characters');
            $table->foreign('my3_id')->references('id')->on('characters');
            $table->foreign('my4_id')->references('id')->on('characters');
            $table->foreign('my5_id')->references('id')->on('characters');
            $table->foreign('enemy1_id')->references('id')->on('characters');
            $table->foreign('enemy2_id')->references('id')->on('characters');
            $table->foreign('enemy3_id')->references('id')->on('characters');
            $table->foreign('enemy4_id')->references('id')->on('characters');
            $table->foreign('enemy5_id')->references('id')->on('characters');
            $table->foreign('env_id')->references('id')->on('environments');
            */
        

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('win_menbers');
    }
}
