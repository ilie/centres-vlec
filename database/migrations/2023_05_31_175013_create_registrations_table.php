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
        Schema::create('registrations', function (Blueprint $table) {
            $table->uuid(column: 'id')->unique();
            $table->foreignUuid('exam_date_id');
            $table->foreignUuid('centre_id')->nullable()->default(NULL);
            $table->string('candidate_name');
            $table->string('candidate_surname');
            $table->string('candidate_gender');
            $table->date('candidate_birthdate');
            $table->string('id_number')->nullable(); // DNI
            $table->string('candidate_phone');
            $table->string('candidate_email');
            $table->string('candidate_type')->default('Private'); // External, Internal, Private
            $table->date('payment_date')->nullable()->default(NULL);
            $table->string('payment_method');
            $table->string('speaking_partner')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('locked')->default(false);
            $table->timestamps();

            $table->foreign('exam_date_id')->references('id')->on('exam_dates')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('centre_id')->references('id')->on('centres')->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
