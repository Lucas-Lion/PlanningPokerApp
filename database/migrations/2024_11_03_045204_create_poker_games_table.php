<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokerGamesTable extends Migration
{
    public function up()
    {
        Schema::create('poker_games', function (Blueprint $table) {
            $table->id();
            $table->string('caption');
            $table->string('voting_system');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('poker_games');
    }
}