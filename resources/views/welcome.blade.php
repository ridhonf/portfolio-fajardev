<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fajardev | Junior Web Developer</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
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

        .mobile-link:hover {
            color: black;
            padding-left: 8px;
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
<body class="bg-white text-zinc-900">

<!-- NAVBAR -->
<nav class="fixed top-0 w-full bg-white/95 backdrop-blur-md z-50 border-b border-zinc-200">
    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">

        <a href="/" class="text-3xl font-bold heading tracking-tighter text-black">Fajardev</a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-10 text-base font-medium">
            <a href="#home" class="nav-link text-zinc-700">Home</a>
            <a href="#about" class="nav-link text-zinc-700">About</a>
            <a href="#skills" class="nav-link text-zinc-700">Skills</a>
            <a href="#projects" class="nav-link text-zinc-700">Projects</a>
            <a href="#contact" class="nav-link text-zinc-700">Contact</a>
        </div>

        <!-- Hamburger Menu - Hanya tampil di Mobile -->
        <button id="hamburger"
                class="md:hidden text-4xl leading-none focus:outline-none z-50">
            ☰
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t shadow-lg">
        <div class="px-6 py-10 flex flex-col gap-8 text-xl font-medium">
            <a href="#home" class="mobile-link">Home</a>
            <a href="#about" class="mobile-link">About</a>
            <a href="#skills" class="mobile-link">Skills</a>
            <a href="#projects" class="mobile-link">Projects</a>
            <a href="#contact" class="mobile-link">Contact</a>
        </div>
    </div>
</nav>

<!-- HERO -->
<section id="home" class="min-h-screen flex items-center pt-24">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-20 items-center">
        <div data-aos="fade-right">
            <h1 class="text-6xl md:text-7xl font-bold heading leading-none">Hi, I'm Fajar</h1>
            <p class="text-3xl text-zinc-600 mt-4">Junior Web Developer</p>
            <p class="mt-8 text-lg text-zinc-600 max-w-lg">Creating modern, responsive, and elegant websites with Laravel + Tailwind CSS.</p>
            <div class="mt-12 flex gap-5">
                <a href="#projects" class="bg-black text-white px-8 py-4 rounded-2xl font-semibold hover:bg-zinc-800 transition">View My Projects</a>
                <a href="#contact" class="border border-zinc-300 px-8 py-4 rounded-2xl hover:bg-zinc-100 transition">Get In Touch</a>
            </div>
        </div>
        <div data-aos="fade-left" class="flex justify-center">
            <img src="{{ asset('img/foto.jpg') }}" alt="Fajar" class="rounded-3xl shadow-2xl w-full max-w-md">
        </div>
    </div>
</section>

<!-- ABOUT -->
<section id="about" class="py-28 bg-zinc-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <h2 class="text-5xl md:text-6xl font-bold heading mb-10">About Me</h2>
                <p class="text-lg text-zinc-600 leading-relaxed">
                    I am a passionate Junior Web Developer who loves creating clean, fast, and user-friendly websites.
                    I enjoy challenges in building modern web applications using the latest technologies like Laravel and Tailwind CSS.
                </p>
                <p class="text-lg text-zinc-600 leading-relaxed mt-8">
                    With a strong focus on detail and user experience, I am committed to delivering high-quality work.
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
    function getLevelColor($level) {
        $level = strtolower($level);
        if ($level === 'advanced') {
            return 'bg-emerald-100 text-emerald-700';
        } elseif ($level === 'intermediate') {
            return 'bg-amber-100 text-amber-700';
        } else {
            return 'bg-zinc-100 text-zinc-700'; // Basic / Default
        }
    }

    $techStack = [
        ['icon' => 'https://cdn-icons-png.flaticon.com/128/1051/1051277.png', 'name' => 'HTML', 'level' => 'Advanced'],
        ['icon' => 'https://cdn-icons-png.flaticon.com/128/732/732190.png', 'name' => 'CSS', 'level' => 'Intermediate'],
        ['icon' => 'https://files.raycast.com/xc28yi9kvhmju8ae1hjixwutznke', 'name' => 'Tailwind CSS', 'level' => 'Intermediate'],
        ['icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1280px-Laravel.svg.png', 'name' => 'Laravel', 'level' => 'Basic'],
        ['icon' => 'https://cdn-icons-png.flaticon.com/128/5968/5968332.png', 'name' => 'PHP', 'level' => 'Intermediate'],
        ['icon' => 'https://cdn-icons-png.flaticon.com/128/5968/5968292.png', 'name' => 'JavaScript', 'level' => 'Basic'],
        ['icon' => 'https://cdn-icons-png.flaticon.com/128/5968/5968313.png', 'name' => 'MySQL', 'level' => 'Intermediate'],
    ];

    $tools = [
        ['icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vscode/vscode-original.svg', 'name' => 'VS Code', 'level' => 'Advanced'],
        ['icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg', 'name' => 'Figma', 'level' => 'Intermediate'],
        ['icon' => 'https://cdn-icons-png.flaticon.com/128/733/733609.png', 'name' => 'GitHub', 'level' => 'Basic'],
    ];
@endphp

<section id="skills" class="py-28 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-5xl font-bold heading tracking-tight text-zinc-900">
                My <span class="text-black">Skills</span>
            </h2>
            <p class="text-zinc-600 mt-3 text-lg">Technologies and tools I work with.</p>
        </div>

        <!-- Tab Buttons -->
        <div class="flex justify-center mb-12">
            <div class="bg-zinc-100 rounded-3xl p-1 inline-flex shadow-sm">
                <button onclick="showTab(1)" id="tab1"
                        class="tab-button px-8 py-3 rounded-3xl font-medium transition-all active bg-white shadow">
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
                <div class="bg-white border border-zinc-200 rounded-3xl p-6 hover:border-zinc-400 hover:shadow-lg transition-all">
                    <div class="flex items-center gap-4">
                        <img src="{{ $item['icon'] }}" alt="{{ $item['name'] }}" class="w-12 h-12">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-zinc-900">{{ $item['name'] }}</h3>
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

        <!-- Tools -->
        <div id="content2" class="tab-content hidden">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($tools as $item)
                <div class="bg-white border border-zinc-200 rounded-3xl p-6 hover:border-zinc-400 hover:shadow-lg transition-all">
                    <div class="flex items-center gap-4">
                        <img src="{{ $item['icon'] }}" alt="{{ $item['name'] }}" class="w-12 h-12">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-zinc-900">{{ $item['name'] }}</h3>
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
            btn.classList.remove('active', 'bg-white', 'shadow');
        });
        document.getElementById('tab' + tab).classList.add('active', 'bg-white', 'shadow');
    }
</script>

<!-- PROJECTS -->
<section id="projects" class="py-28 bg-zinc-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-5xl font-bold heading text-center mb-16" data-aos="fade-up">Featured Projects</h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
            <div class="bg-white border border-zinc-200 rounded-3xl overflow-hidden
                        transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl
                        hover:border-zinc-300 group"
                 data-aos="fade-up">

                <!-- GAMBAR (tanpa hover scale) -->
                <div class="h-64 overflow-hidden">
                    <img src="{{ asset('storage/' . $project->image) }}"
                    alt="{{ $project->title }}"
                    class="w-full h-full object-cover">
                </div>

                <!-- KONTEN -->
                <div class="p-8">
                    <h3 class="font-semibold text-2xl">{{ $project->title }}</h3>
                    <p class="text-zinc-600 mt-3 line-clamp-4">{{ $project->description }}</p>
                    <div class="mt-6 flex gap-6 text-sm">
                        @if($project->demo_link)
                            <a href="{{ $project->demo_link }}" target="_blank" class="underline">Live Demo</a>
                        @endif
                        @if($project->github_link)
                            <a href="{{ $project->github_link }}" target="_blank" class="underline">GitHub</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CONTACT -->
<section id="contact" class="py-28">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-5xl font-bold heading text-center mb-4" data-aos="fade-up">Get In Touch</h2>
        <p class="text-center text-zinc-600 mb-12">I'm always open to new opportunities and interesting projects.</p>

        <div class="grid md:grid-cols-2 gap-12 items-start">

            <!-- FORM KIRI -->
            <div data-aos="fade-right" class="bg-white border border-zinc-200 rounded-3xl p-8 md:p-10">
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Notifikasi Sukses -->
                    @if(session('success'))
                        <div id="success-message"
                             class="bg-emerald-50 border border-emerald-300 text-emerald-700 px-6 py-4 rounded-2xl flex items-center gap-3">
                            <span class="text-2xl">✅</span>
                            <span class="font-medium">Message sent!</span>
                        </div>
                    @endif

                    <input type="text" name="name" placeholder="Your Name" required
                           class="w-full bg-white border border-zinc-300 rounded-2xl px-6 py-5 focus:border-black focus:outline-none">

                    <input type="email" name="email" placeholder="Your Email" required
                           class="w-full bg-white border border-zinc-300 rounded-2xl px-6 py-5 focus:border-black focus:outline-none">

                    <textarea name="message" rows="6" placeholder="Your Message..." required
                              class="w-full bg-white border border-zinc-300 rounded-3xl px-6 py-5 focus:border-black focus:outline-none resize-y"></textarea>

                    <button type="submit"
                            class="w-full bg-black text-white font-semibold py-6 rounded-3xl hover:bg-zinc-800 transition text-base">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- SOSMED KANAN -->
            <div data-aos="fade-left" class="space-y-6 pt-4">
                <a href="mailto:ridhonorfajar@gmail.com" target="_blank"
                   class="social-box bg-white border border-zinc-200 hover:border-red-800 rounded-3xl p-6 flex items-center gap-6 group">
                    <img src="https://cdn-icons-png.flaticon.com/128/5968/5968534.png" alt="Email" class="w-14 h-14">
                    <div>
                        <div class="font-semibold text-xl">Gmail</div>
                        <div class="text-zinc-500">ridhonorfajar@gmail.com</div>
                    </div>
                </a>

                <a href="https://wa.me/6287823678121" target="_blank"
                   class="social-box bg-white border border-zinc-200 hover:border-emerald-500 rounded-3xl p-6 flex items-center gap-6 group">
                    <img src="https://cdn-icons-png.flaticon.com/128/4423/4423697.png" alt="WhatsApp" class="w-14 h-14">
                    <div>
                        <div class="font-semibold text-xl">WhatsApp</div>
                        <div class="text-zinc-500">Chat directly with me</div>
                    </div>
                </a>

                <a href="https://instagram.com/ridhoonf" target="_blank"
                   class="social-box bg-white border border-zinc-200 hover:border-pink-500 rounded-3xl p-6 flex items-center gap-6 group">
                    <img src="https://cdn-icons-png.flaticon.com/128/174/174855.png" alt="Instagram" class="w-14 h-14">
                    <div>
                        <div class="font-semibold text-xl">Instagram</div>
                        <div class="text-zinc-500">@ridhonorfajar</div>
                    </div>
                </a>

                <a href="https://facebook.com/noorfajra" target="_blank"
                   class="social-box bg-white border border-zinc-200 hover:border-blue-600 rounded-3xl p-6 flex items-center gap-6 group">
                    <img src="https://cdn-icons-png.flaticon.com/128/5968/5968764.png" alt="Facebook" class="w-14 h-14">
                    <div>
                        <div class="font-semibold text-xl">Facebook</div>
                        <div class="text-zinc-500">Connect with me</div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-zinc-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <p class="text-3xl font-bold heading">Fajardev</p>
        <p class="text-zinc-400 mt-3">© 2026 Fajardev. All rights reserved.</p>
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

</body>
</html>
