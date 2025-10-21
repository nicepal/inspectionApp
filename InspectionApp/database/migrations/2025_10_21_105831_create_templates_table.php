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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('category'); // fire_safety, structural, compliance, safety_audit, electrical, environmental
            $table->text('description')->nullable();
            $table->json('fields'); // JSON structure of form fields
            $table->boolean('is_public')->default(false); // public templates in Template Center
            $table->boolean('is_active')->default(true);
            $table->integer('usage_count')->default(0);
            $table->string('status')->default('active'); // active, archived, draft
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
