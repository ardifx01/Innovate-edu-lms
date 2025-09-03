<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $classroom = Classroom::where('class_code', $row['kelas'])->first();

        return new Student([
            'nis' => $row['nis'],
            'nisn' => $row['nisn'],
            'full_name' => $row['nama_lengkap'],
            'classroom_id' => $classroom->id,
            'gender' => ($row['jenis_kelamin'] === 'Laki-laki') ? 'L' : 'P',
            'date_of_birth' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir'])->format('Y-m-d'),
            'place_of_birth' => $row['tempat_lahir'],
            'address' => $row['alamat'],
            'city' => $row['kota'],
            'province' => $row['provinsi'],
            'postal_code' => $row['kode_pos'],
            'country' => $row['negara'],
            'phone_number' => $row['nomor_telepon'],
            'emergency_contact' => $row['kontak_darurat'],
            'email' => $row['email'],
            'religion' => $row['agama'],
            'profile_picture' => null,
            'password' => bcrypt($row['nisn']),
            'role' => 'student',
        ]);


    }
}
