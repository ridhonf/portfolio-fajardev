<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | fajardev</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }

        .sidebar-link {
            transition: all 0.3s ease;
        }
        .sidebar-link:hover {
            background-color: #27272a;
            transform: translateX(6px);
        }
        .sidebar-link.active {
            background-color: #18181b;
            color: white;
            border-left: 4px solid #10b981;
        }
    </style>
</head>
<body class="bg-zinc-100">

<div class="flex h-screen overflow-hidden">

    <!-- SIDEBAR -->
    <div id="sidebar" class="w-64 bg-zinc-900 text-white flex flex-col fixed md:static h-full z-50 -translate-x-full md:translate-x-0 transition-all duration-300 shadow-2xl md:shadow-none">

        <!-- Header Sidebar -->
        <div class="p-6 border-b border-zinc-800 flex items-center justify-between">
            <!-- Tombol Close (X) di Kiri -->
            <button onclick="toggleSidebar()" class="md:hidden text-3xl text-zinc-400 hover:text-white mr-3">
                ✕
            </button>

            <h1 class="text-2xl font-bold">fajardev <span class="text-emerald-500">Admin</span></h1>
        </div>

        <nav class="flex-1 p-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center gap-3 px-5 py-3.5 rounded-2xl text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.contacts.index') }}" class="sidebar-link flex items-center gap-3 px-5 py-3.5 rounded-2xl text-sm font-medium {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                Inbox Contact
            </a>
            <a href="{{ route('admin.projects.index') }}" class="sidebar-link flex items-center gap-3 px-5 py-3.5 rounded-2xl text-sm font-medium {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                Projects
            </a>
        </nav>
    </div>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="bg-white border-b px-6 py-5 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <button onclick="toggleSidebar()" class="md:hidden text-3xl text-zinc-700">
                    ☰
                </button>
                <h2 class="text-xl font-semibold text-zinc-800">Welcome, Admin</h2>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-600 hover:text-red-700 font-medium">Logout</button>
            </form>
        </header>

        <main class="flex-1 overflow-auto p-4 md:p-8 bg-zinc-50">
            @yield('content')
        </main>
    </div>
</div>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('-translate-x-full');
    }

    // Close sidebar saat klik link di mobile
    document.querySelectorAll('.sidebar-link').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 768) {
                document.getElementById('sidebar').classList.add('-translate-x-full');
            }
        });
    });
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init({ once: true });</script>
</body>
</html>
