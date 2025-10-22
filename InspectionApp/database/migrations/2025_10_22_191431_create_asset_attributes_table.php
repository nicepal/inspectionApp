<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asset_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained()->onDelete('cascade');
            $table->string('attribute_key');
            $table->text('attribute_value')->nullable();
            $table->enum('data_type', ['text', 'number', 'date', 'boolean'])->default('text');
            $table->timestamps();
            
            $table->index(['asset_id', 'attribute_key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asset_attributes');
    }
};
