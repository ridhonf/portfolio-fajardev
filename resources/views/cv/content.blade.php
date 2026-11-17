<div class="flex min-h-[1000px]">
    <!-- LEFT SIDEBAR -->
    <aside class="w-full md:w-2/5 sidebar-bg text-white p-8 md:p-10 flex flex-col" style="background-color: #18181b;">
        <!-- PROFILE PHOTO -->
        <div class="flex justify-center mb-8">
            <img src="{{ $cvData['personal']['photo'] }}" 
                 alt="{{ $cvData['personal']['name'] }}" 
                 class="w-36 h-36 md:w-40 md:h-40 rounded-xl object-cover border-4 border-emerald-500 shadow-xl">
        </div>

        <!-- NAME & TITLE -->
        <div class="text-center mb-10 pb-8 border-b border-zinc-700">
            <h2 class="font-serif text-3xl md:text-4xl font-bold text-emerald-400 leading-tight">{{ $cvData['personal']['name'] }}</h2>
            <p class="text-emerald-300 mt-2 text-lg font-medium">{{ $cvData['personal']['title'] }}</p>
        </div>

        <!-- CONTACT -->
        <div class="mb-10">
            <h3 class="font-serif text-xl font-bold text-emerald-400 mb-6 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                Contact
            </h3>
            <div class="space-y-5">
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-lg bg-emerald-500/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <p class="text-zinc-400 text-xs uppercase tracking-wider">Email</p>
                        <p class="text-white text-sm">{{ $cvData['personal']['email'] }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-lg bg-emerald-500/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </div>
                    <div>
                        <p class="text-zinc-400 text-xs uppercase tracking-wider">Phone</p>
                        <p class="text-white text-sm">{{ $cvData['personal']['phone'] }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-lg bg-emerald-500/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-zinc-400 text-xs uppercase tracking-wider">Location</p>
                        <p class="text-white text-sm">{{ $cvData['personal']['location'] }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-lg bg-emerald-500/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-emerald-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                    </div>
                    <div>
                        <p class="text-zinc-400 text-xs uppercase tracking-wider">GitHub</p>
                        <p class="text-white text-sm">{{ $cvData['personal']['github'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- PROFILE -->
        <div class="mb-10">
            <h3 class="font-serif text-xl font-bold text-emerald-400 mb-6 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Profile
            </h3>
            <p class="text-zinc-300 text-sm leading-relaxed">{{ $cvData['profile'] }}</p>
        </div>

        <!-- EDUCATION -->
        <div class="mb-10">
            <h3 class="font-serif text-xl font-bold text-emerald-400 mb-6 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                Education
            </h3>
            <div class="space-y-6">
                @foreach($cvData['education'] as $edu)
                <div class="pl-4 border-l-2 border-zinc-700 relative">
                    <div class="absolute left-0 top-1 w-3 h-3 rounded-full accent-bg -translate-x-1/2"></div>
                    <p class="text-zinc-400 text-xs uppercase tracking-wider mb-1">{{ $edu['period'] }}</p>
                    <p class="font-semibold text-white">{{ $edu['degree'] }}</p>
                    <p class="text-emerald-300 text-sm">{{ $edu['school'] }}</p>
                    <p class="text-zinc-400 text-sm mt-1">{{ $edu['description'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- CERTIFICATIONS -->
        <div>
            <h3 class="font-serif text-xl font-bold text-emerald-400 mb-6 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Certifications
            </h3>
            <ul class="space-y-3">
                @foreach($cvData['certifications'] as $cert)
                <li class="flex items-start gap-3 text-zinc-300 text-sm">
                    <svg class="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span>{{ $cert }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </aside>

    <!-- RIGHT MAIN AREA -->
    <main class="w-full md:w-3/5 bg-white p-8 md:p-10 flex-1">
        <!-- EXPERIENCE -->
        <section class="mb-12">
            <div class="flex items-center gap-3 mb-6 pb-3 border-b-2 border-emerald-500">
                <svg class="w-7 h-7 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                <h3 class="font-serif text-2xl font-bold text-zinc-900">Experience</h3>
            </div>
            <div class="space-y-8">
                @foreach($cvData['experience'] as $exp)
                <div>
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-2 mb-3">
                        <div>
                            <p class="font-bold text-lg text-zinc-900">{{ $exp['role'] }}</p>
                            <p class="text-emerald-600 font-medium">{{ $exp['company'] }}</p>
                        </div>
                        <p class="text-zinc-500 text-sm whitespace-nowrap">{{ $exp['period'] }}</p>
                    </div>
                    <p class="text-zinc-600 text-sm leading-relaxed mb-4">{{ $exp['description'] }}</p>
                    <ul class="space-y-2 pl-5">
                        @foreach($exp['achievements'] as $achievement)
                        <li class="flex items-start gap-2 text-zinc-600 text-sm">
                            <span class="w-1.5 h-1.5 rounded-full accent-bg flex-shrink-0 mt-2"></span>
                            <span>{{ $achievement }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </section>

        <!-- SKILLS -->
        <section class="mb-12">
            <div class="flex items-center gap-3 mb-6 pb-3 border-b-2 border-emerald-500">
                <svg class="w-7 h-7 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                <h3 class="font-serif text-2xl font-bold text-zinc-900">Skills</h3>
            </div>
            
            <!-- Tech Stack -->
            <div class="mb-8">
                <h4 class="font-semibold text-zinc-900 mb-4 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full accent-bg"></span>
                    Technical Skills
                </h4>
                <div class="space-y-4">
                    @foreach($cvData['skills']['tech'] as $skill)
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-zinc-700">{{ $skill['name'] }}</span>
                            <span class="text-sm font-semibold text-emerald-600">{{ $skill['percentage'] }}%</span>
                        </div>
                        <div class="h-2 rounded-full skill-bar-bg overflow-hidden">
                            <div class="h-full rounded-full skill-bar-fill" style="width: {{ $skill['percentage'] }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Tools -->
            <div>
                <h4 class="font-semibold text-zinc-900 mb-4 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full accent-bg"></span>
                    Tools & Platforms
                </h4>
                <div class="flex flex-wrap gap-2">
                    @foreach($cvData['skills']['tools'] as $tool)
                    <span class="px-3 py-1.5 text-xs font-medium rounded-full border
                        @if($tool['level'] === 'Advanced')
                            bg-emerald-50 text-emerald-700 border-emerald-200
                        @elseif($tool['level'] === 'Intermediate')
                            bg-amber-50 text-amber-700 border-amber-200
                        @else
                            bg-zinc-100 text-zinc-700 border-zinc-200
                        @endif">
                        {{ $tool['name'] }} <span class="font-normal opacity-75">({{ $tool['level'] }})</span>
                    </span>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- PROJECTS -->
        <section>
            <div class="flex items-center gap-3 mb-6 pb-3 border-b-2 border-emerald-500">
                <svg class="w-7 h-7 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                <h3 class="font-serif text-2xl font-bold text-zinc-900">Projects</h3>
            </div>
            <div class="space-y-6">
                @foreach($cvData['projects'] as $project)
                <div class="p-5 border border-zinc-200 rounded-xl hover:border-emerald-200 transition">
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-3 mb-3">
                        <h4 class="font-bold text-zinc-900">{{ $project['title'] }}</h4>
                        <div class="flex gap-2">
                            @if($project['demo_link'])
                            <a href="{{ $project['demo_link'] }}" target="_blank" class="text-xs font-medium text-emerald-600 hover:underline">Live Demo</a>
                            @endif
                            @if($project['github_link'])
                            <a href="{{ $project['github_link'] }}" target="_blank" class="text-xs font-medium text-zinc-600 hover:underline">GitHub</a>
                            @endif
                        </div>
                    </div>
                    <p class="text-zinc-600 text-sm mb-3">{{ $project['description'] }}</p>
                    
                    @if(!empty($project['technologies']))
                    <div class="flex flex-wrap gap-1.5 mb-3">
                        @foreach($project['technologies'] as $tech)
                        <span class="px-2.5 py-1 text-xs bg-zinc-100 text-zinc-700 rounded-full border border-zinc-200">{{ $tech }}</span>
                        @endforeach
                    </div>
                    @endif

                    @if(!empty($project['features']))
                    <ul class="space-y-1.5 text-sm text-zinc-600">
                        @foreach($project['features'] as $feature)
                        <li class="flex items-start gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-zinc-400 flex-shrink-0 mt-2"></span>
                            <span>{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endforeach
            </div>
        </section>
    </main>
</div>