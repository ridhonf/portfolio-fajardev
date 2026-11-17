<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $user->name ?? 'Fajardev' }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap');
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; font-size: 11pt; line-height: 1.6; color: #18181b; }
        .heading { font-family: 'Poppins', sans-serif; }
        .cv-container { max-width: 210mm; margin: 0 auto; box-shadow: 0 0 20px rgba(0,0,0,0.1); }
        .teal-900 { color: #115e59; }
        .teal-800 { color: #0f766e; }
        .bg-teal-900 { background-color: #115e59; }
        .bg-teal-800 { background-color: #0f766e; }
        .bg-teal-700 { background-color: #0f766e; }
        .bg-teal-50 { background-color: #f0fdfa; }
        .bg-zinc-50 { background-color: #fafafa; }
        .text-teal-100 { color: #99f6e4; }
        .text-teal-200 { color: #5eead4; }
        .text-teal-300 { color: #2dd4bf; }
        .text-teal-700 { color: #0f766e; }
        .text-zinc-900 { color: #18181b; }
        .text-zinc-700 { color: #3f3f46; }
        .text-zinc-600 { color: #52525b; }
        .text-zinc-500 { color: #71717a; }
        .text-white { color: #ffffff; }
        .border-teal-700 { border-color: #0f766e; }
        .border-teal-800 { border-color: #115e59; }
        .border-teal-200 { border-color: #5eead4; }
        .border-teal-100 { border-color: #99f6e4; }
        .border-zinc-200 { border-color: #e4e4e7; }
        .border-zinc-100 { border-color: #f4f4f5; }
        .rounded-full { border-radius: 9999px; }
        .rounded-xl { border-radius: 12px; }
        .flex { display: flex; }
        .items-center { align-items: center; }
        .justify-center { justify-content: center; }
        .justify-between { justify-content: space-between; }
        .gap-2 { gap: 8px; }
        .gap-3 { gap: 12px; }
        .gap-4 { gap: 16px; }
        .gap-6 { gap: 24px; }
        .space-y-3 > * + * { margin-top: 12px; }
        .space-y-4 > * + * { margin-top: 16px; }
        .space-y-6 > * + * { margin-top: 24px; }
        .mb-2 { margin-bottom: 8px; }
        .mb-3 { margin-bottom: 12px; }
        .mb-4 { margin-bottom: 16px; }
        .mb-6 { margin-bottom: 24px; }
        .mb-8 { margin-bottom: 32px; }
        .mb-10 { margin-bottom: 40px; }
        .mt-2 { margin-top: 8px; }
        .mt-4 { margin-top: 16px; }
        .p-3 { padding: 12px; }
        .p-4 { padding: 16px; }
        .p-6 { padding: 24px; }
        .p-8 { padding: 32px; }
        .px-3 { padding-left: 12px; padding-right: 12px; }
        .px-4 { padding-left: 16px; padding-right: 16px; }
        .px-6 { padding-left: 24px; padding-right: 24px; }
        .py-1 { padding-top: 4px; padding-bottom: 4px; }
        .py-2 { padding-top: 8px; padding-bottom: 8px; }
        .text-center { text-align: center; }
        .text-sm { font-size: 10pt; }
        .text-xs { font-size: 9pt; }
        .text-lg { font-size: 12pt; }
        .text-xl { font-size: 14pt; }
        .text-2xl { font-size: 18pt; }
        .text-3xl { font-size: 22pt; }
        .font-medium { font-weight: 500; }
        .font-semibold { font-weight: 600; }
        .font-bold { font-weight: 700; }
        .uppercase { text-transform: uppercase; }
        .tracking-wider { letter-spacing: 0.05em; }
        .leading-relaxed { line-height: 1.625; }
        .w-8 { width: 32px; }
        .h-8 { height: 32px; }
        .w-36 { width: 144px; }
        .h-36 { height: 144px; }
        .w-40 { width: 160px; }
        .h-40 { height: 160px; }
        .flex-shrink-0 { flex-shrink: 0; }
        .flex-1 { flex: 1 1 0%; }
        .border-l-2 { border-left-width: 2px; }
        .border-b-2 { border-bottom-width: 2px; }
        .pl-4 { padding-left: 16px; }
        .pl-6 { padding-left: 24px; }
        .object-cover { object-fit: cover; }
        .rounded-full { border-radius: 9999px; }
        .shrink-0 { flex-shrink: 0; }
        .min-w-0 { min-width: 0; }
        .truncate { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .absolute { position: absolute; }
        .relative { position: relative; }
        .inset-0 { top: 0; right: 0; bottom: 0; left: 0; }
        .grid { display: grid; }
        .md\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        @media print {
            .cv-container { box-shadow: none; }
            body { background: white; }
        }
        @media (min-width: 768px) {
            .md\:flex { display: flex; }
            .md\:w-2\/5 { width: 40%; }
            .md\:w-3\/5 { width: 60%; }
            .md\:p-12 { padding: 48px; }
        }
    </style>
</head>
<body class="bg-white">
    <div class="cv-container">
        <div class="flex flex-col md:flex">
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
                @if($user->tools)
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
</body>
</html>