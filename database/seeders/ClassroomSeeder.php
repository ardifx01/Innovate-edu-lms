<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classroom;
use App\Models\User;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teacher1 = User::where('nip', '197703032003123003')->first();
        $teacher2 = User::where('nip', '197804042004124004')->first();
        $teacher3 = User::where('nip', '197805052005125005')->first();

        Classroom::create([
            'class_code' => 'CLASS001',
            'class_name' => 'Class A',
            'grade_level' => '10',
            'homeroom_teacher_id' => $teacher1->id,
        ]);

        Classroom::create([
            'class_code' => 'CLASS002',
            'class_name' => 'Class B',
            'grade_level' => '10',
            'homeroom_teacher_id' => $teacher2->id,
        ]);

        Classroom::create([
            'class_code' => 'CLASS003',
            'class_name' => 'Class C',
            'grade_level' => '10',
            'homeroom_teacher_id' => $teacher3->id,
        ]);
    }
}
