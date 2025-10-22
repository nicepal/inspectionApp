<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asset_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained()->onDelete('cascade');
            $table->foreignId('uploaded_by')->constrained('users')->onDelete('cascade');
            $table->string('file_path');
            $table->string('file_name');
            $table->string('file_type');
            $table->integer('file_size');
            $table->string('description')->nullable();
            $table->enum('file_category', ['manual', 'warranty', 'invoice', 'inspection_report', 'other'])->default('other');
            $table->timestamps();
            
            $table->index(['asset_id', 'file_category']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asset_files');
    }
};
