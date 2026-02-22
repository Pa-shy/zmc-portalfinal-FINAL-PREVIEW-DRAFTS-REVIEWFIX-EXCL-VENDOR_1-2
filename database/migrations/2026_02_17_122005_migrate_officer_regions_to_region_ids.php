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
        Schema::table('officer_regions', function (Blueprint $table) {
            $table->foreignId('region_id')->nullable()->constrained('regions')->after('user_id');
        });

        // Drop unique index on [user_id, region]
        Schema::table('officer_regions', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'region']);
        });

        // Drop enum column
        Schema::table('officer_regions', function (Blueprint $table) {
            $table->dropColumn('region');
        });

        // Add new unique index
        Schema::table('officer_regions', function (Blueprint $table) {
            $table->unique(['user_id', 'region_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('officer_regions', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'region_id']);
            $table->enum('region', ['harare', 'bulawayo', 'mutare', 'masvingo'])->after('user_id');
            $table->dropConstrainedForeignId('region_id');
            $table->unique(['user_id', 'region']);
        });
    }
};
