<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $defaultPassword = Hash::make('123456');

        User::create([
            'name' => 'System Administrator',
            'email' => 'admin@inspectpilot.com',
            'password' => $defaultPassword,
            'company_id' => null,
            'role' => 'admin',
            'phone' => '+1-555-0001',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'John Smith',
            'email' => 'john.smith@safeguard.com',
            'password' => $defaultPassword,
            'company_id' => 1,
            'role' => 'company_owner',
            'phone' => '+1-555-1001',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Sarah Johnson',
            'email' => 'sarah.johnson@safeguard.com',
            'password' => $defaultPassword,
            'company_id' => 1,
            'role' => 'manager',
            'phone' => '+1-555-1002',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Michael Chen',
            'email' => 'michael.chen@safeguard.com',
            'password' => $defaultPassword,
            'company_id' => 1,
            'role' => 'assessor',
            'phone' => '+1-555-1003',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Emily Davis',
            'email' => 'emily.davis@safeguard.com',
            'password' => $defaultPassword,
            'company_id' => 1,
            'role' => 'field_agent',
            'phone' => '+1-555-1004',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Robert Taylor',
            'email' => 'robert.taylor@buildright.com',
            'password' => $defaultPassword,
            'company_id' => 2,
            'role' => 'company_owner',
            'phone' => '+1-555-2001',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Lisa Anderson',
            'email' => 'lisa.anderson@buildright.com',
            'password' => $defaultPassword,
            'company_id' => 2,
            'role' => 'assessor',
            'phone' => '+1-555-2002',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'David Martinez',
            'email' => 'david.martinez@compliancepro.com',
            'password' => $defaultPassword,
            'company_id' => 3,
            'role' => 'company_owner',
            'phone' => '+1-555-3001',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Jennifer Wilson',
            'email' => 'jennifer.wilson@compliancepro.com',
            'password' => $defaultPassword,
            'company_id' => 3,
            'role' => 'compliance_officer',
            'phone' => '+1-555-3002',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'James Brown',
            'email' => 'james.brown@compliancepro.com',
            'password' => $defaultPassword,
            'company_id' => 3,
            'role' => 'manager',
            'phone' => '+1-555-3003',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);
    }
}
