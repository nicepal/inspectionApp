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
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('inspector_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('template_id')->nullable()->constrained()->onDelete('set null');
            $table->string('inspection_number')->unique();
            $table->string('inspection_type'); // fire_safety, structural, compliance, safety_audit, electrical
            $table->dateTime('scheduled_at');
            $table->dateTime('completed_at')->nullable();
            $table->string('status')->default('scheduled'); // scheduled, in_progress, completed, cancelled
            $table->string('result')->nullable(); // pass, fail, conditional, pending
            $table->text('notes')->nullable();
            $table->json('checklist_data')->nullable(); // JSON data from inspection form
            $table->json('attachments')->nullable(); // JSON array of file paths
            $table->decimal('score', 5, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspections');
    }
};
