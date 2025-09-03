<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Classroom;
use App\Models\User;

class ClassroomsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $teacher = User::where('nip', $row['teacher_code'])->first();

        if ($teacher) {
            return new Classroom([
                'class_code' => $row['class_code'],
                'class_name' => $row['class_name'],
                'grade_level' => $row['grade_level'],
                'homeroom_teacher_id' => $teacher->id,
            ]);
        }

        return null;
    }
}
