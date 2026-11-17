<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $user->name ?? 'Fajardev' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        teal: {
                            800: '#0f766e',
                            900: '#115e59',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .heading { font-family: 'Poppins', sans-serif; }
        @media print {
            .no-print { display: none !important; }
            .cv-container { box-shadow: none !important; }
        }
    </style>
</head>
<body class="bg-zinc-100 min-h-screen py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Header Actions -->
        <div class="no-print flex justify-end gap-3 mb-6">
            <a href="{{ route('cv.download') }}"
               class="bg-teal-800 text-white px-6 py-2.5 rounded-xl font-medium hover:bg-teal-900 transition inline-flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                Download PDF
            </a>
            @auth
            <a href="{{ route('admin.cv.edit') }}"
               class="bg-white text-zinc-700 border border-zinc-300 px-6 py-2.5 rounded-xl font-medium hover:bg-zinc-50 transition inline-flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit CV
            </a>
            @endauth
        </div>

        <!-- CV Container -->
        <div class="cv-container bg-white rounded-2xl shadow-2xl overflow-hidden">
            <div class="flex flex-col md:flex-row">
                <!-- Left Column - Dark Teal -->
                <div class="bg-teal-900 text-white md:w-2/5 p-8 md:p-12 relative">
                    <!-- Profile Photo -->
                    <div class="flex justify-center mb-8">
                        @if($user->profile_photo && file_exists(public_path('img/' . $user->profile_photo)))
                            <img src="{{ asset('img/' . $user->profile_photo) }}"
                                 alt="{{ $user->name }}"
                                 class="w-36 h-36 md:w-40 md:h-40 rounded-full object-cover border-4 border-teal-700">
                        @else
                            <div class="w-36 h-36 md:w-40 md:h-40 rounded-full bg-teal-700 border-4 border-teal-700 flex items-center justify-center">
                                <span class="text-5xl md:text-6xl font-bold heading">{{ strtoupper(substr($user->name ?? 'F', 0, 1)) }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Name -->
                    <div class="text-center mb-10">
                        <h1 class="text-3xl md:text-4xl font-bold heading tracking-tight">{{ $user->name ?? 'Fajardev' }}</h1>
                        <p class="text-teal-200 mt-2 font-medium">{{ $user->title ?? 'Junior Web Developer' }}</p>
                    </div>

                    <!-- Divider -->
                    <hr class="border-teal-700 my-6">

                    <!-- Contact Info -->
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-sm font-semibold uppercase tracking-wider text-teal-300 mb-4">Kontak</h3>
                            <div class="space-y-4">
                                @if($user->phone)
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 rounded-full bg-teal-800 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-teal-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-teal-300 uppercase tracking-wider">Telepon</p>
                                        <p class="text-sm">{{ $user->phone }}</p>
                                    </div>
                                </div>
                                @endif

                                @if($user->email)
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 rounded-full bg-teal-800 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-teal-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-teal-300 uppercase tracking-wider">Email</p>
                                        <p class="text-sm">{{ $user->email }}</p>
                                    </div>
                                </div>
                                @endif

                                @if($user->location)
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 rounded-full bg-teal-800 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-teal-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-teal-300 uppercase tracking-wider">Lokasi</p>
                                        <p class="text-sm">{{ $user->location }}</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Profil -->
                        @if($user->bio)
                        <div>
                            <h3 class="text-sm font-semibold uppercase tracking-wider text-teal-300 mb-4">Profil</h3>
                            <p class="text-teal-100 text-sm leading-relaxed">{{ $user->bio }}</p>
                        </div>
                        @endif

                        <!-- Pendidikan -->
                        @if($user->education)
                        <div>
                            <h3 class="text-sm font-semibold uppercase tracking-wider text-teal-300 mb-4">Pendidikan</h3>
                            <div class="space-y-3">
                                @foreach($user->education_array as $edu)
                                <div class="border-l-2 border-teal-700 pl-4">
                                    <p class="text-sm text-teal-100">{{ $edu }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Right Column - White -->
                <div class="bg-white md:w-3/5 p-8 md:p-12">
                    <!-- Pengalaman -->
                    @if($user->experience)
                    <div class="mb-10">
                        <h2 class="text-lg font-bold heading text-zinc-900 uppercase tracking-wider border-b-2 border-teal-800 pb-2 mb-6">Pengalaman</h2>
                        <div class="space-y-6">
                            @foreach($user->experience_array as $exp)
                            <div class="border-l-2 border-teal-200 pl-6">
                                <p class="text-zinc-700 leading-relaxed">{{ $exp }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Kemampuan -->
                    @if($user->skills || $user->tools)
                    <div class="mb-10">
                        <h2 class="text-lg font-bold heading text-zinc-900 uppercase tracking-wider border-b-2 border-teal-800 pb-2 mb-6">Kemampuan</h2>
                        <div class="grid md:grid-cols-2 gap-6">
                            @if($user->skills)
                            <div>
                                <h3 class="text-sm font-semibold text-zinc-600 uppercase tracking-wider mb-3">Tech Stack</h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($user->skills as $skill)
                                    <span class="px-3 py-1 text-xs font-medium bg-teal-50 text-teal-700 rounded-full border border-teal-100">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            @if($user->tools)
                            <div>
                                <h3 class="text-sm font-semibold text-zinc-600 uppercase tracking-wider mb-3">Tools</h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($user->tools as $tool)
                                    <span class="px-3 py-1 text-xs font-medium bg-zinc-100 text-zinc-700 rounded-full border border-zinc-200">{{ $tool }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Sertifikasi -->
                    @if($user->tools) {{-- Using tools field for certifications too --}}
                    <div>
                        <h2 class="text-lg font-bold heading text-zinc-900 uppercase tracking-wider border-b-2 border-teal-800 pb-2 mb-6">Sertifikasi</h2>
                        <div class="space-y-3">
                            @foreach($user->tools as $cert)
                            <div class="flex items-center gap-3 p-3 bg-zinc-50 rounded-xl border border-zinc-100">
                                <div class="w-2 h-2 rounded-full bg-teal-600 flex-shrink-0"></div>
                                <p class="text-sm text-zinc-700">{{ $cert }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="no-print text-center mt-8 text-zinc-500 text-sm">
            <p>Generated from {{ config('app.name') }} | {{ now()->format('F Y') }}</p>
        </div>
    </div>
</body>
</html>