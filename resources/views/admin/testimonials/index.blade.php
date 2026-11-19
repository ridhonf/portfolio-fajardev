@extends('admin.layout')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold">Testimonials</h1>
            <p class="text-zinc-500 mt-1">Kelola testimoni yang tampil di halaman utama.</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}"
           class="bg-black hover:bg-zinc-800 text-white px-6 py-3 rounded-2xl flex items-center gap-2 transition">
            + Tambah Testimoni
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-2xl">
            {{ session('success') }}
        </div>
    @endif

    @if($testimonials->isEmpty())
        <div class="bg-white rounded-3xl p-16 text-center">
            <p class="text-zinc-500 text-lg">Belum ada testimoni yang ditambahkan.</p>
            <a href="{{ route('admin.testimonials.create') }}" class="mt-4 inline-block text-black underline">
                Tambahkan Testimoni Pertama →
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
            <div class="bg-white border border-zinc-200 rounded-3xl p-6 flex flex-col hover:shadow-xl transition-all duration-300">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex items-center gap-4">
                        @if($testimonial->avatar)
                            <img src="{{ asset('testimonials/' . $testimonial->avatar) }}"
                                 alt="{{ $testimonial->name }}"
                                 class="w-14 h-14 rounded-full object-cover border border-zinc-200">
                        @else
                            <div class="w-14 h-14 rounded-full bg-zinc-900 text-white flex items-center justify-center font-semibold text-lg">
                                {{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($testimonial->name, 0, 1)) }}
                            </div>
                        @endif

                        <div>
                            <h3 class="font-semibold text-lg leading-tight">{{ $testimonial->name }}</h3>
                            <p class="text-sm text-zinc-500">
                                {{ collect([$testimonial->position, $testimonial->company])->filter()->implode(', ') ?: '—' }}
                            </p>
                        </div>
                    </div>

                    <span class="shrink-0 px-3 py-1 text-xs font-semibold rounded-full {{ $testimonial->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-zinc-200 text-zinc-600' }}">
                        {{ $testimonial->is_published ? 'Tampil' : 'Draft' }}
                    </span>
                </div>

                @if($testimonial->rating)
                    <div class="mt-4 flex items-center gap-1 text-amber-400 text-sm">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="{{ $i <= $testimonial->rating ? '' : 'text-zinc-300' }}">★</span>
                        @endfor
                    </div>
                @endif

                <p class="mt-4 text-zinc-600 line-clamp-4 text-sm leading-relaxed flex-1">
                    {{ $testimonial->content }}
                </p>

                <div class="mt-4 text-xs text-zinc-400">Urutan: {{ $testimonial->sort_order }}</div>

                <div class="flex gap-3 mt-6">
                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                       class="flex-1 text-center py-3 border border-zinc-300 rounded-2xl hover:bg-zinc-50 text-sm font-medium">
                        Edit
                    </a>
                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus testimoni ini?')"
                                class="w-full py-3 text-red-600 border border-red-200 rounded-2xl hover:bg-red-50 text-sm font-medium">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $testimonials->links() }}
        </div>
    @endif
</div>
@endsection
