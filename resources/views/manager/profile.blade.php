<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الملف الشخصي - مدارِك</title>
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
                                <li><a href="{{ route('manager.marks') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الدرجات والتقارير</a></li>
                                <li><a href="{{ route('manager.messages') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الرسائل</a></li>
                                <li><a href="{{ route('manager.announcements') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الإعلانات</a></li>
                                <li><a href="{{ route('manager.profile') }}" class="bg-gradient-to-r from-amber-400 to-orange-500 text-slate-800 group flex items-center px-3 py-2 text-sm font-medium rounded-md shadow-lg">الملف الشخصي</a></li>
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
                            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">الملف الشخصي</h2>
                            <p class="mt-1 text-sm text-gray-500">إدارة معلومات حسابك الشخصي والإعدادات</p>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-1 space-y-6">
                            <div class="bg-white shadow-lg rounded-xl border border-gray-200 p-6 text-center">
                                <img class="h-32 w-32 rounded-full mx-auto mb-4 object-cover ring-2 ring-primary/50" src="https://ui-avatars.com/api/?name={{ urlencode(optional(auth()->user())->full_name ?? 'أحمد المدير') }}&background=4F46E5&color=fff&size=128" alt="صورة الملف الشخصي">
                                <h2 class="text-xl font-bold text-gray-900">{{ optional(auth()->user())->full_name ?? 'أحمد المدير' }}</h2>
                                <p class="text-sm text-gray-600">مدير النظام</p>
                                <p class="text-xs text-gray-500 mt-1">مدرسة الصديقة</p>
                            </div>
                            <div class="bg-white shadow-lg rounded-xl border border-gray-200 p-6">
                                <h3 class="text-lg font-medium text-gray-900 border-b pb-3 mb-4">معلومات إضافية</h3>
                                <dl class="space-y-3">
                                    <div class="flex justify-between"><dt class="text-sm font-medium text-gray-600">رقم الهاتف</dt><dd class="text-sm text-gray-900">{{ auth()->user()->phone ?? '+966 500 000 001' }}</dd></div>
                                    <div class="flex justify-between"><dt class="text-sm font-medium text-gray-600">البريد الإلكتروني</dt><dd class="text-sm text-gray-900">{{ auth()->user()->email }}</dd></div>
                                    <div class="flex justify-between"><dt class="text-sm font-medium text-gray-600">رقم القيد</dt><dd class="text-sm text-gray-900">{{ auth()->user()->registration_number ?? '—' }}</dd></div>
                                </dl>
                            </div>
                        </div>
                        <div class="lg:col-span-2 bg-white shadow-lg rounded-xl border border-gray-200 p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-6">تعديل معلومات الحساب</h3>
                            <form class="space-y-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">الاسم الكامل</label>
                                    <input type="text" value="{{ optional(auth()->user())->full_name }}" class="mt-1 block w-full p-2.5 border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">رقم الهاتف</label>
                                    <input type="tel" value="{{ auth()->user()->phone ?? '' }}" class="mt-1 block w-full p-2.5 border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                </div>
                                <hr class="my-6">
                                <h4 class="text-md font-semibold text-gray-900">تغيير كلمة المرور</h4>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">كلمة المرور الحالية</label>
                                    <input type="password" class="mt-1 block w-full p-2.5 border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">كلمة المرور الجديدة</label>
                                    <input type="password" class="mt-1 block w-full p-2.5 border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">تأكيد كلمة المرور الجديدة</label>
                                    <input type="password" class="mt-1 block w-full p-2.5 border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                </div>
                                <div class="flex justify-end pt-2">
                                    <button type="button" class="bg-primary hover:bg-primary-dark text-white font-medium py-2.5 px-6 rounded-lg text-sm">حفظ التغييرات</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('Madarek Front End/المدير/dashboard.js') }}"></script>
</body>
</html>



