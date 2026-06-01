<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->integer('order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->nullable()->constrained('modules')->nullOnDelete();
            $table->enum('type', ['latihan','quiz','evaluasi'])->default('latihan');
            $table->text('question');
            $table->string('option_a');
            $table->string('option_b');
            $table->string('option_c');
            $table->string('option_d');
            $table->char('correct_answer', 1);
            $table->text('explanation')->nullable();
            $table->timestamps();
        });
        Schema::create('assessment_results', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->index();
            $table->string('student_name')->nullable();
            $table->foreignId('module_id')->nullable()->constrained('modules')->nullOnDelete();
            $table->enum('type', ['quiz','evaluasi']);
            $table->integer('score');
            $table->integer('correct_count');
            $table->integer('total_questions');
            $table->json('answers')->nullable();
            $table->timestamps();
            $table->unique(['session_id','module_id','type']);
        });
        Schema::create('module_progress', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->index();
            $table->foreignId('module_id')->constrained('modules')->cascadeOnDelete();
            $table->boolean('latihan_completed')->default(false);
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->unique(['session_id','module_id']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('module_progress');
        Schema::dropIfExists('assessment_results');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('modules');
    }
};
