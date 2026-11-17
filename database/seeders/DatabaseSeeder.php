<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ridho Norfajar',
            'email' => 'ridhonorfajar@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '+62 8xx-xxxx-xxxx',
            'location' => 'Banjarmasin, Kalimantan Selatan',
            'title' => 'Junior Web Developer',
            'birth_date' => '2009-05-15',
            'bio' => 'Hi, I\'m Ridho Norfajar, born in Banjarmasin on May 15, 2009. I\'m a 12th-grade student at Vocational High School 2 Banjarmasin majoring in Software and Game Development. My education started at Public Elementary School Pangeran 2, continued at Islamic Junior High School Al-Huda, and is now focused on building strong technical skills. I\'m passionate about web development and constantly improve my abilities as a web developer.',
            'education' => "SMK Negeri 2 Banjarmasin - Rekayasa Perangkat Lunak (2022 - 2025)\nSMP Islam Al-Huda Banjarmasin (2019 - 2022)\nSDN Pangeran 2 Banjarmasin (2013 - 2019)",
            'experience' => "Web Developer - BK SMKN 2 Banjarmasin (2024)\n- Mengembangkan website bimbingan konseling menggunakan Laravel & Tailwind CSS\n- Bertanggung jawab pada frontend dan backend development\nFreelance Web Developer (2023 - Sekarang)\n- Membuat website company profile dan e-commerce sederhana",
            'skills' => [
                'HTML',
                'CSS',
                'Tailwind CSS',
                'Laravel',
                'PHP',
                'JavaScript',
                'MySQL',
                'Git',
            ],
            'tools' => [
                'VS Code',
                'Figma',
                'GitHub',
                'TablePlus',
                'DBngin',
                'Laragon',
                'Sertifikasi Laravel Basic (Dicoding)',
                'Sertifikasi Web Dasar (Dicoding)',
            ],
        ]);
    }
}