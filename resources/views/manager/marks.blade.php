<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الدرجات والتقارير - مدارِك</title>
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
                                <li><a href="{{ route('manager.classes') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الصفوف والفصول</a></li>
                                <li><a href="{{ route('manager.schedules') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الجداول الدراسية</a></li>
                                <li><a href="{{ route('manager.attendance') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الحضور والغياب</a></li>
                                <li><a href="{{ route('manager.marks') }}" class="bg-gradient-to-r from-amber-400 to-orange-500 text-slate-800 group flex items-center px-3 py-2 text-sm font-medium rounded-md shadow-lg">الدرجات والتقارير</a></li>
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
                            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">نظام تسجيل درجات الطلاب</h2>
                            <p class="mt-1 text-sm text-gray-500">اختر الصف والفصل الدراسي، ثم ابدأ في إدخال درجات الطلاب.</p>
                        </div>
                    </div>

                    <div class="mt-8 bg-gradient-to-br from-blue-50 to-indigo-100 shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
                                <div>
                                    <label for="grade-level" class="block text-sm font-medium text-gray-700 mb-2">اختر الصف</label>
                                    <select id="grade-level" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                                        <option value="">-- اختر الصف --</option>
                                        <option value="1">الصف الأول الابتدائي</option>
                                        <option value="2">الصف الثاني الابتدائي</option>
                                        <option value="3">الصف الثالث الابتدائي</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="semester" class="block text-sm font-medium text-gray-700 mb-2">اختر الفصل الدراسي</label>
                                    <select id="semester" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                                        <option value="">-- اختر الفصل --</option>
                                        <option value="1">الفصل الدراسي الأول</option>
                                        <option value="2">الفصل الدراسي الثاني</option>
                                    </select>
                                </div>
                                <div class="flex items-end">
                                    <button id="load-students" class="w-full bg-primary hover:bg-primary-dark text-white font-medium py-2 px-4 rounded-md transition-colors duration-200">تحميل قائمة الطلاب</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 bg-gradient-to-br from-blue-50 to-indigo-100 shadow rounded-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-white/30">
                                    <tr>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-700 uppercase">اسم الطالب</th>
                                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase">اللغة العربية</th>
                                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase">الرياضيات</th>
                                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase">العلوم</th>
                                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase">المجموع</th>
                                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">محمد علي</td>
                                        <td class="px-6 py-4 whitespace-nowrap"><input type="number" class="w-16 px-2 py-1 text-sm border border-gray-300 rounded focus:ring-primary focus:border-primary" min="0" max="40" value="30"></td>
                                        <td class="px-6 py-4 whitespace-nowrap"><input type="number" class="w-16 px-2 py-1 text-sm border border-gray-300 rounded focus:ring-primary focus:border-primary" min="0" max="60" value="45"></td>
                                        <td class="px-6 py-4 whitespace-nowrap"><input type="number" class="w-16 px-2 py-1 text-sm border border-gray-300 rounded focus:ring-primary focus:border-primary" min="0" max="60" value="50"></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">125</span></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs font-medium">حفظ</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loadBtn = document.getElementById('load-students');
            loadBtn?.addEventListener('click', function() { alert('سيتم ربط تحميل الطلاب من قاعدة البيانات لاحقاً.'); });
        });
    </script>
</body>
</html>



