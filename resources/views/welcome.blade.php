<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fajardev | Junior Web Developer</title>
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

        /* Sembunyikan elemen Alpine sebelum diinisialisasi */
        [x-cloak] {
            display: none !important;
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
            <div class="hidden md:flex items-center gap-8 text-base font-medium">
                <a href="#home" class="nav-link text-zinc-700 dark:text-zinc-300">{{ __('nav.home') }}</a>
                <a href="#about" class="nav-link text-zinc-700 dark:text-zinc-300">{{ __('nav.about') }}</a>
                <a href="#education" class="nav-link text-zinc-700 dark:text-zinc-300">{{ __('nav.education') }}</a>
                <a href="#experience" class="nav-link text-zinc-700 dark:text-zinc-300">{{ __('nav.experience') }}</a>
                <a href="#skills" class="nav-link text-zinc-700 dark:text-zinc-300">{{ __('nav.skills') }}</a>
                <a href="#projects" class="nav-link text-zinc-700 dark:text-zinc-300">{{ __('nav.projects') }}</a>
                @if($testimonials->isNotEmpty())
                    <a href="#testimonials" class="nav-link text-zinc-700 dark:text-zinc-300">{{ __('nav.testimonials') }}</a>
                @endif
                <a href="#contact" class="nav-link text-zinc-700 dark:text-zinc-300">{{ __('nav.contact') }}</a>
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

            <!-- Language Switcher -->
            <form action="{{ route('language.switch') }}" method="POST" class="inline-flex">
                @csrf
                <input type="hidden" name="locale" value="{{ app()->getLocale() === 'en' ? 'id' : 'en' }}">
                <button type="submit"
                        class="inline-flex items-center justify-center w-11 h-11 rounded-full border border-zinc-300 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition"
                        aria-label="{{ app()->getLocale() === 'en' ? __('language.switch_to_indonesian') : __('language.switch_to_english') }}">
                    <span class="text-sm font-medium uppercase">
                        {{ app()->getLocale() === 'en' ? 'EN' : 'ID' }}
                    </span>
                </button>
            </form>

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
            <a href="#home" class="mobile-link">{{ __('nav.home') }}</a>
            <a href="#about" class="mobile-link">{{ __('nav.about') }}</a>
            <a href="#education" class="mobile-link">{{ __('nav.education') }}</a>
            <a href="#experience" class="mobile-link">{{ __('nav.experience') }}</a>
            <a href="#skills" class="mobile-link">{{ __('nav.skills') }}</a>
            <a href="#projects" class="mobile-link">{{ __('nav.projects') }}</a>
            @if($testimonials->isNotEmpty())
                <a href="#testimonials" class="mobile-link">{{ __('nav.testimonials') }}</a>
            @endif
            <a href="#contact" class="mobile-link">{{ __('nav.contact') }}</a>
            <button type="button" x-data="{}" @click="$store.theme.toggle()"
                    class="mobile-link text-left flex items-center justify-between">
                <span>{{ __('language.switch_to_indonesian') }}</span>
                <span x-text="$store.theme.dark ? 'Dark' : 'Light'" class="text-zinc-500 dark:text-zinc-400"></span>
            </button>
        </div>
    </div>
</nav>

<!-- HERO -->
<section id="home" class="min-h-screen flex items-center pt-24">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-20 items-center">
        <div data-aos="fade-right">
            <h1 class="text-6xl md:text-7xl font-bold heading leading-none">{{ __('hero.greeting') }}</h1>
            <p class="text-3xl text-zinc-600 dark:text-zinc-400 mt-4">{{ __('hero.title') }}</p>
            <p class="mt-8 text-lg text-zinc-600 dark:text-zinc-400 max-w-lg">{{ __('hero.description') }}</p>
            <div class="mt-12 flex flex-wrap gap-4">
                <a href="#projects" class="bg-white text-zinc-900 border border-zinc-300 px-8 py-4 rounded-2xl font-semibold hover:bg-zinc-50 dark:bg-black dark:text-zinc-100 dark:border-zinc-700 dark:hover:bg-zinc-900 transition">{{ __('hero.view_projects') }}</a>
                <a href="#contact" class="bg-white text-zinc-900 border border-zinc-300 px-8 py-4 rounded-2xl font-semibold hover:bg-zinc-50 dark:bg-black dark:text-zinc-100 dark:border-zinc-700 dark:hover:bg-zinc-900 transition">{{ __('hero.get_in_touch') }}</a>
                @if($cv ?? null)
                    <a href="{{ route('cv.download') }}" class="bg-white text-zinc-900 border border-zinc-300 px-8 py-4 rounded-2xl font-semibold hover:bg-zinc-50 dark:bg-black dark:text-zinc-100 dark:border-zinc-700 dark:hover:bg-zinc-900 transition">
                        {{ __('hero.download_cv') }}
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
                <h2 class="text-5xl md:text-6xl font-bold heading mb-10">{{ __('about.title') }}</h2>
                <p class="text-lg text-zinc-600 dark:text-zinc-400 leading-relaxed">
                    {{ __('about.description1') }}
                </p>
                <p class="text-lg text-zinc-600 dark:text-zinc-400 leading-relaxed mt-8">
                    {{ __('about.description2') }}
                </p>
            </div>
            <div data-aos="fade-left" class="flex justify-center">
                <img src="{{ asset('img/IMG_24542.jpg') }}" alt="Fajar Profile" class="rounded-3xl shadow-xl w-full max-w-md">
            </div>
        </div>
    </div>
</section>

<!-- EDUCATION -->
@php
    $locale = app()->getLocale();
    $education = [
        [
            'period' => '2024 — ' . ($locale === 'id' ? 'Sekarang' : 'Present'),
            'school' => $locale === 'id' ? 'SMK Negeri 2 Banjarmasin' : 'Vocational High School 2 Banjarmasin',
            'major' => $locale === 'id' ? 'Rekayasa Perangkat Lunak & Pengembangan Game' : 'Software & Game Development',
            'description' => $locale === 'id'
                ? 'Menempuh pendidikan kejuruan di bidang perangkat lunak, mempelajari pemrograman web, basis data, dan pengembangan aplikasi.'
                : 'Studying vocational software engineering, covering web programming, databases, and application development.',
            'active' => true,
        ],
        [
            'period' => '2021 — 2024',
            'school' => $locale === 'id' ? 'MTs Al-Huda' : 'Islamic Junior High School Al-Huda',
            'major' => $locale === 'id' ? 'Pendidikan Menengah Pertama' : 'Junior High School',
            'description' => $locale === 'id'
                ? 'Menyelesaikan pendidikan menengah pertama dengan minat besar pada teknologi dan komputer.'
                : 'Completed junior high school with a strong interest in technology and computers.',
            'active' => false,
        ],
        [
            'period' => '2015 — 2021',
            'school' => $locale === 'id' ? 'SD Negeri Pangeran 2' : 'Public Elementary School Pangeran 2',
            'major' => $locale === 'id' ? 'Sekolah Dasar' : 'Elementary School',
            'description' => $locale === 'id'
                ? 'Menempuh pendidikan dasar dan membangun fondasi belajar serta rasa ingin tahu.'
                : 'Completed elementary education and built a strong learning foundation and curiosity.',
            'active' => false,
        ],
    ];

    $experience = [
        [
            'period' => $locale === 'id' ? 'Juli — September 2026' : 'July — September 2026',
            'role' => $locale === 'id' ? 'Web Developer (Pembelajaran Luar Kelas)' : 'Web Developer (Outdoor Learning)',
            'company' => $locale === 'id' ? 'BK SMK Negeri 2 Banjarmasin' : 'Guidance Counseling, Vocational High School 2 Banjarmasin',
            'description' => $locale === 'id'
                ? 'Bekerja sebagai web developer kedua yang bertanggung jawab mengembangkan dan memperbarui website Bimbingan Konseling SMK Negeri 2 Banjarmasin.'
                : 'Worked as the second web developer, responsible for developing and updating the Guidance Counseling website of Vocational High School 2 Banjarmasin.',
            'active' => false,
        ],
    ];
@endphp

<section id="education" class="py-28 bg-white dark:bg-zinc-900">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-5xl font-bold heading tracking-tight text-zinc-900 dark:text-zinc-100">
                {{ __('education.title') }}
            </h2>
            <p class="text-zinc-600 dark:text-zinc-400 mt-3 text-lg">{{ __('education.subtitle') }}</p>
        </div>

        <div class="relative">
            <!-- Vertical line -->
            <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-zinc-200 dark:bg-zinc-700 md:-translate-x-1/2"></div>

            <div class="space-y-10">
                @foreach($education as $i => $item)
                <div class="relative flex flex-col md:flex-row {{ $i % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} items-start md:items-center gap-6" data-aos="fade-up">
                    <!-- Dot -->
                    <div class="absolute left-4 md:left-1/2 w-4 h-4 rounded-full -translate-x-1/2 mt-6 md:mt-0 z-10
                                {{ $item['active'] ? 'bg-emerald-500 ring-4 ring-emerald-100 dark:ring-emerald-900/40' : 'bg-zinc-400 dark:bg-zinc-600 ring-4 ring-zinc-100 dark:ring-zinc-800' }}"></div>

                    <!-- Card -->
                    <div class="w-full md:w-1/2 {{ $i % 2 === 0 ? 'md:pr-12 md:text-right' : 'md:pl-12' }} pl-12 md:pl-0">
                        <div class="bg-zinc-50 dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded-3xl p-6 hover:border-zinc-400 dark:hover:border-zinc-500 hover:shadow-lg transition-all">
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full mb-3
                                         {{ $item['active'] ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300' : 'bg-zinc-200 text-zinc-700 dark:bg-zinc-700 dark:text-zinc-200' }}">
                                {{ $item['period'] }}
                            </span>
                            <h3 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100">{{ $item['school'] }}</h3>
                            <p class="text-sm font-medium text-zinc-500 dark:text-zinc-400 mt-1">{{ $item['major'] }}</p>
                            <p class="text-sm text-zinc-600 dark:text-zinc-400 mt-3 leading-relaxed">{{ $item['description'] }}</p>
                        </div>
                    </div>

                    <!-- Spacer for opposite side -->
                    <div class="hidden md:block md:w-1/2"></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- EXPERIENCE -->
<section id="experience" class="py-28 bg-zinc-50 dark:bg-zinc-800">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-5xl font-bold heading tracking-tight text-zinc-900 dark:text-zinc-100">
                {{ __('experience.title') }}
            </h2>
            <p class="text-zinc-600 dark:text-zinc-400 mt-3 text-lg">{{ __('experience.subtitle') }}</p>
        </div>

        <div class="relative">
            <!-- Vertical line -->
            <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-zinc-200 dark:bg-zinc-700 md:-translate-x-1/2"></div>

            <div class="space-y-10">
                @foreach($experience as $i => $item)
                <div class="relative flex flex-col md:flex-row {{ $i % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} items-start md:items-center gap-6" data-aos="fade-up">
                    <!-- Dot -->
                    <div class="absolute left-4 md:left-1/2 w-4 h-4 rounded-full -translate-x-1/2 mt-6 md:mt-0 z-10
                                {{ $item['active'] ? 'bg-emerald-500 ring-4 ring-emerald-100 dark:ring-emerald-900/40' : 'bg-zinc-400 dark:bg-zinc-600 ring-4 ring-zinc-100 dark:ring-zinc-800' }}"></div>

                    <!-- Card -->
                    <div class="w-full md:w-1/2 {{ $i % 2 === 0 ? 'md:pr-12 md:text-right' : 'md:pl-12' }} pl-12 md:pl-0">
                        <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-3xl p-6 hover:border-zinc-400 dark:hover:border-zinc-500 hover:shadow-lg transition-all">
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full mb-3
                                         {{ $item['active'] ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300' : 'bg-zinc-200 text-zinc-700 dark:bg-zinc-700 dark:text-zinc-200' }}">
                                {{ $item['period'] }}
                            </span>
                            <h3 class="text-xl font-semibold text-zinc-900 dark:text-zinc-100">{{ $item['role'] }}</h3>
                            <p class="text-sm font-medium text-zinc-500 dark:text-zinc-400 mt-1">{{ $item['company'] }}</p>
                            <p class="text-sm text-zinc-600 dark:text-zinc-400 mt-3 leading-relaxed">{{ $item['description'] }}</p>
                        </div>
                    </div>

                    <!-- Spacer for opposite side -->
                    <div class="hidden md:block md:w-1/2"></div>
                </div>
                @endforeach
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
                {{ __('skills.title') }}
            </h2>
            <p class="text-zinc-600 dark:text-zinc-400 mt-3 text-lg">{{ __('skills.subtitle') }}</p>
        </div>

        <!-- Tab Buttons -->
        <div class="flex justify-center mb-12">
            <div class="bg-zinc-100 dark:bg-zinc-800 rounded-3xl p-1 inline-flex shadow-sm">
                <button onclick="showTab(1)" id="tab1"
                        class="tab-button px-8 py-3 rounded-3xl font-medium transition-all active">
                    {{ __('skills.tech_stack') }}
                </button>
                <button onclick="showTab(2)" id="tab2"
                        class="tab-button px-8 py-3 rounded-3xl font-medium transition-all">
                    {{ __('skills.tools') }}
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
                                    <span class="text-xs font-medium text-zinc-500 dark:text-zinc-400">{{ __('skills.proficiency') }}</span>
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
                                {{ __('skills.level.' . strtolower($item['level'])) }}
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
<section id="projects" class="py-28 bg-zinc-50 dark:bg-zinc-800"
         x-data="{
             previewOpen: false,
             previewProject: null,
             openPreview(project) {
                 this.previewProject = project;
                 this.previewOpen = true;
             },
             closePreview() {
                 this.previewOpen = false;
             }
         }"
         @keydown.escape.window="closePreview()"
         x-effect="document.body.classList.toggle('overflow-hidden', previewOpen)">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-5xl font-bold heading text-center mb-16" data-aos="fade-up">{{ __('projects.title') }}</h2>

        <!-- Search -->
        <div class="max-w-xl mx-auto mb-12" data-aos="fade-up">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none text-zinc-400 dark:text-zinc-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input type="search" id="project-search" placeholder="{{ __('projects.search_placeholder') }}" autocomplete="off"
                       class="w-full pl-14 pr-5 py-4 rounded-2xl border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-900 text-zinc-900 dark:text-zinc-100 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-zinc-900 dark:focus:border-zinc-500 focus:outline-none transition">
            </div>
        </div>

        <div id="project-grid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
            @php
                $titleTranslations = $project->getTitleTranslations();
                $descTranslations = $project->getDescriptionTranslations();
                $searchText = strtolower(implode(' ', $titleTranslations) . ' ' . implode(' ', $descTranslations));

                $projectData = [
                    'title' => $project->title,
                    'description' => $project->description,
                    'image' => asset('projects/' . $project->image),
                    'demo_link' => $project->demo_link,
                    'github_link' => $project->github_link,
                    'technologies' => array_values($project->technologies ?? []),
                    'features' => array_values($project->features ?? []),
                ];
            @endphp
            <div class="project-card bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-3xl overflow-hidden
                        transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl
                        hover:border-zinc-300 dark:hover:border-zinc-600 group cursor-pointer
                        focus:outline-none focus:ring-2 focus:ring-zinc-900 dark:focus:ring-zinc-100"
                 data-search="{{ $searchText }}"
                 data-project="{{ json_encode($projectData) }}"
                 data-aos="fade-up"
                 role="button"
                 tabindex="0"
                 aria-label="{{ __('projects.view_details') }}: {{ $project->title }}"
                 @click="openPreview(JSON.parse($el.dataset.project))"
                 @keydown.enter.prevent="openPreview(JSON.parse($el.dataset.project))">

                <!-- GAMBAR (tanpa hover scale) -->
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('projects/' . $project->image) }}"
                    alt="{{ $project->title }}"
                    class="w-full h-full object-cover">

                    <!-- Hint: klik untuk detail -->
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/25 transition-colors duration-300 flex items-center justify-center pointer-events-none">
                        <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-white/95 text-zinc-900 text-sm font-semibold px-5 py-2.5 rounded-full shadow-lg">
                            {{ __('projects.view_details') }}
                        </span>
                    </div>
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
                        <p class="text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">{{ __('projects.features') }}</p>
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

                    <div class="mt-6 flex flex-wrap gap-3" @click.stop>
                        @if($project->demo_link)
                            <a href="{{ $project->demo_link }}" target="_blank" rel="noopener"
                               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white text-zinc-900 border border-zinc-300 text-sm font-medium hover:bg-zinc-50 dark:bg-black dark:text-zinc-100 dark:border-zinc-700 dark:hover:bg-zinc-900 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                                {{ __('projects.live_demo') }}
                            </a>
                        @endif
                        @if($project->github_link)
                            <a href="{{ $project->github_link }}" target="_blank" rel="noopener"
                               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white text-zinc-900 border border-zinc-300 text-sm font-medium hover:bg-zinc-50 dark:bg-black dark:text-zinc-100 dark:border-zinc-700 dark:hover:bg-zinc-900 transition">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                </svg>
                                {{ __('projects.github') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div id="project-empty" class="hidden text-center py-16">
            <p class="text-xl font-semibold text-zinc-700 dark:text-zinc-300">{{ __('projects.no_projects') }}</p>
            <p class="text-zinc-500 dark:text-zinc-400 mt-2">{{ __('projects.try_different') }}</p>
        </div>
    </div>

    <!-- PROJECT PREVIEW MODAL -->
    <div x-show="previewOpen" x-cloak
         class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6"
         role="dialog" aria-modal="true" aria-labelledby="project-preview-title">
        <!-- Backdrop -->
        <div x-show="previewOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute inset-0 bg-black/60 backdrop-blur-sm"
             @click="closePreview()"></div>

        <!-- Panel -->
        <div x-show="previewOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-6 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-6 scale-95"
             class="relative w-full max-w-3xl max-h-[90vh] overflow-y-auto bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-3xl shadow-2xl">

            <template x-if="previewProject">
                <div>
                    <!-- Cover -->
                    <div class="relative h-64 sm:h-80 overflow-hidden rounded-t-3xl">
                        <img :src="previewProject.image" :alt="previewProject.title"
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent pointer-events-none"></div>

                        <button type="button" @click="closePreview()"
                                aria-label="{{ __('projects.close') }}"
                                class="absolute top-4 right-4 w-11 h-11 rounded-full bg-black/50 hover:bg-black/70 text-white flex items-center justify-center transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="p-6 sm:p-8">
                        <h3 id="project-preview-title" x-text="previewProject.title"
                            class="text-3xl font-bold heading text-zinc-900 dark:text-zinc-100"></h3>

                        <!-- Technologies -->
                        <div class="mt-4 flex flex-wrap gap-2" x-show="previewProject.technologies.length > 0">
                            <template x-for="tech in previewProject.technologies" :key="tech">
                                <span class="px-3 py-1 text-xs font-medium bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 rounded-full border border-zinc-200 dark:border-zinc-700"
                                      x-text="tech"></span>
                            </template>
                        </div>

                        <!-- Full description -->
                        <div class="mt-6">
                            <p class="text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-2">{{ __('projects.description') }}</p>
                            <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed whitespace-pre-line"
                               x-text="previewProject.description"></p>
                        </div>

                        <!-- Features -->
                        <div class="mt-8" x-show="previewProject.features.length > 0">
                            <p class="text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">{{ __('projects.features') }}</p>
                            <ul class="mt-3 space-y-2">
                                <template x-for="feature in previewProject.features" :key="feature">
                                    <li class="flex items-start gap-2 text-sm text-zinc-600 dark:text-zinc-400">
                                        <span class="w-1.5 h-1.5 mt-2 flex-shrink-0 rounded-full bg-zinc-400 dark:bg-zinc-600"></span>
                                        <span x-text="feature"></span>
                                    </li>
                                </template>
                            </ul>
                        </div>

                        <!-- Actions -->
                        <div class="mt-8 flex flex-wrap gap-3">
                            <a x-show="previewProject.demo_link" :href="previewProject.demo_link"
                               target="_blank" rel="noopener"
                               class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-zinc-900 text-white dark:bg-zinc-100 dark:text-zinc-900 text-sm font-semibold hover:bg-zinc-700 dark:hover:bg-zinc-300 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                                {{ __('projects.live_demo') }}
                            </a>
                            <a x-show="previewProject.github_link" :href="previewProject.github_link"
                               target="_blank" rel="noopener"
                               class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-white text-zinc-900 border border-zinc-300 dark:bg-zinc-900 dark:text-zinc-100 dark:border-zinc-700 text-sm font-semibold hover:bg-zinc-50 dark:hover:bg-zinc-800 transition">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                </svg>
                                {{ __('projects.github') }}
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
@if($testimonials->isNotEmpty())
<section id="testimonials" class="py-28 bg-white dark:bg-zinc-900">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-5xl font-bold heading tracking-tight text-zinc-900 dark:text-zinc-100">
                {{ __('testimonials.title') }}
            </h2>
            <p class="text-zinc-600 dark:text-zinc-400 mt-3 text-lg">{{ __('testimonials.subtitle') }}</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
            <figure class="bg-zinc-50 dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded-3xl p-8 flex flex-col hover:border-zinc-400 dark:hover:border-zinc-500 hover:shadow-lg transition-all"
                    data-aos="fade-up">
                <div class="flex items-center justify-between">
                    <span class="text-5xl leading-none font-serif text-zinc-300 dark:text-zinc-600" aria-hidden="true">“</span>

                    @if($testimonial->rating)
                        <div class="flex items-center gap-1" role="img" aria-label="{{ __('testimonials.rating') }}: {{ $testimonial->rating }}/5">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-amber-400' : 'text-zinc-300 dark:text-zinc-600' }}"
                                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.077 10.1c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                            @endfor
                        </div>
                    @endif
                </div>

                <blockquote class="mt-6 flex-1 text-zinc-600 dark:text-zinc-400 leading-relaxed">
                    <p>{{ $testimonial->content }}</p>
                </blockquote>

                <figcaption class="mt-8 pt-6 border-t border-zinc-200 dark:border-zinc-700 flex items-center gap-4">
                    @if($testimonial->avatar)
                        <img src="{{ asset('testimonials/' . $testimonial->avatar) }}"
                             alt="{{ $testimonial->name }}"
                             class="w-12 h-12 rounded-full object-cover">
                    @else
                        <div class="w-12 h-12 rounded-full bg-zinc-900 dark:bg-zinc-100 text-white dark:text-zinc-900 flex items-center justify-center font-semibold">
                            {{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($testimonial->name, 0, 1)) }}
                        </div>
                    @endif

                    <div>
                        <div class="font-semibold text-zinc-900 dark:text-zinc-100">{{ $testimonial->name }}</div>
                        @php
                            $meta = collect([$testimonial->position, $testimonial->company])->filter()->implode(', ');
                        @endphp
                        @if($meta)
                            <div class="text-sm text-zinc-500 dark:text-zinc-400">{{ $meta }}</div>
                        @endif
                    </div>
                </figcaption>
            </figure>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CONTACT -->
<section id="contact" class="py-28">
<div class="max-w-6xl mx-auto px-6">
        <h2 class="text-5xl font-bold heading text-center mb-4" data-aos="fade-up">{{ __('contact.title') }}</h2>
        <p class="text-center text-zinc-600 dark:text-zinc-400 mb-12">{{ __('contact.subtitle') }}</p>

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
                            <span class="font-medium">{{ __('contact.form.success') }}</span>
                        </div>
                    @endif

                    <input type="text" name="name" placeholder="{{ __('contact.form.name') }}" required
                           class="w-full bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 dark:text-zinc-100 dark:placeholder-zinc-500 rounded-2xl px-6 py-5 focus:border-black dark:focus:border-zinc-500 focus:outline-none">

                    <input type="email" name="email" placeholder="{{ __('contact.form.email') }}" required
                           class="w-full bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 dark:text-zinc-100 dark:placeholder-zinc-500 rounded-2xl px-6 py-5 focus:border-black dark:focus:border-zinc-500 focus:outline-none">

                    <textarea name="message" rows="6" placeholder="{{ __('contact.form.message') }}" required
                              class="w-full bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 dark:text-zinc-100 dark:placeholder-zinc-500 rounded-3xl px-6 py-5 focus:border-black dark:focus:border-zinc-500 focus:outline-none resize-y"></textarea>

                    <button type="submit"
                            class="w-full bg-white text-zinc-900 border border-zinc-300 font-semibold py-6 rounded-3xl hover:bg-zinc-50 dark:bg-black dark:text-zinc-100 dark:border-zinc-700 dark:hover:bg-zinc-900 transition text-base">
                        {{ __('contact.form.send') }}
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
                        <div class="text-zinc-500 dark:text-zinc-400">{{ __('contact.social.email') }}</div>
                    </div>
                </a>

                <a href="https://github.com/ridhonf" target="_blank"
                   class="social-box bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 hover:border-zinc-800 dark:hover:border-zinc-400 rounded-3xl p-6 flex items-center gap-6 group">
                    <img src="https://cdn-icons-png.flaticon.com/128/733/733609.png" alt="GitHub" class="w-14 h-14">
                    <div>
                        <div class="font-semibold text-xl">GitHub</div>
                        <div class="text-zinc-500 dark:text-zinc-400">{{ __('contact.social.github') }}</div>
                    </div>
                </a>

                <a href="https://instagram.com/ridhoonf" target="_blank"
                   class="social-box bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 hover:border-pink-500 rounded-3xl p-6 flex items-center gap-6 group">
                    <img src="https://cdn-icons-png.flaticon.com/128/174/174855.png" alt="Instagram" class="w-14 h-14">
                    <div>
                        <div class="font-semibold text-xl">Instagram</div>
                        <div class="text-zinc-500 dark:text-zinc-400">{{ __('contact.social.instagram') }}</div>
                    </div>
                </a>

                <a href="https://www.linkedin.com/in/ridho-norfajar-2b6934299/" target="_blank"
                   class="social-box bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 hover:border-blue-600 rounded-3xl p-6 flex items-center gap-6 group">
                    <img src="https://cdn-icons-png.flaticon.com/128/174/174857.png" alt="LinkedIn" class="w-14 h-14">
                    <div>
                        <div class="font-semibold text-xl">LinkedIn</div>
                        <div class="text-zinc-500 dark:text-zinc-400">{{ __('contact.social.linkedin') }}</div>
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
        <p class="text-zinc-400 dark:text-zinc-500 mt-3">{{ __('footer.rights') }}</p>
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
