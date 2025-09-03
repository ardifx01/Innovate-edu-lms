<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Classroom;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classA = Classroom::where('class_code', 'CLASS001')->first();
        $classB = Classroom::where('class_code', 'CLASS002')->first();

        // Creating students
        Student::create([
            'nis' => '00123456',
            'nisn' => '00654321',
            'full_name' => 'Aldo Prasetyo',
            'classroom_id' => $classA->id,
            'gender' => 'L',
            'email' => 'aldo.prasetyo@example.com',
            'password' => bcrypt('password'),
        ]);

        Student::create([
            'nis' => '00123457',
            'nisn' => '00654322',
            'full_name' => 'Siti Nurjanah',
            'classroom_id' => $classA->id,
            'gender' => 'P',
            'email' => 'siti.nurjanah@example.com',
            'password' => bcrypt('password'),
        ]);

        Student::create([
            'nis' => '00123458',
            'nisn' => '00654323',
            'full_name' => 'Budi Santoso',
            'classroom_id' => $classB->id,
            'gender' => 'L',
            'email' => 'budi.santoso@example.com',
            'password' => bcrypt('password'),
        ]);

        Student::create([
            'nis' => '00123459',
            'nisn' => '00654324',
            'full_name' => 'Dewi Lestari',
            'classroom_id' => $classB->id,
            'gender' => 'P',
            'email' => 'dewi.lestari@example.com',
            'password' => bcrypt('password'),
        ]);

        Student::create([
            'nis' => '00123460',
            'nisn' => '00654325',
            'full_name' => 'Rizky Firmansyah',
            'classroom_id' => $classA->id,
            'gender' => 'L',
            'email' => 'rizky.firmansyah@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
