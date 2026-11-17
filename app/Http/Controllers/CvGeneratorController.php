<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;

class CvGeneratorController extends Controller
{
    public function download()
    {
        $data = $this->getCvData();

        $pdf = Pdf::loadView('cv.template', $data)
            ->setPaper('a4', 'portrait')
            ->setOptions([
                'defaultFont' => 'sans-serif',
                'isRemoteEnabled' => true,
            ]);

        $filename = 'CV_' . str_replace(' ', '_', $data['name']) . '.pdf';

        return $pdf->download($filename);
    }

    public function preview()
    {
        $data = $this->getCvData();

        return view('cv.template', $data);
    }

    private function getCvData(): array
    {
        $projects = Project::latest()->get();

        return [
            'name' => 'Ridho Norfajar',
            'title' => 'Junior Web Developer',
            'email' => 'ridhonorfajar@gmail.com',
            'phone' => '+62 8xx-xxxx-xxxx',
            'location' => 'Banjarmasin, Indonesia',
            'github' => 'github.com/ridhonf',
            'linkedin' => 'linkedin.com/in/ridho-norfajar-2b6934299',
            'instagram' => 'instagram.com/ridhoonf',
            'summary' => 'Mahasiswa SMK Kelas 12 jurusan Pengembangan Perangkat Lunak dan Gim (PPLG) di SMK Negeri 2 Banjarmasin. Berpengalaman sebagai Web Developer pada outdoor learning mengembangkan website BK SMKN 2 Banjarmasin. Terampil dalam Laravel, PHP, MySQL, Tailwind CSS, dan JavaScript. Berdedikasi untuk menciptakan solusi web modern, responsif, dan elegan. Siap berkontribusi sebagai freelance programmer atau bergabung dengan tim IT profesional.',
            'education' => [
                [
                    'degree' => 'SMK Negeri 2 Banjarmasin',
                    'major' => 'Pengembangan Perangkat Lunak dan Gim (PPLG)',
                    'year' => '2023 - 2026 (Saat ini Kelas 12)',
                    'description' => 'Belajar fundamental pemrograman, basis data, framework Laravel, frontend modern (Tailwind CSS, Alpine.js), dan pengembangan aplikasi web full-stack.',
                ],
                [
                    'degree' => 'MTs Al-Huda',
                    'major' => 'Pendidikan Umum',
                    'year' => '2020 - 2023',
                    'description' => 'Pendidikan menengah pertama.',
                ],
                [
                    'degree' => 'SDN Pangeran 2',
                    'major' => 'Pendidikan Umum',
                    'year' => '2014 - 2020',
                    'description' => 'Pendidikan dasar.',
                ],
            ],
            'experience' => [
                [
                    'role' => 'Web Developer (Outdoor Learning)',
                    'company' => 'SMK Negeri 2 Banjarmasin - Website BK',
                    'period' => '2025',
                    'description' => 'Bertanggung jawab sebagai Web Developer kedua dalam tim untuk mengembangkan dan memperbarui website Bimbingan Konseling (BK) sekolah. Menggunakan Laravel dan Tailwind CSS untuk membangun antarmuka yang responsif dan user-friendly.',
                ],
            ],
            'skills' => [
                'Backend' => ['Laravel', 'PHP', 'MySQL', 'REST API'],
                'Frontend' => ['Tailwind CSS', 'HTML5', 'CSS3', 'JavaScript (ES6+)', 'Alpine.js'],
                'Tools' => ['Git & GitHub', 'VS Code', 'Laragon', 'TablePlus', 'DBngin', 'Figma'],
                'Lainnya' => ['Responsive Design', 'MVC Architecture', 'Database Design', 'Authentication & Authorization'],
            ],
            'projects' => $projects->map(function ($project) {
                return [
                    'title' => $project->title,
                    'description' => $project->description,
                    'technologies' => $project->technologies ?? [],
                    'features' => $project->features ?? [],
                    'demo_link' => $project->demo_link,
                    'github_link' => $project->github_link,
                ];
            })->toArray(),
            'generated_at' => now()->format('d F Y'),
        ];
    }
}