<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fajardev | Junior Web Developer</title>
    @include('partials.theme-init')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            font-size: 1.08rem;
        }
        .heading {
            font-family: 'Poppins', sans-serif;
        }
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            color: #000 !important;
        }
        .dark .nav-link:hover {
            color: #fff !important;
        }
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #000;
            transition: width 0.3s ease;
        }
        .dark .nav-link:after {
            background-color: #fff;
        }
        .nav-link:hover:after,
        .nav-link.active:after {
            width: 100%;
        }
        .social-box {
            transition: all 0.3s ease;
        }
        .social-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        .mobile-link {
            padding: 12px 0;
            border-bottom: 1px solid #f1f1f1;
            transition: all 0.3s;
        }
        .dark .mobile-link {
            border-bottom-color: #3f3f46;
        }

        .mobile-link:hover {
            color: black;
            padding-left: 8px;
        }
        .dark .mobile-link:hover {
            color: #fff;
        }

        /* Tab buttons (skills) */
        .tab-button.active {
            background-color: #ffffff;
            box-shadow: 0 1px 2px rgb(0 0 0 / 0.05);
        }
        .dark .tab-button.active {
            background-color: #3f3f46;
        }

        /* Pastikan body tidak scroll ketika menu mobile terbuka */
        body.menu-open {
            overflow: hidden;
        }

        /* Tambah jarak antara navbar dan hero pada layar mobile */
        @media (max-width: 768px) {
            #home {
                padding-top: 10rem; /* lebih besar dari pt-24 untuk desktop */
            }
        }
    </style>
</head>
<body class="bg-white dark:bg-zinc-900 text-zinc-900 dark:text-zinc-100">

<!-- NAVBAR -->
<nav class="fixed top-0 w-full bg-white/95 dark:bg-zinc-900/95 backdrop-blur-md z-50 border-b border-zinc-200 dark:border-zinc-700">
    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">

        <a href="/" class="text-3xl font-bold heading tracking-tighter text-black dark:text-white">Fajardev</a>

        <div class="flex items-center gap-6 md:gap-10">
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-10 text-base font-medium">
                <a href="#home" class="nav-link text-zinc-700 dark:text-zinc-300">Home</a>
                <a href="#about" class="nav-link text-zinc-700 dark:text-zinc-300">About</a>
                <a href="#skills" class="nav-link text-zinc-700 dark:text-zinc-300">Skills</a>
                <a href="#projects" class="nav-link text-zinc-700 dark:text-zinc-300">Projects</a>
                <a href="#contact" class="nav-link text-zinc-700 dark:text-zinc-300">Contact</a>
            </div>

            <!-- Theme Toggle -->
            <button type="button" x-data="{}" @click="$store.theme.toggle()" aria-label="Toggle theme"
                    class="inline-flex items-center justify-center w-11 h-11 rounded-full border border-zinc-300 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition">
                <svg x-show="!$store.theme.dark" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <svg x-show="$store.theme.dark" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>

            <!-- Hamburger Menu - Hanya tampil di Mobile -->
            <button id="hamburger"
                    class="md:hidden text-4xl leading-none focus:outline-none z-50 text-zinc-700 dark:text-zinc-200">
                ☰
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-zinc-900 border-t dark:border-zinc-700 shadow-lg">
        <div class="px-6 py-10 flex flex-col gap-8 text-xl font-medium">
            <a href="#home" class="mobile-link">Home</a>
            <a href="#about" class="mobile-link">About</a>
            <a href="#skills" class="mobile-link">Skills</a>
            <a href="#projects" class="mobile-link">Projects</a>
            <a href="#contact" class="mobile-link">Contact</a>
            <button type="button" x-data="{}" @click="$store.theme.toggle()"
                    class="mobile-link text-left flex items-center justify-between">
                <span>Toggle Theme</span>
                <span x-text="$store.theme.dark ? 'Dark' : 'Light'" class="text-zinc-500 dark:text-zinc-400"></span>
            </button>
        </div>
    </div>
</nav>

<!-- HERO -->
<section id="home" class="min-h-screen flex items-center pt-24">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-20 items-center">
        <div data-aos="fade-right">
            <h1 class="text-6xl md:text-7xl font-bold heading leading-none">Hi, I'm Fajar</h1>
            <p class="text-3xl text-zinc-600 dark:text-zinc-400 mt-4">Junior Web Developer</p>
            <p class="mt-8 text-lg text-zinc-600 dark:text-zinc-400 max-w-lg">Creating modern, responsive, and elegant websites with Laravel + Tailwind CSS.</p>
            <div class="mt-12 flex flex-wrap gap-4">
                <a href="#projects" class="bg-white text-zinc-900 border border-zinc-300 px-8 py-4 rounded-2xl font-semibold hover:bg-zinc-50 dark:bg-black dark:text-zinc-100 dark:border-zinc-700 dark:hover:bg-zinc-900 transition">View My Projects</a>
                <a href="#contact" class="bg-white text-zinc-900 border border-zinc-300 px-8 py-4 rounded-2xl font-semibold hover:bg-zinc-50 dark:bg-black dark:text-zinc-100 dark:border-zinc-700 dark:hover:bg-zinc-900 transition">Get In Touch</a>
                @if($user ?? null)
                    <a href="{{ route('cv.download') }}" class="bg-white text-zinc-900 border border-zinc-300 px-8 py-4 rounded-2xl font-semibold hover:bg-zinc-50 dark:bg-black dark:text-zinc-100 dark:border-zinc-700 dark:hover:bg-zinc-900 transition">
                        Download CV
                    </a>
                @endif
            </div>
        </div>
        <div data-aos="fade-left" class="flex justify-center">
            <img src="{{ asset('img/foto.jpg') }}" alt="Fajar" class="rounded-3xl shadow-2xl w-full max-w-md">
        </div>
    </div>
</section>

<!-- ABOUT -->
<section id="about" class="py-28 bg-zinc-50 dark:bg-zinc-800">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <h2 class="text-5xl md:text-6xl font-bold heading mb-10">About Me</h2>
                <p class="text-lg text-zinc-600 dark:text-zinc-400 leading-relaxed">
                    Hi, I'm Ridho Norfajar, born in Banjarmasin on May 15, 2009. I'm a 12th-grade student at
                    Vocational High School 2 Banjarmasin majoring in Software and Game Development. My education
                    started at Public Elementary School Pangeran 2, continued at Islamic Junior High School Al-Huda,
                    and is now focused on building strong technical skills. I'm passionate about web development and
                    constantly improve my abilities as a web developer.
                </p>
                <p class="text-lg text-zinc-600 dark:text-zinc-400 leading-relaxed mt-8">
                    During my outdoor learning, I worked as the second web developer responsible for developing and
                    updating the Guidance Counseling website of Vocational High School 2 Banjarmasin. Although I
                    haven't joined any organizations yet, this experience strengthened my technical skills and work
                    ethic. My goal is to work as a freelance programmer or join an IT company where I can keep
                    growing and creating meaningful digital solutions.
                </p>
            </div>
            <div data-aos="fade-left" class="flex justify-center">
                <img src="{{ asset('img/bukit sapu angin.jpg') }}" alt="Fajar Profile" class="rounded-3xl shadow-xl w-full max-w-md">
            </div>
        </div>
    </div>
</section>

<!-- SKILLS -->
@php
    if (! function_exists('getLevelColor')) {
        function getLevelColor($level) {
            $level = strtolower($level);
            if ($level === 'advanced') {
                return 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300';
            } elseif ($level === 'intermediate') {
                return 'bg-amber-100 text-amber-700 dark:bg-amber-900/40 dark:text-amber-300';
            } else {
                return 'bg-zinc-100 text-zinc-700 dark:bg-zinc-700 dark:text-zinc-200'; // Basic / Default
            }
        }
    }

    $techStack = [
        ['icon' => 'https://cdn-icons-png.flaticon.com/128/1051/1051277.png', 'name' => 'HTML', 'percentage' => 87],
        ['icon' => 'https://cdn-icons-png.flaticon.com/128/732/732190.png', 'name' => 'CSS', 'percentage' => 85],
        ['icon' => 'https://files.raycast.com/xc28yi9kvhmju8ae1hjixwutznke', 'name' => 'Tailwind CSS', 'percentage' => 83],
        ['icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1280px-Laravel.svg.png', 'name' => 'Laravel', 'percentage' => 76],
        ['icon' => 'https://cdn-icons-png.flaticon.com/128/5968/5968332.png', 'name' => 'PHP', 'percentage' => 79],
        ['icon' => 'https://cdn-icons-png.flaticon.com/128/5968/5968292.png', 'name' => 'JavaScript', 'percentage' => 55],
        ['icon' => 'https://cdn-icons-png.flaticon.com/128/5968/5968313.png', 'name' => 'MySQL', 'percentage' => 84],
    ];

    $tools = [
        ['icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vscode/vscode-original.svg', 'name' => 'VS Code', 'level' => 'Advanced'],
        ['icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg', 'name' => 'Figma', 'level' => 'Intermediate'],
        ['icon' => 'https://cdn-icons-png.flaticon.com/128/733/733609.png', 'name' => 'GitHub', 'level' => 'Basic'],
        ['icon' => 'https://www.google.com/s2/favicons?domain=kiro.dev&sz=128', 'name' => 'Kiro', 'level' => 'Advanced'],
        ['icon' => 'https://cdn.simpleicons.org/laragon', 'name' => 'Laragon', 'level' => 'Intermediate'],
        ['icon' => 'https://www.google.com/s2/favicons?domain=tableplus.com&sz=128', 'name' => 'TablePlus', 'level' => 'Intermediate'],
        ['icon' => 'https://www.google.com/s2/favicons?domain=dbngin.com&sz=128', 'name' => 'DBngin', 'level' => 'Intermediate'],
        ['icon' => 'https://www.google.com/s2/favicons?domain=herd.laravel.com&sz=128', 'name' => 'Herd', 'level' => 'Beginner'],
    ];
@endphp

<section id="skills" class="py-28 bg-white dark:bg-zinc-900">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-5xl font-bold heading tracking-tight text-zinc-900 dark:text-zinc-100">
                My <span class="text-black dark:text-white">Skills</span>
            </h2>
            <p class="text-zinc-600 dark:text-zinc-400 mt-3 text-lg">Technologies and tools I work with.</p>
        </div>

        <!-- Tab Buttons -->
        <div class="flex justify-center mb-12">
            <div class="bg-zinc-100 dark:bg-zinc-800 rounded-3xl p-1 inline-flex shadow-sm">
                <button onclick="showTab(1)" id="tab1"
                        class="tab-button px-8 py-3 rounded-3xl font-medium transition-all active">
                    Tech Stack
                </button>
                <button onclick="showTab(2)" id="tab2"
                        class="tab-button px-8 py-3 rounded-3xl font-medium transition-all">
                    Tools
                </button>
            </div>
        </div>

        <!-- Tech Stack -->
        <div id="content1" class="tab-content">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($techStack as $item)
                <div class="bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded-3xl p-6 hover:border-zinc-400 dark:hover:border-zinc-500 hover:shadow-lg transition-all">
                    <div class="flex items-center gap-4">
                        <img src="{{ $item['icon'] }}" alt="{{ $item['name'] }}" class="w-12 h-12">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100">{{ $item['name'] }}</h3>
                            <div class="mt-3">
                                <div class="flex items-center justify-between mb-1">
                                    <span class="text-xs font-medium text-zinc-500 dark:text-zinc-400">Proficiency</span>
                                    <span class="text-xs font-semibold text-zinc-700 dark:text-zinc-200">{{ $item['percentage'] }}%</span>
                                </div>
                                <div class="w-full h-2 rounded-full bg-zinc-200 dark:bg-zinc-700 overflow-hidden">
                                    <div class="h-full rounded-full bg-zinc-900 dark:bg-zinc-100" style="width: {{ $item['percentage'] }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Tools -->
        <div id="content2" class="tab-content hidden">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($tools as $item)
                <div class="bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded-3xl p-6 hover:border-zinc-400 dark:hover:border-zinc-500 hover:shadow-lg transition-all">
                    <div class="flex items-center gap-4">
                        <img src="{{ $item['icon'] }}" alt="{{ $item['name'] }}" class="w-12 h-12">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100">{{ $item['name'] }}</h3>
                            <span class="inline-block mt-3 px-5 py-1.5 text-xs font-medium rounded-full
                                         {{ getLevelColor($item['level']) }}">
                                {{ $item['level'] }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    function showTab(tab) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        document.getElementById('content' + tab).classList.remove('hidden');

        document.querySelectorAll('.tab-button').forEach(btn => {
            btn.classList.remove('active');
        });
        document.getElementById('tab' + tab).classList.add('active');
    }
</script>

<!-- PROJECTS -->
<section id="projects" class="py-28 bg-zinc-50 dark:bg-zinc-800">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-5xl font-bold heading text-center mb-16" data-aos="fade-up">Featured Projects</h2>

        <!-- Search -->
        <div class="max-w-xl mx-auto mb-12" data-aos="fade-up">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none text-zinc-400 dark:text-zinc-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input type="search" id="project-search" placeholder="Search projects..." autocomplete="off"
                       class="w-full pl-14 pr-5 py-4 rounded-2xl border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-900 text-zinc-900 dark:text-zinc-100 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-900 dark:focus:border-zinc-500 focus:outline-none transition">
            </div>
        </div>

        <div id="project-grid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
            <div class="project-card bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-3xl overflow-hidden
                        transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl
                        hover:border-zinc-300 dark:hover:border-zinc-600 group"
                 data-search="{{ \Illuminate\Support\Str::lower($project->title . ' ' . $project->description) }}"
                 data-aos="fade-up">

                <!-- GAMBAR (tanpa hover scale) -->
                <div class="h-64 overflow-hidden">
                    <img src="{{ asset('projects/' . $project->image) }}"
                    alt="{{ $project->title }}"
                    class="w-full h-full object-cover">
                </div>

                <!-- KONTEN -->
                <div class="p-8">
                    <h3 class="font-semibold text-2xl">{{ $project->title }}</h3>
                    <p class="text-zinc-600 dark:text-zinc-400 mt-3 line-clamp-4">{{ $project->description }}</p>

                    <!-- Technologies -->
                    @if($project->technologies && count($project->technologies) > 0)
                    <div class="mt-5 flex flex-wrap gap-2">
                        @foreach($project->technologies as $tech)
                        <span class="px-3 py-1 text-xs font-medium bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 rounded-full border border-zinc-200 dark:border-zinc-700">
                            {{ $tech }}
                        </span>
                        @endforeach
                    </div>
                    @endif

                    <!-- Features -->
                    @if($project->features && count($project->features) > 0)
                    <div class="mt-5 space-y-2">
                        <p class="text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Features</p>
                        <ul class="space-y-1.5">
                            @foreach($project->features as $feature)
                            <li class="flex items-start gap-2 text-sm text-zinc-600 dark:text-zinc-400">
                                <span class="w-1.5 h-1.5 mt-2 flex-shrink-0 rounded-full bg-zinc-400 dark:bg-zinc-600"></span>
                                <span>{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="mt-6 flex flex-wrap gap-3">
                        @if($project->demo_link)
                            <a href="{{ $project->demo_link }}" target="_blank" rel="noopener"
                               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white text-zinc-900 border border-zinc-300 text-sm font-medium hover:bg-zinc-50 dark:bg-black dark:text-zinc-100 dark:border-zinc-700 dark:hover:bg-zinc-900 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                                Live Demo
                            </a>
                        @endif
                        @if($project->github_link)
                            <a href="{{ $project->github_link }}" target="_blank" rel="noopener"
                               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white text-zinc-900 border border-zinc-300 text-sm font-medium hover:bg-zinc-50 dark:bg-black dark:text-zinc-100 dark:border-zinc-700 dark:hover:bg-zinc-900 transition">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                </svg>
                                GitHub
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div id="project-empty" class="hidden text-center py-16">
            <p class="text-xl font-semibold text-zinc-700 dark:text-zinc-300">No projects found</p>
            <p class="text-zinc-500 dark:text-zinc-400 mt-2">Try a different keyword.</p>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section id="contact" class="py-28">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-5xl font-bold heading text-center mb-4" data-aos="fade-up">Get In Touch</h2>
        <p class="text-center text-zinc-600 dark:text-zinc-400 mb-12">I'm always open to new opportunities and interesting projects.</p>

        <div class="grid md:grid-cols-2 gap-12 items-start">

            <!-- FORM KIRI -->
            <div data-aos="fade-right" class="bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded-3xl p-8 md:p-10">
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Notifikasi Sukses -->
                    @if(session('success'))
                        <div id="success-message"
                             class="bg-emerald-50 dark:bg-emerald-900/30 border border-emerald-300 dark:border-emerald-700 text-emerald-700 dark:text-emerald-300 px-6 py-4 rounded-2xl flex items-center gap-3">
                            <span class="text-2xl">✅</span>
                            <span class="font-medium">Message sent!</span>
                        </div>
                    @endif

                    <input type="text" name="name" placeholder="Your Name" required
                           class="w-full bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 dark:text-zinc-100 dark:placeholder-zinc-500 rounded-2xl px-6 py-5 focus:border-black dark:focus:border-zinc-500 focus:outline-none">

                    <input type="email" name="email" placeholder="Your Email" required
                           class="w-full bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 dark:text-zinc-100 dark:placeholder-zinc-500 rounded-2xl px-6 py-5 focus:border-black dark:focus:border-zinc-500 focus:outline-none">

                    <textarea name="message" rows="6" placeholder="Your Message..." required
                              class="w-full bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 dark:text-zinc-100 dark:placeholder-zinc-500 rounded-3xl px-6 py-5 focus:border-black dark:focus:border-zinc-500 focus:outline-none resize-y"></textarea>

                    <button type="submit"
                            class="w-full bg-white text-zinc-900 border border-zinc-300 font-semibold py-6 rounded-3xl hover:bg-zinc-50 dark:bg-black dark:text-zinc-100 dark:border-zinc-700 dark:hover:bg-zinc-900 transition text-base">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- SOSMED KANAN -->
            <div data-aos="fade-left" class="space-y-6 pt-4">
                <a href="mailto:ridhonorfajar@gmail.com" target="_blank"
                   class="social-box bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 hover:border-red-800 dark:hover:border-red-500 rounded-3xl p-6 flex items-center gap-6 group">
                    <img src="https://cdn-icons-png.flaticon.com/128/5968/5968534.png" alt="Email" class="w-14 h-14">
                    <div>
                        <div class="font-semibold text-xl">Gmail</div>
                        <div class="text-zinc-500 dark:text-zinc-400">ridhonorfajar@gmail.com</div>
                    </div>
                </a>

                <a href="https://github.com/ridhonf" target="_blank"
                   class="social-box bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 hover:border-zinc-800 dark:hover:border-zinc-400 rounded-3xl p-6 flex items-center gap-6 group">
                    <img src="https://cdn-icons-png.flaticon.com/128/733/733609.png" alt="GitHub" class="w-14 h-14">
                    <div>
                        <div class="font-semibold text-xl">GitHub</div>
                        <div class="text-zinc-500 dark:text-zinc-400">My code &amp; projects</div>
                    </div>
                </a>

                <a href="https://instagram.com/ridhoonf" target="_blank"
                   class="social-box bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 hover:border-pink-500 rounded-3xl p-6 flex items-center gap-6 group">
                    <img src="https://cdn-icons-png.flaticon.com/128/174/174855.png" alt="Instagram" class="w-14 h-14">
                    <div>
                        <div class="font-semibold text-xl">Instagram</div>
                        <div class="text-zinc-500 dark:text-zinc-400">@ridhonorfajar</div>
                    </div>
                </a>

                <a href="https://www.linkedin.com/in/ridho-norfajar-2b6934299/" target="_blank"
                   class="social-box bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 hover:border-blue-600 rounded-3xl p-6 flex items-center gap-6 group">
                    <img src="https://cdn-icons-png.flaticon.com/128/174/174857.png" alt="LinkedIn" class="w-14 h-14">
                    <div>
                        <div class="font-semibold text-xl">LinkedIn</div>
                        <div class="text-zinc-500 dark:text-zinc-400">Let's connect</div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-zinc-900 dark:bg-black text-white py-12">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <p class="text-3xl font-bold heading">Fajardev</p>
        <p class="text-zinc-400 dark:text-zinc-500 mt-3">© 2026 Fajardev. All rights reserved.</p>
    </div>
</footer>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ once: true, duration: 1200 });

    // Hamburger Menu
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');

    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');

            if (mobileMenu.classList.contains('hidden')) {
                hamburger.textContent = '☰';
            } else {
                hamburger.textContent = '✕';
            }
        });

        // Close menu when link clicked
        document.querySelectorAll('.mobile-link').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                hamburger.textContent = '☰';
            });
        });
    }

    // Active Nav
    function updateActiveNav() {
        let current = '';
        document.querySelectorAll('section[id]').forEach(section => {
            if (window.scrollY >= section.offsetTop - 180) {
                current = section.getAttribute('id');
            }
        });
        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) link.classList.add('active');
        });
    }

    window.addEventListener('scroll', updateActiveNav);
    window.addEventListener('load', updateActiveNav);
</script>

<!-- Project Search -->
<script>
    (function () {
        const search = document.getElementById('project-search');
        if (!search) return;

        const cards = Array.prototype.slice.call(document.querySelectorAll('#project-grid .project-card'));
        const empty = document.getElementById('project-empty');

        function applyFilter() {
            const q = search.value.trim().toLowerCase();
            let visible = 0;

            cards.forEach(function (card) {
                const haystack = card.getAttribute('data-search') || '';
                const match = q === '' || haystack.indexOf(q) !== -1;
                card.classList.toggle('hidden', !match);
                if (match) visible++;
            });

            if (empty) {
                empty.classList.toggle('hidden', visible > 0 || q === '');
            }
        }

        search.addEventListener('input', applyFilter);
        search.addEventListener('search', applyFilter);
    })();
</script>

</body>
</html>
