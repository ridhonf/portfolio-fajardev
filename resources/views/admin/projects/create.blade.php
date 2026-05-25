@extends('admin.layout')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.projects.index') }}"
           class="inline-flex items-center gap-2 bg-white border border-zinc-300 hover:border-zinc-400 hover:bg-zinc-50 transition px-5 py-3 rounded-2xl text-sm font-medium text-zinc-700">
            ← Kembali
        </a>
        <h1 class="text-3xl font-bold">Tambah Project Baru</h1>
    </div>

    <div class="bg-white rounded-3xl p-8 shadow">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Isi form kamu yang lama tetap sama -->
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium mb-2">Judul Project</label>
                    <input type="text" name="title" required
                           class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:outline-none focus:border-black">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Deskripsi</label>
                    <textarea name="description" rows="6" required
                              class="w-full border border-zinc-300 rounded-3xl px-5 py-4 focus:outline-none focus:border-black"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Gambar Project</label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full border border-zinc-300 rounded-2xl px-5 py-4">
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">Link Demo (Opsional)</label>
                        <input type="url" name="demo_link"
                               class="w-full border border-zinc-300 rounded-2xl px-5 py-4">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Link GitHub (Opsional)</label>
                        <input type="url" name="github_link"
                               class="w-full border border-zinc-300 rounded-2xl px-5 py-4">
                    </div>
                </div>

                <button type="submit"
                        class="w-full bg-black text-white py-6 rounded-3xl font-semibold hover:bg-zinc-800 transition">
                    Simpan Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
