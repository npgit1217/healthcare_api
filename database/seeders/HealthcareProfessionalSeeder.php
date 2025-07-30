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
            ['name' => 'Dr. Aditi Sharma', 'specialty' => 'Cardiologist'],
            ['name' => 'Dr. Neeraj Patel', 'specialty' => 'Dermatologist'],
            ['name' => 'Dr. Reena Verma', 'specialty' => 'Neurologist'],
            ['name' => 'Dr. Sameer Khan', 'specialty' => 'Pediatrician'],
            ['name' => 'Dr. Shweta Singh', 'specialty' => 'General Physician'],
        ];

        foreach ($data as $item) {
            HealthcareProfessional::create($item);
        }
    }
}
