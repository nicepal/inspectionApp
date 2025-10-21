<?php

namespace Database\Seeders;

use App\Models\Template;
use App\Models\User;
use Illuminate\Database\Seeder;

class TemplateCenterSeeder extends Seeder
{
    public function run(): void
    {
        $adminUser = User::where('email', 'admin@inspectpilot.com')->first();

        $publicTemplates = [
            [
                'name' => 'Fire Safety Inspection',
                'category' => 'fire_safety',
                'description' => 'Comprehensive fire safety inspection checklist for commercial properties',
                'fields' => [
                    ['name' => 'Fire Extinguishers', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Smoke Detectors', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Emergency Exits', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Fire Alarm System', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Sprinkler System', 'type' => 'checkbox', 'required' => false],
                    ['name' => 'Emergency Lighting', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Fire Doors', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Additional Notes', 'type' => 'textarea', 'required' => false],
                ],
            ],
            [
                'name' => 'Electrical Safety Inspection',
                'category' => 'electrical',
                'description' => 'Standard electrical safety inspection template',
                'fields' => [
                    ['name' => 'Circuit Breakers', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Wiring Condition', 'type' => 'select', 'required' => true, 'options' => ['Excellent', 'Good', 'Fair', 'Poor']],
                    ['name' => 'Grounding System', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Panel Labels', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'GFCI Outlets', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Electrical Notes', 'type' => 'textarea', 'required' => false],
                ],
            ],
            [
                'name' => 'Building Compliance Check',
                'category' => 'compliance',
                'description' => 'General building code compliance inspection',
                'fields' => [
                    ['name' => 'Building Permits', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Occupancy Certificate', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Zoning Compliance', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'ADA Compliance', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Safety Signage', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Compliance Notes', 'type' => 'textarea', 'required' => false],
                ],
            ],
            [
                'name' => 'Structural Integrity Assessment',
                'category' => 'structural',
                'description' => 'Structural inspection template for buildings',
                'fields' => [
                    ['name' => 'Foundation', 'type' => 'select', 'required' => true, 'options' => ['Excellent', 'Good', 'Concerns', 'Critical']],
                    ['name' => 'Walls', 'type' => 'select', 'required' => true, 'options' => ['Excellent', 'Good', 'Concerns', 'Critical']],
                    ['name' => 'Roof Structure', 'type' => 'select', 'required' => true, 'options' => ['Excellent', 'Good', 'Concerns', 'Critical']],
                    ['name' => 'Floors', 'type' => 'select', 'required' => true, 'options' => ['Excellent', 'Good', 'Concerns', 'Critical']],
                    ['name' => 'Cracks or Damage', 'type' => 'textarea', 'required' => false],
                    ['name' => 'Structural Notes', 'type' => 'textarea', 'required' => false],
                ],
            ],
            [
                'name' => 'Environmental Assessment',
                'category' => 'environmental',
                'description' => 'Environmental inspection for hazards and compliance',
                'fields' => [
                    ['name' => 'Asbestos Check', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Lead Paint Check', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Mold Inspection', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Air Quality', 'type' => 'select', 'required' => true, 'options' => ['Good', 'Acceptable', 'Poor']],
                    ['name' => 'Water Quality', 'type' => 'select', 'required' => false, 'options' => ['Good', 'Acceptable', 'Poor']],
                    ['name' => 'Environmental Notes', 'type' => 'textarea', 'required' => false],
                ],
            ],
            [
                'name' => 'Workplace Safety Audit',
                'category' => 'safety_audit',
                'description' => 'Comprehensive workplace safety audit template',
                'fields' => [
                    ['name' => 'PPE Availability', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Emergency Procedures', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'First Aid Kits', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Safety Training Records', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Hazard Communication', 'type' => 'checkbox', 'required' => true],
                    ['name' => 'Machine Guards', 'type' => 'checkbox', 'required' => false],
                    ['name' => 'Safety Notes', 'type' => 'textarea', 'required' => false],
                ],
            ],
        ];

        foreach ($publicTemplates as $templateData) {
            Template::create([
                'company_id' => null,
                'created_by' => $adminUser ? $adminUser->id : 1,
                'name' => $templateData['name'],
                'category' => $templateData['category'],
                'description' => $templateData['description'],
                'fields' => $templateData['fields'],
                'is_public' => true,
                'is_active' => true,
                'status' => 'active',
                'usage_count' => rand(10, 100),
            ]);
        }
    }
}
