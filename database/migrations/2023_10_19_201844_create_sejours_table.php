<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sejours', function (Blueprint $table) {
            $table->id();
            $table->date('debut');
            $table->date('fin');
            $table->unsignedBigInteger('voyageur_id')->nullable();
            $table->foreign('voyageur_id')->references('id')->on('voyageurs')->onDelete('cascade');
            $table->unsignedBigInteger('logement_id')->nullable();
            $table->foreign('logement_id')->references('id')->on('logements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sejours');
    }
};
