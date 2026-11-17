<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $cvData['personal']['name'] }} - CV</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .sidebar-bg { background-color: #18181b; } /* zinc-950 */
        .accent-color { color: #10b981; } /* emerald-500 */
        .accent-bg { background-color: #10b981; }
        .accent-border { border-color: #10b981; }
        .text-muted { color: #71717a; } /* zinc-500 */
        .divider { border-color: #10b981; }
        @media print {
            .no-print { display: none !important; }
            .page-break { page-break-after: always; }
            body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        }
        .skill-bar-bg { background-color: #3f3f46; } /* zinc-700 */
        .skill-bar-fill { background-color: #10b981; } /* emerald-500 */
    </style>
</head>
<body class="bg-zinc-100 min-h-screen">
    <div class="max-w-6xl mx-auto my-8 md:my-16 bg-white shadow-2xl overflow-hidden rounded-xl no-print">
        <div class="p-6 md:p-8 bg-zinc-50 border-b border-zinc-200 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-zinc-900">CV Preview</h1>
            <div class="flex gap-3">
                <a href="{{ route('cv.download') }}" 
                   class="px-6 py-2.5 bg-emerald-600 text-white rounded-xl font-medium hover:bg-emerald-700 transition shadow-sm">
                    Download PDF
                </a>
                <a href="/" class="px-6 py-2.5 border border-zinc-300 text-zinc-700 rounded-xl font-medium hover:bg-zinc-100 transition">
                    Back to Site
                </a>
            </div>
        </div>
        <div class="p-0">
            @include('cv.content', ['cvData' => $cvData, 'isPreview' => true])
        </div>
    </div>
</body>
</html>