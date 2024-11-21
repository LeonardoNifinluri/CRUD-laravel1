<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::factory()->create([
            'student_name' => 'Farhan',
            'student_id' => 'D121221032',
            'department_id' => 1,
            'student_address' => 'Gowa',
        ]);
    }
}
