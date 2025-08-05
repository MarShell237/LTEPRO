<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('home_team_id')->constrained('teams');
            $table->foreignId('away_team_id')->constrained('teams');
            $table->foreignId('league_id')->constrained('leagues');
            $table->dateTime('date');
            $table->integer('score_home')->nullable();
            $table->integer('score_away')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('matches');
    }
};
