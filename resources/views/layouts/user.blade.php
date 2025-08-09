<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - مدارِك</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-50 min-h-screen">
    <header class="bg-white border-b shadow-sm">
        <div class="max-w-6xl mx-auto px-4 py-4">
            <h1 class="text-xl font-bold text-gray-800">مدارِك</h1>
        </div>
    </header>
    <main class="max-w-6xl mx-auto p-6">
        @yield('content')
    </main>
</body>
</html>