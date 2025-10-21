<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::create([
            'name' => 'SafeGuard Inspections Inc.',
            'industry_type' => 'Fire Safety',
            'address' => '123 Main Street',
            'city' => 'New York',
            'state' => 'NY',
            'postal_code' => '10001',
            'country' => 'USA',
            'phone' => '+1-555-0100',
            'email' => 'contact@safeguard.com',
            'website' => 'https://safeguard.com',
            'description' => 'Leading fire safety and compliance inspection company',
            'status' => 'active',
            'subscription_plan' => 'enterprise',
            'subscription_expires_at' => now()->addYear(),
        ]);

        Company::create([
            'name' => 'BuildRight Assessments',
            'industry_type' => 'Structural Engineering',
            'address' => '456 Oak Avenue',
            'city' => 'Los Angeles',
            'state' => 'CA',
            'postal_code' => '90001',
            'country' => 'USA',
            'phone' => '+1-555-0200',
            'email' => 'info@buildright.com',
            'website' => 'https://buildright.com',
            'description' => 'Structural inspection and building assessment specialists',
            'status' => 'active',
            'subscription_plan' => 'monthly',
            'subscription_expires_at' => now()->addMonth(),
        ]);

        Company::create([
            'name' => 'Compliance Pro Services',
            'industry_type' => 'Compliance & Regulatory',
            'address' => '789 Elm Street',
            'city' => 'Chicago',
            'state' => 'IL',
            'postal_code' => '60601',
            'country' => 'USA',
            'phone' => '+1-555-0300',
            'email' => 'hello@compliancepro.com',
            'website' => 'https://compliancepro.com',
            'description' => 'Comprehensive compliance and regulatory inspection services',
            'status' => 'active',
            'subscription_plan' => 'annual',
            'subscription_expires_at' => now()->addYear(),
        ]);
    }
}
