@extends('admin.layout')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold">Kelola Data CV</h1>
        <p class="text-zinc-500 mt-2">Isi data berikut untuk generate CV otomatis. Data ini akan digunakan untuk preview dan download PDF.</p>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-300 text-emerald-700 px-6 py-4 rounded-2xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.cv.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Profile Photo -->
        <div class="bg-white rounded-3xl p-8 shadow">
            <h2 class="text-xl font-semibold mb-6">Foto Profil</h2>
            <div class="flex items-center gap-6">
                <div class="shrink-0">
                    @if($user->profile_photo && file_exists(public_path('img/' . $user->profile_photo)))
                        <img src="{{ asset('img/' . $user->profile_photo) }}" alt="Profile" class="w-24 h-24 rounded-full object-cover border-2 border-zinc-200">
                    @else
                        <div class="w-24 h-24 rounded-full bg-zinc-200 flex items-center justify-center">
                            <span class="text-3xl font-bold text-zinc-400">{{ strtoupper(substr($user->name ?? 'F', 0, 1)) }}</span>
                        </div>
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Ganti Foto Profil (maks 2MB)</label>
                    <input type="file" name="profile_photo" accept="image/*"
                           class="w-full border border-zinc-300 rounded-2xl px-5 py-4">
                    @error('profile_photo')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                    <p class="text-sm text-zinc-500 mt-2">Format: JPG, PNG, WebP. Rasio 1:1 direkomendasikan.</p>
                </div>
            </div>
        </div>

        <!-- Basic Info -->
        <div class="bg-white rounded-3xl p-8 shadow">
            <h2 class="text-xl font-semibold mb-6">Informasi Dasar</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ $user->name }}" required
                           class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:border-black focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ $user->email }}" required
                           class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:border-black focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Nomor Telepon</label>
                    <input type="text" name="phone" value="{{ $user->phone }}"
                           class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:border-black focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Lokasi</label>
                    <input type="text" name="location" value="{{ $user->location }}"
                           class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:border-black focus:outline-none"
                           placeholder="Contoh: Banjarmasin, Kalimantan Selatan">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Judul/Posisi</label>
                    <input type="text" name="title" value="{{ $user->title }}"
                           class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:border-black focus:outline-none"
                           placeholder="Contoh: Junior Web Developer">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Tanggal Lahir</label>
                    <input type="date" name="birth_date" value="{{ $user->birth_date }}"
                           class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:border-black focus:outline-none">
                </div>
            </div>
        </div>

        <!-- Profil -->
        <div class="bg-white rounded-3xl p-8 shadow">
            <h2 class="text-xl font-semibold mb-6">Profil / Tentang Saya</h2>
            <textarea name="bio" rows="4"
                      class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:border-black focus:outline-none resize-y"
                      placeholder="Tulis ringkasan singkat tentang dirimu, passion, dan tujuan karier...">{{ $user->bio }}</textarea>
        </div>

        <!-- Pendidikan -->
        <div class="bg-white rounded-3xl p-8 shadow">
            <h2 class="text-xl font-semibold mb-6">Pendidikan</h2>
            <textarea name="education" rows="5"
                      class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:border-black focus:outline-none resize-y font-mono text-sm"
                      placeholder="Tulis satu per baris. Contoh:
SMK Negeri 2 Banjarmasin - Rekayasa Perangkat Lunak (2022 - 2025)
SMP Islam Al-Huda Banjarmasin (2019 - 2022)
SDN Pangeran 2 Banjarmasin (2013 - 2019)">{{ $user->education }}</textarea>
            <p class="text-sm text-zinc-500 mt-2">Satu entri per baris. Format bebas, misal: <code class="bg-zinc-100 px-1.5 py-0.5 rounded text-xs">Nama Institusi - Jurusan (Tahun)</code></p>
        </div>

        <!-- Pengalaman -->
        <div class="bg-white rounded-3xl p-8 shadow">
            <h2 class="text-xl font-semibold mb-6">Pengalaman Kerja / Organisasi</h2>
            <textarea name="experience" rows="6"
                      class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:border-black focus:outline-none resize-y font-mono text-sm"
                      placeholder="Tulis satu per baris. Contoh:
Web Developer - BK SMKN 2 Banjarmasin (2024)
- Mengembangkan website bimbingan konseling menggunakan Laravel & Tailwind CSS
- Bertanggung jawab pada frontend dan backend development
Freelance Web Developer (2023 - Sekarang)
- Membuat website company profile dan e-commerce sederhana">{{ $user->experience }}</textarea>
            <p class="text-sm text-zinc-500 mt-2">Satu pengalaman per baris. Bisa pakai bullet points dengan tanda strip (-) di baris berikutnya.</p>
        </div>

        <!-- Tech Stack / Skills -->
        <div class="bg-white rounded-3xl p-8 shadow">
            <h2 class="text-xl font-semibold mb-6">Tech Stack (Keahlian Teknis)</h2>
            <textarea name="skills" rows="4"
                      class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:border-black focus:outline-none resize-y font-mono text-sm"
                      placeholder="Tulis satu per baris. Contoh:
HTML
CSS
Tailwind CSS
Laravel
PHP
JavaScript
MySQL
Git">{{ $user->skills }}</textarea>
            <p class="text-sm text-zinc-500 mt-2">Satu skill per baris. Akan ditampilkan sebagai badge di CV.</p>
        </div>

        <!-- Tools -->
        <div class="bg-white rounded-3xl p-8 shadow">
            <h2 class="text-xl font-semibold mb-6">Tools & Sertifikasi</h2>
            <textarea name="tools" rows="4"
                      class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:border-black focus:outline-none resize-y font-mono text-sm"
                      placeholder="Tulis satu per baris. Contoh:
VS Code
Figma
GitHub
TablePlus
DBngin
Laragon
Sertifikasi Laravel Basic (Dicoding)
Sertifikasi Web Dasar (Dicoding)">{{ $user->tools }}</textarea>
            <p class="text-sm text-zinc-500 mt-2">Satu item per baris. Akan ditampilkan di bagian Tools dan Sertifikasi.</p>
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-4">
            <button type="submit"
                    class="bg-teal-800 text-white px-8 py-3 rounded-2xl font-medium hover:bg-teal-900 transition inline-flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection