@php
/** @var \Illuminate\Support\Collection $classesByGrade */
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفوف والفصول - مدارِك</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('Madarek Front End/المدير/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body class="font-arabic bg-gray-50">
    <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-40">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <img src="https://r2.flowith.net/files/o/1748451765656-Modern_Logo_Design_for_Madarek_School_Management_Platform_index_0@1024x1024.png" alt="مدارك" class="h-10 w-10 rounded-full">
                        <span class="lg:max-w-none lg:whitespace-normal mr-3 text-xl font-bold text-gray-800 leading-relaxed"><span class="hidden sm:inline-block">مدارِك - </span> مدرسة الصِّديقة</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="flex h-screen bg-gray-50">
        <nav class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col flex-grow bg-white border-l border-gray-200 pt-5 pb-4 overflow-y-auto">
                    <div class="flex-grow mt-5">
                        <nav class="px-3">
                            <ul class="space-y-1">
                                <li><a href="{{ route('manager.dashboard') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">لوحة التحكم</a></li>
                                <li><a href="{{ route('manager.users') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">إدارة المستخدمين</a></li>
                                <li><a href="{{ route('manager.classes') }}" class="bg-gradient-to-r from-amber-400 to-orange-500 text-slate-800 group flex items-center px-3 py-2 text-sm font-medium rounded-md shadow-lg">الصفوف والفصول</a></li>
                                <li><a href="{{ route('manager.schedules') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الجداول الدراسية</a></li>
                                <li><a href="{{ route('manager.attendance') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الحضور والغياب</a></li>
                                <li><a href="{{ route('manager.marks') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الدرجات والتقارير</a></li>
                                <li><a href="{{ route('manager.messages') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الرسائل</a></li>
                                <li><a href="{{ route('manager.announcements') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الإعلانات</a></li>
                                <li><a href="{{ route('manager.settings') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">إعدادات النظام</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>

        <main class="flex-1 overflow-y-auto focus:outline-none">
            <div class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    <div class="md:flex md:items-center md:justify-between">
                        <div class="flex-1 min-w-0">
                            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">الصفوف والفصول</h2>
                            <p class="mt-1 text-sm text-gray-500">إدارة الصفوف الدراسية والفصول داخل كل صف</p>
                        </div>
                    </div>

                    @foreach ($classesByGrade as $gradeLevel => $classes)
                        <h3 class="mt-6 text-lg font-semibold text-gray-800">الصف {{ $gradeLevel }}</h3>
                        <div class="mt-3 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($classes as $class)
                                <div class="bg-white overflow-hidden shadow rounded-lg" data-class-id="{{ $class->id }}">
                                    <div class="px-4 py-5 sm:p-6">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h4 class="text-lg font-medium text-gray-900 class-name">{{ $class->display_name ?? ("الصف " . $class->grade_level . " - الفصل " . $class->class_number) }}</h4>
                                                <p class="text-sm text-gray-500 sections-summary">
                                                    {{ $class->student_registrations_count }} طالب
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="space-y-2 sections-list">
                                                @foreach (($class->sections ?? []) as $section)
                                                    <div class="flex justify-between items-center p-2 bg-gray-50 rounded">
                                                        <span class="text-sm text-gray-900">{{ $section->name }}</span>
                                                        <div class="flex items-center gap-2">
                                                            <span class="text-xs text-gray-500">{{ $section->students_count ?? 0 }} طالب</span>
                                                            <button title="تعديل الفصل" class="p-1 text-blue-500 hover:bg-blue-100 rounded transition">
                                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-2.828 0L9 13zm-6 6h6v-2a2 2 0 012-2h2v6H3v-2a2 2 0 012-2z" /></svg>
                                                            </button>
                                                            <button title="حذف الفصل" class="p-1 text-red-500 hover:bg-red-100 rounded transition">
                                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="mt-3">
                                                <button class="w-full bg-gray-100 hover:bg-gray-200 text-primary py-2 px-4 rounded-md text-sm font-medium">إضافة فصل جديد</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('Madarek Front End/المدير/dashboard.js') }}"></script>
    <script src="{{ asset('Madarek Front End/المدير/classes.js') }}"></script>
</body>
</html>


