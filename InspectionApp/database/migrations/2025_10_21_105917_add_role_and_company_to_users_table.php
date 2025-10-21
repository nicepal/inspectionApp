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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('role')->default('assessor'); // admin, company_owner, manager, assessor, field_agent, compliance_officer
            $table->string('phone')->nullable();
            $table->string('status')->default('active'); // active, inactive, pending
            $table->string('avatar')->nullable();
            $table->text('address')->nullable();
            $table->timestamp('last_login_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn(['company_id', 'role', 'phone', 'status', 'avatar', 'address', 'last_login_at']);
        });
    }
};
