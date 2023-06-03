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
        Schema::create('centres', function (Blueprint $table) {
            $table->uuid(column: 'id')->unique();
            $table->string('comercia_name')->index();
            $table->string('comercia_email')->index();
            $table->foreignId('contact_person')->nullable();
            $table->string('fiscal_name');
            $table->string('nif');
            $table->string('fiscal_email');
            $table->string('address');
            $table->string('postal_code');
            $table->string('city');
            $table->string('phone');
            $table->boolean('sepa');
            $table->string('payment_method'); // Payment_method: Transferencia, Recibo bancario
            $table->foreignUuid('bank_account')->nullable()->default(NULL);
            $table->timestamps();

            $table->foreign('contact_person')->references('id')->on('users')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('bank_account')->references('id')->on('bank_accounts')->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centres');
    }
};
