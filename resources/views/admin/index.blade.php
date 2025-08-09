@extends('layouts.admin')

@section('title', 'الرئيسية')

@section('content')
    <!-- Main content -->
    <main class="flex-1 overflow-y-auto focus:outline-none">
        <div class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                <!-- Page header -->
                <div class="md:flex md:items-center md:justify-between">
                    <div class="flex-1 min-w-0">
                        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                            لوحة التحكم الرئيسية
                        </h2>
                        <p class="mt-1 text-sm text-gray-500">
                            مرحباً بك أحمد، إليك ملخص عن حالة المدرسة اليوم
                        </p>
                    </div>
                </div>

                <!-- Stats grid -->
                <div class="mt-8">
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                        <!-- إجمالي الطلاب -->
                        <a href="users.html?filter=students"
                            class="group bg-gradient-to-br from-blue-100 via-blue-50 to-white hover:from-blue-200 hover:via-blue-100 hover:to-white transition-all duration-200 overflow-hidden shadow rounded-lg transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-primary block">
                            <div class="p-5">
                                <div class="flex items-center h-16">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="w-8 h-8 bg-blue-200 group-hover:bg-blue-300 rounded-full flex items-center justify-center transition-colors duration-200">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M3 7v10a4 4 0 004 4h10a4 4 0 004-4V7a4 4 0 00-4-4H7a4 4 0 00-4 4z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M16 11a4 4 0 01-8 0" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="mr-5 w-0 flex-1">
                                        <dt
                                            class="text-sm font-medium text-blue-700 group-hover:text-blue-900 truncate transition-colors duration-200">
                                            إجمالي الطلاب</dt>
                                        <dd
                                            class="text-lg font-bold text-blue-900 group-hover:text-blue-800 transition-colors duration-200">
                                            1,245</dd>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- إجمالي المعلمين -->
                        <a href="users.html?filter=teachers"
                            class="group bg-gradient-to-br from-green-100 via-green-50 to-white hover:from-green-200 hover:via-green-100 hover:to-white transition-all duration-200 overflow-hidden shadow rounded-lg transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-secondary block">
                            <div class="p-5">
                                <div class="flex items-center h-16">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="w-8 h-8 bg-green-200 group-hover:bg-green-300 rounded-full flex items-center justify-center transition-colors duration-200">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="mr-5 w-0 flex-1">
                                        <dt
                                            class="text-sm font-medium text-green-700 group-hover:text-green-900 whitespace-normal transition-colors duration-200">
                                            إجمالي المعلمين</dt>
                                        <dd
                                            class="text-lg font-bold text-green-900 group-hover:text-green-800 transition-colors duration-200">
                                            85</dd>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- حضور اليوم -->
                        <a href="attendance.html"
                            class="group bg-gradient-to-br from-yellow-100 via-yellow-50 to-white hover:from-yellow-200 hover:via-yellow-100 hover:to-white transition-all duration-200 overflow-hidden shadow rounded-lg transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-yellow-400 block">
                            <div class="p-5">
                                <div class="flex items-center h-16">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="w-8 h-8 bg-yellow-200 group-hover:bg-yellow-300 rounded-full flex items-center justify-center transition-colors duration-200">
                                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="mr-5 w-0 flex-1">
                                        <dt
                                            class="text-sm font-medium text-yellow-700 group-hover:text-yellow-900 truncate transition-colors duration-200">
                                            حضور اليوم</dt>
                                        <dd
                                            class="text-lg font-bold text-yellow-900 group-hover:text-yellow-800 transition-colors duration-200">
                                            95.2%</dd>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- عدد الرسائل الجديدة -->
                        <a href="messages.html"
                            class="group bg-gradient-to-br from-pink-100 via-pink-50 to-white hover:from-pink-200 hover:via-pink-100 hover:to-white transition-all duration-200 overflow-hidden shadow rounded-lg transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-pink-400 block">
                            <div class="p-5">
                                <div class="flex items-center h-16">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="w-8 h-8 bg-pink-200 group-hover:bg-pink-300 rounded-full flex items-center justify-center transition-colors duration-200">
                                            <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-.55.55c-.1.1-.2.15-.35.15s-.25-.05-.35-.15L8 16z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="mr-5 w-0 flex-1">
                                        <dt
                                            class="text-sm font-medium text-pink-700 group-hover:text-pink-900 whitespace-normal transition-colors duration-200">
                                            عدد الرسائل الجديدة</dt>
                                        <dd
                                            class="text-lg font-bold text-pink-900 group-hover:text-pink-800 transition-colors duration-200">
                                            12</dd>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Charts and Recent Activity -->
                <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- النشاطات الحديثة (بدلاً من نسبة الحضور الأسبوعية) -->
                    <div class="bg-gradient-to-br from-green-50 via-white to-blue-50 shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg leading-6 font-medium text-green-900 mb-4">النشاطات الحديثة</h3>
                            <div class="space-y-4">
                                <div class="flex items-start space-x-3 space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <div class="w-2 h-2 bg-green-400 rounded-full mt-2"></div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-gray-900">تم إضافة مستخدم جديد</p>
                                        <p class="text-sm text-gray-500">أ. سارة أحمد - معلمة</p>
                                    </div>
                                    <div class="flex-shrink-0 text-sm text-gray-400">
                                        منذ 10 دقائق
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3 space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <div class="w-2 h-2 bg-blue-400 rounded-full mt-2"></div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-gray-900">تحديث إعدادات النظام</p>
                                        <p class="text-sm text-gray-500">تم تغيير كلمات المرور</p>
                                    </div>
                                    <div class="flex-shrink-0 text-sm text-gray-400">
                                        منذ ساعة
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3 space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <div class="w-2 h-2 bg-yellow-400 rounded-full mt-2"></div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-gray-900">نشر إعلان جديد</p>
                                        <p class="text-sm text-gray-500">إعلان عن الاجتماع الشهري</p>
                                    </div>
                                    <div class="flex-shrink-0 text-sm text-gray-400">
                                        منذ 3 ساعات
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- آخر الإعلانات -->
                    <div class="bg-gradient-to-br from-blue-50 via-white to-pink-50 shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg leading-6 font-medium text-blue-900 mb-4">آخر الإعلانات</h3>
                            <div class="space-y-4">
                                <div class="flex items-start space-x-3 space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <div class="w-2 h-2 bg-blue-400 rounded-full mt-2"></div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-gray-900">اجتماع أولياء الأمور</p>
                                        <p class="text-sm text-gray-500">يوم الخميس الساعة 4:00 مساءً</p>
                                    </div>
                                    <div class="flex-shrink-0 text-sm text-gray-400">
                                        منذ ساعتين
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3 space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <div class="w-2 h-2 bg-green-400 rounded-full mt-2"></div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-gray-900">بداية الفصل الثاني</p>
                                        <p class="text-sm text-gray-500">يبدأ يوم الأحد القادم</p>
                                    </div>
                                    <div class="flex-shrink-0 text-sm text-gray-400">
                                        أمس
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3 space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <div class="w-2 h-2 bg-yellow-400 rounded-full mt-2"></div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-gray-900">امتحانات نصف الفصل</p>
                                        <p class="text-sm text-gray-500">تبدأ الأسبوع القادم</p>
                                    </div>
                                    <div class="flex-shrink-0 text-sm text-gray-400">
                                        منذ 3 أيام
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="mt-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">الإجراءات السريعة</h3>
                    <div class="bg-white shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                                <!-- Quick Action: Add New User -->
                                <a href="users.html?action=addUser" id="quickActionAddUser"
                                    class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-primary hover:bg-gray-50 transition-colors duration-200 rounded-lg border border-gray-200">
                                    <div>
                                        <span class="rounded-lg inline-flex p-3 bg-primary text-white">
                                            <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="mt-4">
                                        <h3 class="text-sm font-medium text-gray-900">
                                            إضافة مستخدم جديد
                                        </h3>
                                        <p class="text-xs text-gray-500 mt-1">إضافة حساب مستخدم جديد</p>
                                    </div>
                                </a>

                                <!-- Quick Action: Create New Class -->
                                <a href="classes.html?action=addClass" id="quickActionCreateClass"
                                    class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-primary hover:bg-gray-50 transition-colors duration-200 rounded-lg border border-gray-200">
                                    <div>
                                        <span class="rounded-lg inline-flex p-3 bg-secondary text-white">
                                            <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="mt-4">
                                        <h3 class="text-sm font-medium text-gray-900">
                                            إنشاء وإدارة الفصول
                                        </h3>
                                        <p class="text-xs text-gray-500 mt-1">إضافة أو تعديل أو حذف الفصول الدراسية
                                        </p>
                                    </div>
                                </a>

                                <!-- Quick Action: Post New Announcement (Navigates to announcements.html) -->
                                <a href="announcements.html"
                                    class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-primary hover:bg-gray-50 transition-colors duration-200 rounded-lg border border-gray-200">
                                    <div>
                                        <span class="rounded-lg inline-flex p-3 bg-accent text-white">
                                            <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="mt-4">
                                        <h3 class="text-sm font-medium text-gray-900">
                                            نشر إعلان جديد
                                        </h3>
                                        <p class="text-xs text-gray-500 mt-1">إصدار إعلان لجميع المستخدمين</p>
                                    </div>
                                </a>

                                <!-- Quick Action: تسجيل الحضور (Navigates to attendance.html) -->
                                <a href="attendance.html"
                                    class="relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-primary hover:bg-gray-50 transition-colors duration-200 rounded-lg border border-gray-200">
                                    <div>
                                        <span class="rounded-lg inline-flex p-3 bg-purple-600 text-white">
                                            <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="mt-4">
                                        <h3 class="text-sm font-medium text-gray-900">
                                            تسجيل الحضور
                                        </h3>
                                        <p class="text-xs text-gray-500 mt-1">تسجيل حضور الطلاب </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
