<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams');
            $table->string('name');
            $table->string('position')->nullable();
            $table->string('photo')->nullable();
            $table->json('stats')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('players');
    }
};
