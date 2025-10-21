<?php

namespace Database\Seeders;

use App\Models\InspectionType;
use Illuminate\Database\Seeder;

class InspectionTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            [
                'name' => 'Fire Safety Inspection',
                'description' => 'Comprehensive fire safety and prevention inspection',
                'color' => '#e74c3c',
                'is_system' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Risk Assessment',
                'description' => 'General risk assessment and hazard identification',
                'color' => '#f39c12',
                'is_system' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Property Survey',
                'description' => 'Detailed property condition survey and assessment',
                'color' => '#3498db',
                'is_system' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Compliance Check',
                'description' => 'Regulatory compliance verification',
                'color' => '#2ecc71',
                'is_system' => true,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Safety Audit',
                'description' => 'Health and safety audit inspection',
                'color' => '#9b59b6',
                'is_system' => true,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Maintenance Check',
                'description' => 'Routine maintenance and equipment check',
                'color' => '#1abc9c',
                'is_system' => true,
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($types as $type) {
            InspectionType::create($type);
        }
    }
}
