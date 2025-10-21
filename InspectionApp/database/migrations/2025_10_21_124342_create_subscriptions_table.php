<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->string('plan_name');
            $table->decimal('price', 10, 2);
            $table->enum('billing_cycle', ['monthly', 'yearly']);
            $table->enum('status', ['active', 'cancelled', 'expired', 'trial'])->default('trial');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->date('next_billing_date')->nullable();
            $table->integer('max_users')->default(5);
            $table->integer('max_properties')->default(100);
            $table->integer('max_inspections_per_month')->default(50);
            $table->json('features')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
