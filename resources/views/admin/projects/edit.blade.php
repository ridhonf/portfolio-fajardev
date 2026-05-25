@extends('admin.layout')

@section('content')
<div class="max-w-2xl mx-auto">

<!-- Tombol Kembali sebagai Button -->
    <div class="mb-8">
        <a href="{{ route('admin.projects.index') }}"
           class="inline-flex items-center gap-2 bg-white border border-zinc-300 hover:border-zinc-400 hover:bg-zinc-50 transition px-5 py-3 rounded-2xl text-sm font-medium text-zinc-700">
            ← Kembali
        </a>
    </div>

    <h1 class="text-3xl font-bold mb-8">Edit Project</h1>

    <div class="bg-white rounded-3xl p-8 shadow">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium mb-2">Judul Project</label>
                    <input type="text" name="title" value="{{ old('title', $project->title) }}" required
                           class="w-full border border-zinc-300 rounded-2xl px-5 py-4 focus:outline-none focus:border-black">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Deskripsi</label>
                    <textarea name="description" rows="6" required
                              class="w-full border border-zinc-300 rounded-3xl px-5 py-4 focus:outline-none focus:border-black">{{ old('description', $project->description) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Gambar Saat Ini</label>
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" class="w-64 rounded-2xl mb-4 border">
                    @endif
                    <input type="file" name="image" accept="image/*"
                           class="w-full border border-zinc-300 rounded-2xl px-5 py-4">
                    <p class="text-xs text-zinc-500 mt-1">Kosongkan jika tidak ingin mengganti gambar</p>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium mb-2">Link Demo (Opsional)</label>
                        <input type="url" name="demo_link" value="{{ old('demo_link', $project->demo_link) }}"
                               class="w-full border border-zinc-300 rounded-2xl px-5 py-4">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Link GitHub (Opsional)</label>
                        <input type="url" name="github_link" value="{{ old('github_link', $project->github_link) }}"
                               class="w-full border border-zinc-300 rounded-2xl px-5 py-4">
                    </div>
                </div>

                <button type="submit"
                        class="w-full bg-black text-white py-6 rounded-3xl font-semibold hover:bg-zinc-800 transition">
                    Update Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
