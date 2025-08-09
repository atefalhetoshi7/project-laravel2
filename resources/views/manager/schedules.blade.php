@php
// Blade version of public/Madarek Front End/المدير/schedules.html
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الجداول الدراسية - مدارِك</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('Madarek Front End/المدير/styles.css') }}">
    <script>
        tailwind.config = { content: ["./*.html", "./schedules.js"], theme: { extend: { fontFamily: { 'arabic': ['Tajawal','Arial','sans-serif'] }, colors: { 'primary':'#4F46E5','primary-dark':'#4338CA','secondary':'#059669','accent':'#0891b2' } } } }
    </script>
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
                                <li><a href="{{ route('manager.classes') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الصفوف والفصول</a></li>
                                <li><a href="{{ route('manager.schedules') }}" class="bg-gradient-to-r from-amber-400 to-orange-500 text-slate-800 group flex items-center px-3 py-2 text-sm font-medium rounded-md shadow-lg">الجداول الدراسية</a></li>
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
                    <div class="border-b border-gray-200 pb-5 mb-5 md:flex md:items-center md:justify-between">
                        <div class="flex-1 min-w-0">
                            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">الجداول الدراسية</h2>
                            <p class="mt-1 text-sm text-gray-500">عرض وتعديل الجداول الدراسية للفصول</p>
                        </div>
                        <div class="mt-4 flex md:mt-0 md:mr-4">
                            <button id="saveScheduleChanges" class="hidden bg-primary hover:bg-primary-dark text-white font-medium py-2 px-4 rounded-md shadow-sm">حفظ التغييرات</button>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-lg shadow-sm mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="classSelector" class="block text-sm font-medium text-gray-700">اختر الصف الدراسي</label>
                                <select id="classSelector" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md">
                                    <option>الرجاء الاختيار...</option>
                                </select>
                            </div>
                            <div>
                                <label for="sectionSelector" class="block text-sm font-medium text-gray-700">اختر الفصل</label>
                                <select id="sectionSelector" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md" disabled>
                                    <option>اختر الصف أولاً...</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="scheduleDisplayContainer" class="hidden">
                        <h3 id="scheduleTitle" class="text-xl font-semibold text-gray-800 mb-4"></h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white rounded-lg shadow">
                                <thead class="bg-gray-100"></thead>
                                <tbody id="scheduleGridBody" class="divide-y divide-gray-200"></tbody>
                            </table>
                        </div>
                    </div>

                    <div id="noScheduleSelected" class="text-center py-10 px-4 bg-white rounded-lg shadow-sm">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h10a2 2 0 012 2z"/></svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">لم يتم اختيار جدول</h3>
                        <p class="mt-1 text-sm text-gray-500">الرجاء اختيار صف وفصل من القوائم أعلاه لعرض أو تعديل جدوله الدراسي.</p>
                    </div>

                    <div class="bg-white p-4 rounded-lg shadow-sm mb-6 mt-10">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">جدول الامتحانات</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label for="examClassSelector" class="block text-sm font-medium text-gray-700">اختر الصف الدراسي</label>
                                <select id="examClassSelector" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md">
                                    <option>الرجاء الاختيار...</option>
                                </select>
                            </div>
                            <div>
                                <label for="examStartDate" class="block text-sm font-medium text-gray-700">تاريخ بداية الامتحانات (يوم أحد)</label>
                                <input type="date" id="examStartDate" class="mt-1 w-36 block pl-3 pr-10 pr-6 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="block text-sm font-medium text-gray-700">توقيت الفترات</label>
                                <div class="flex gap-2">
                                    <div class="flex flex-col items-center w-full">
                                        <input type="time" id="examPeriod1Time" value="08:15" class="block w-full border-gray-300 rounded-md focus:ring-primary focus:border-primary sm:text-sm py-1" />
                                        <span class="text-xs text-gray-500 mt-1">الفترة الأولى</span>
                                    </div>
                                    <div class="flex flex-col items-center w-full">
                                        <input type="time" id="examPeriod2Time" value="10:30" class="block w-full border-gray-300 rounded-md focus:ring-primary focus:border-primary sm:text-sm py-1" />
                                        <span class="text-xs text-gray-500 mt-1">الفترة الثانية</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="examScheduleDisplayContainer" class="hidden">
                            <h3 id="examScheduleTitle" class="text-lg font-semibold text-gray-800 mb-4"></h3>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white rounded-lg shadow">
                                    <thead class="bg-gray-100" id="examScheduleThead"></thead>
                                    <tbody id="examScheduleGridBody" class="divide-y divide-gray-200"></tbody>
                                </table>
                            </div>
                            <div class="mt-4 flex justify-end">
                                <button id="saveExamScheduleChanges" class="bg-primary hover:bg-primary-dark text-white font-medium py-2 px-4 rounded-md shadow-sm">حفظ جدول الامتحانات</button>
                            </div>
                        </div>
                        <div id="noExamScheduleSelected" class="text-center py-6 px-4 bg-white rounded-lg shadow-sm">
                            <svg class="mx-auto h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h10a2 2 0 012 2z"/></svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">لم يتم اختيار صف أو تاريخ</h3>
                            <p class="mt-1 text-sm text-gray-500">الرجاء اختيار صف وتاريخ بداية الامتحانات لعرض أو تعديل جدول الامتحانات.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('Madarek Front End/المدير/dashboard.js') }}"></script>
    <script src="{{ asset('Madarek Front End/المدير/schedules.js') }}"></script>
    <script src="{{ asset('Madarek Front End/المدير/exam-schedule.js') }}"></script>
</body>
</html>



