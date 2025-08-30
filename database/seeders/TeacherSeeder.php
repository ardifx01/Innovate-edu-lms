<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    // Akun operator
    User::create([
        'nip' => '198501012008012001',
        'email' => 'admin@example.com',
        'first_name' => 'Budi',
        'last_name' => 'Prabowo',
        'degree' => 'S.Kom',
        'password' => bcrypt('password'),
        'role' => 'operator',
    ]);

    // Guru tetap (manual)
    User::create([
        'nip' => '197702022002122002',
        'email' => 'teacher1@example.com',
        'first_name' => 'Siti',
        'last_name' => 'Rahmawati',
        'degree' => 'S.Pd',
        'password' => bcrypt('password'),
        'role' => 'teacher',
    ]);

    User::create([
        'nip' => '198312212005012002',
        'email' => 'teacher2@example.com',
        'first_name' => 'Ahmad',
        'last_name' => 'Suhada',
        'degree' => 'M.Pd',
        'password' => bcrypt('password'),
        'role' => 'teacher',
    ]);

    User::create([
        'nip' => '198904032006042002',
        'email' => 'teacher3@example.com',
        'first_name' => 'Dewi',
        'last_name' => 'Mulia',
        'degree' => 'S.Sos',
        'password' => bcrypt('password'),
        'role' => 'teacher',
    ]);

    User::create([
        'nip' => '199001022007042002',
        'email' => 'teacher4@example.com',
        'first_name' => 'Rudi',
        'last_name' => 'Santoso',
        'degree' => 'S.T',
        'password' => bcrypt('password'),
        'role' => 'teacher',
    ]);

    User::create([
        'nip' => '199305152008122002',
        'email' => 'teacher5@example.com',
        'first_name' => 'Lina',
        'last_name' => 'Sari',
        'degree' => 'S.E',
        'password' => bcrypt('password'),
        'role' => 'teacher',
    ]);
}

}
