<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('modules', function (Blueprint $table) {
            if (! Schema::hasColumn('modules', 'video_url')) {
                $table->string('video_url')->nullable()->after('image');
            }
        });

        Schema::table('assessment_results', function (Blueprint $table) {
            if (! Schema::hasColumn('assessment_results', 'user_id')) {
                $table->foreignId('user_id')->nullable()->after('id')->constrained('users')->nullOnDelete();
            }
        });

        Schema::table('module_progress', function (Blueprint $table) {
            if (! Schema::hasColumn('module_progress', 'user_id')) {
                $table->foreignId('user_id')->nullable()->after('id')->constrained('users')->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('module_progress', function (Blueprint $table) {
            if (Schema::hasColumn('module_progress', 'user_id')) {
                $table->dropConstrainedForeignId('user_id');
            }
        });

        Schema::table('assessment_results', function (Blueprint $table) {
            if (Schema::hasColumn('assessment_results', 'user_id')) {
                $table->dropConstrainedForeignId('user_id');
            }
        });

        Schema::table('modules', function (Blueprint $table) {
            if (Schema::hasColumn('modules', 'video_url')) {
                $table->dropColumn('video_url');
            }
        });
    }
};