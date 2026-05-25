@extends('admin.layout')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">Projects</h1>
        <a href="{{ route('admin.projects.create') }}"
           class="bg-black hover:bg-zinc-800 text-white px-6 py-3 rounded-2xl flex items-center gap-2 transition">
            + Tambah Project
        </a>
    </div>

    @if($projects->isEmpty())
        <div class="bg-white rounded-3xl p-16 text-center">
            <p class="text-zinc-500 text-lg">Belum ada project yang ditambahkan.</p>
            <a href="{{ route('admin.projects.create') }}" class="mt-4 inline-block text-black underline">
                Tambahkan Project Pertama →
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
            <div class="bg-white border border-zinc-200 rounded-3xl overflow-hidden hover:shadow-xl transition-all duration-300">
                <!-- Gambar -->
                <div class="h-52 overflow-hidden bg-zinc-100">
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}"
                             alt="{{ $project->title }}"
                             class="w-full h-full object-cover">
                    @else
                        <div class="h-full flex items-center justify-center text-zinc-300 text-4xl">📷</div>
                    @endif
                </div>

                <!-- Konten -->
                <div class="p-6">
                    <h3 class="font-semibold text-xl line-clamp-2">{{ $project->title }}</h3>
                    <p class="mt-3 text-zinc-600 line-clamp-3 text-sm leading-relaxed">
                        {{ $project->description }}
                    </p>

                    <div class="flex gap-3 mt-6">
                        <a href="{{ route('admin.projects.edit', $project) }}"
                           class="flex-1 text-center py-3 border border-zinc-300 rounded-2xl hover:bg-zinc-50 text-sm font-medium">
                            Edit
                        </a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus project ini?')"
                                    class="w-full py-3 text-red-600 border border-red-200 rounded-2xl hover:bg-red-50 text-sm font-medium">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
