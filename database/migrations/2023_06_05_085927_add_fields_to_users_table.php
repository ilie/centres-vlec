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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignUuid('centre_id')->nullable()->default(NULL)->after('id');
            $table->boolean('is_admin')->after('centre_id');
            $table->foreign('centre_id')->references('id')->on('centres')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['centre_id']);
            $table->dropColumn('centre_id');
            $table->dropColumn('is_admin');
        });
    }
};
