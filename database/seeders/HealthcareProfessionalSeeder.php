<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HealthcareProfessional;

class HealthcareProfessionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Dr. Neha Jain', 'specialty' => 'Cardiologist'],
            ['name' => 'Dr. Neeraj Patel', 'specialty' => 'Dermatologist'],
            ['name' => 'Dr. Reeta Sharma', 'specialty' => 'Neurologist'],
            ['name' => 'Dr. Sameer Thanker', 'specialty' => 'Pediatrician'],
            ['name' => 'Dr. Nilay Mehta', 'specialty' => 'General Physician'],
        ];

        foreach ($data as $item) {
            HealthcareProfessional::create($item);
        }
    }
}
