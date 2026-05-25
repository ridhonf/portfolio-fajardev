@extends('admin.layout')

@section('content')
<div class="max-w-7xl mx-auto">
    <h1 class="text-4xl font-bold mb-2">Dashboard</h1>
    <p class="text-zinc-600">Selamat datang di Admin Panel Fajardev</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">
        <!-- Pesan Belum Dibaca -->
        <div class="bg-white p-8 rounded-3xl shadow">
            <h3 class="text-6xl font-bold text-emerald-600">
                {{ \App\Models\Contact::where('is_read', false)->count() }}
            </h3>
            <p class="text-zinc-500 mt-2">Pesan Belum Dibaca</p>
        </div>

        <!-- Total Project -->
        <div class="bg-white p-8 rounded-3xl shadow">
            <h3 class="text-6xl font-bold text-blue-600">
                {{ \App\Models\Project::count() }}
            </h3>
            <p class="text-zinc-500 mt-2">Total Project</p>
        </div>

        <!-- Total Kontak -->
        <div class="bg-white p-8 rounded-3xl shadow">
            <h3 class="text-6xl font-bold text-purple-600">
                {{ \App\Models\Contact::count() }}
            </h3>
            <p class="text-zinc-500 mt-2">Total Pesan Masuk</p>
        </div>
    </div>

    <div class="mt-12 flex gap-4">
        <a href="{{ route('admin.projects.index') }}"
           class="bg-black text-white px-8 py-4 rounded-3xl hover:bg-zinc-800 font-medium">
            Kelola Projects →
        </a>
        <a href="{{ route('admin.contacts.index') }}"
           class="border border-zinc-300 px-8 py-4 rounded-3xl hover:bg-zinc-50 font-medium">
            Lihat Semua Inbox →
        </a>
    </div>
</div>
@endsection
