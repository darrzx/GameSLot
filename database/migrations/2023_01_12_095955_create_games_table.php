<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('gametitle');
            $table->string('gameimage');
            $table->integer('gameprice');
            $table->string('gamedescription', 1000);
            $table->integer('gamepegirating');
            $table->unsignedBigInteger('gamegenre_id');
            $table->timestamps();

            $table->foreign('gamegenre_id')->references('id')->on('game_genres')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
