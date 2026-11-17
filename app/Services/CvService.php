<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Cv;

class CvService
{
    public function getCvData(): array
    {
        $projects = Project::latest()->get();
        
        return [
            'personal' => [
                'name' => 'Ridho Norfajar',
                'title' => 'Junior Web Developer',
                'email' => 'ridhonorfajar@gmail.com',
                'phone' => '+62 8xx-xxxx-xxxx',
                'location' => 'Banjarmasin, Indonesia',
                'github' => 'github.com/ridhonf',
                'linkedin' => 'linkedin.com/in/ridho-norfajar-2b6934299',
                'instagram' => 'instagram.com/ridhoonf',
                'photo' => asset('img/foto.jpg'),
            ],
            'profile' => 'Hi, I\'m Ridho Norfajar, born in Banjarmasin on May 15, 2009. I\'m a 12th-grade student at Vocational High School 2 Banjarmasin majoring in Software and Game Development. My education started at Public Elementary School Pangeran 2, continued at Islamic Junior High School Al-Huda, and is now focused on building strong technical skills. I\'m passionate about web development and constantly improve my abilities as a web developer. During my outdoor learning, I worked as the second web developer responsible for developing and updating the Guidance Counseling website of Vocational High School 2 Banjarmasin. Although I haven\'t joined any organizations yet, this experience strengthened my technical skills and work ethic. My goal is to work as a freelance programmer or join an IT company where I can keep growing and creating meaningful digital solutions.',
            'education' => [
                [
                    'degree' => 'Software and Game Development (RPL)',
                    'school' => 'SMK Negeri 2 Banjarmasin',
                    'period' => '2022 - 2025',
                    'description' => 'Major in Software and Game Development. Focus on web development, Laravel, PHP, JavaScript, and database management.',
                ],
                [
                    'degree' => 'Islamic Junior High School',
                    'school' => 'MTs Al-Huda',
                    'period' => '2019 - 2022',
                    'description' => 'General education with focus on religious studies and academics.',
                ],
                [
                    'degree' => 'Public Elementary School',
                    'school' => 'SDN Pangeran 2',
                    'period' => '2013 - 2019',
                    'description' => 'Primary education foundation.',
                ],
            ],
            'experience' => [
                [
                    'role' => 'Web Developer (Internship / Outdoor Learning)',
                    'company' => 'SMK Negeri 2 Banjarmasin - Guidance Counseling Website',
                    'period' => '2024 - 2025',
                    'description' => 'Worked as the second web developer responsible for developing and updating the school\'s Guidance Counseling website. Built with Laravel and Tailwind CSS.',
                    'achievements' => [
                        'Developed and maintained the Guidance Counseling website',
                        'Implemented responsive design with Tailwind CSS',
                        'Worked with Laravel backend and MySQL database',
                        'Collaborated with team on feature development',
                    ],
                ],
            ],
            'skills' => [
                'tech' => [
                    ['name' => 'HTML', 'percentage' => 87],
                    ['name' => 'CSS', 'percentage' => 85],
                    ['name' => 'Tailwind CSS', 'percentage' => 83],
                    ['name' => 'Laravel', 'percentage' => 76],
                    ['name' => 'PHP', 'percentage' => 79],
                    ['name' => 'JavaScript', 'percentage' => 55],
                    ['name' => 'MySQL', 'percentage' => 84],
                ],
                'tools' => [
                    ['name' => 'VS Code', 'level' => 'Advanced'],
                    ['name' => 'Figma', 'level' => 'Intermediate'],
                    ['name' => 'GitHub', 'level' => 'Basic'],
                    ['name' => 'Kiro', 'level' => 'Advanced'],
                    ['name' => 'Laragon', 'level' => 'Intermediate'],
                    ['name' => 'TablePlus', 'level' => 'Intermediate'],
                    ['name' => 'DBngin', 'level' => 'Intermediate'],
                    ['name' => 'Herd', 'level' => 'Beginner'],
                ],
            ],
            'projects' => $projects->map(function ($project) {
                return [
                    'title' => $project->title,
                    'description' => $project->description,
                    'technologies' => $project->technologies ?? [],
                    'features' => $project->features ?? [],
                    'demo_link' => $project->demo_link,
                    'github_link' => $project->github_link,
                    'image' => $project->image ? asset('projects/' . $project->image) : null,
                ];
            })->toArray(),
            'certifications' => [
                'Laravel Developer Certification (Self-study)',
                'Tailwind CSS Proficiency',
                'PHP & MySQL Web Development',
                'Git & GitHub Version Control',
            ],
        ];
    }
}