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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inspection_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('generated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->string('report_number')->unique();
            $table->string('title');
            $table->text('summary')->nullable();
            $table->json('sections')->nullable(); // JSON structure of report sections
            $table->string('format')->default('pdf'); // pdf, html, docx
            $table->string('file_path')->nullable();
            $table->string('status')->default('draft'); // draft, pending, completed
            $table->dateTime('generated_at')->nullable();
            $table->json('recipients')->nullable(); // JSON array of email recipients
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
