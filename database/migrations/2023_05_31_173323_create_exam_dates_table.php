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
        Schema::create('exam_dates', function (Blueprint $table) {
            $table->uuid(column: 'id')->unique();
            $table->enum('type', ['PB', 'CB']);
            $table->string('exam', 50);
            $table->date('exam_date');
            $table->string('speaking_date')->nullable();
            $table->string('location', 50);
            $table->date('deadline');
            $table->date('cambridge_deadline');
            $table->date('results_date');
            $table->date('certificates_date');
            $table->decimal('price', 8, 2);
            $table->enum('state', ['Próximamente', 'Abierta', 'Consultar', 'Cerrada']);
            $table->foreignUuid('internal_state')->nullable()->default(NULL);
            $table->boolean('is_public');
            $table->timestamps();

            $table->foreign('internal_state')->references('id')->on('internal_states')->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_dates');
    }
};
