<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('country')->nullable();
            $table->foreignId('league_id')->nullable()->constrained('leagues');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('teams');
    }
};
