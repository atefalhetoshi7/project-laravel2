<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة المستخدمين - مدارِك</title>
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
                        <span class="lg:max-w-none lg:whitespace-normal mr-3 text-xl font-bold text-gray-800 leading-relaxed">
                            <span class="hidden sm:inline-block">مدارِك - </span> مدرسة الصِّديقة
                        </span>
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
                                <li><a href="{{ route('manager.users') }}" class="bg-gradient-to-r from-amber-400 to-orange-500 text-slate-800 group flex items-center px-3 py-2 text-sm font-medium rounded-md shadow-lg">إدارة المستخدمين</a></li>
                                <li><a href="{{ route('manager.classes') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الصفوف والفصول</a></li>
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
                            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">إدارة المستخدمين</h2>
                            <p class="mt-1 text-sm text-gray-500">إضافة وتعديل وإدارة جميع المستخدمين في النظام</p>
                        </div>
                        <div class="mt-4 flex md:mt-0 md:mr-4">
                            <a href="#" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-md text-sm font-medium">إضافة مستخدم جديد</a>
                        </div>
                    </div>

                    <div class="mt-6 bg-white shadow rounded-lg">
                        <form method="get" class="px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">فلترة حسب الدور</label>
                                    <select name="role" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md">
                                        <option value="">جميع الأدوار</option>
                                        <option value="admin" @selected($filterRole==='admin')>الإداري</option>
                                        <option value="teacher" @selected($filterRole==='teacher')>المعلم</option>
                                        <option value="student" @selected($filterRole==='student')>الطالب</option>
                                        <option value="parent" @selected($filterRole==='parent')>ولي الأمر</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">البحث</label>
                                    <input type="text" name="q" value="{{ $searchTerm }}" placeholder="البحث بالاسم او رقم القيد" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm" />
                                </div>
                                <div class="flex items-end">
                                    <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-md text-sm font-medium">تطبيق</button>
                                </div>
                                <div class="flex items-end">
                                    <a href="{{ route('manager.users') }}" class="w-full text-center bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm font-medium">مسح الفلاتر</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="mt-6 bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 text-xs">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-3 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">المستخدم</th>
                                            <th class="px-3 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الدور</th>
                                            <th class="px-3 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">البريد الإلكتروني</th>
                                            <th class="px-3 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">رقم الهاتف</th>
                                            <th class="px-3 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">تاريخ الإنشاء</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 text-xs">
                                        @forelse ($users as $user)
                                            <tr>
                                                <td class="px-3 py-4 text-right">{{ $user->full_name }}</td>
                                                <td class="px-3 py-4 text-right">{{ $user->role }}</td>
                                                <td class="px-3 py-4 text-right">{{ $user->email }}</td>
                                                <td class="px-3 py-4 text-right">{{ $user->phone ?? '—' }}</td>
                                                <td class="px-3 py-4 text-right">{{ $user->created_at?->format('Y-m-d') }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="px-3 py-4 text-center text-gray-500">لا توجد نتائج</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-6">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('Madarek Front End/المدير/dashboard.js') }}"></script>
    <script src="{{ asset('Madarek Front End/المدير/users.js') }}"></script>
</body>
</html>



