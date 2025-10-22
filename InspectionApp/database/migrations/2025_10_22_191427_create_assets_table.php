<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('property_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('area_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name');
            $table->string('asset_code');
            $table->enum('asset_type', ['building', 'equipment', 'vehicle', 'other'])->default('equipment');
            $table->string('category')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'maintenance', 'retired', 'inactive'])->default('active');
            $table->enum('risk_level', ['low', 'medium', 'high'])->default('low');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('model')->nullable();
            $table->string('serial_number')->nullable();
            $table->date('purchase_date')->nullable();
            $table->date('warranty_expiry')->nullable();
            $table->date('last_service_date')->nullable();
            $table->date('next_service_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['company_id', 'asset_code']);
            $table->index(['company_id', 'property_id', 'area_id']);
            $table->index(['asset_type', 'status']);
            $table->index('risk_level');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
