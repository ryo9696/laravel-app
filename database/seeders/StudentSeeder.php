<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'name' => '山田 太郎',
            'age' => 20,
            'email' => 'yamada@example.com',
        ]);

        Student::create([
            'name' => '佐藤 花子',
            'age' => 21,
            'email' => 'sato@example.com',
        ]);
    }
}