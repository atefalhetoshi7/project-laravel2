<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="flex items-center space-x-4 space-x-reverse">
                <div class="relative">
                    <button id="notificationButton" class="p-2 text-gray-400 hover:text-gray-600 relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400 transform translate-x-1/2 -translate-y-1/2"></span>
                    </button>
                    <div id="notificationsDropdown" class="hidden absolute left-0 mt-2 w-80 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                        <div class="py-1">
                            <div class="px-4 py-2 border-b border-gray-100">
                                <h3 class="text-sm font-medium text-gray-900">الإشعارات</h3>
                            </div>
                            <div class="max-h-96 overflow-y-auto">
                                <a href="#" class="block px-4 py-3 hover:bg-gray-50 border-b border-gray-100">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0"><div class="w-2 h-2 bg-blue-400 rounded-full mt-2"></div></div>
                                        <div class="mr-3 flex-1">
                                            <p class="text-sm font-medium text-gray-900">مثال إشعار</p>
                                            <p class="text-xs text-gray-500">نص تجريبي</p>
                                            <p class="text-xs text-gray-400 mt-1">الآن</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <button id="userMenuButton" class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        <div class="h-8 w-8 rounded-full bg-primary text-white flex items-center justify-center text-sm font-medium">{{ mb_substr(optional(auth()->user())->first_name ?? 'أحمد', 0, 1) }}</div>
                        <span class="mr-2 header-username hidden sm:block">{{ optional(auth()->user())->full_name ?? 'أحمد المدير' }}</span>
                        <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div id="userMenu" class="hidden absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                        <div class="py-1">
                            <a href="{{ route('manager.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">الملف الشخصي</a>
                            <a href="{{ route('manager.settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">الإعدادات</a>
                            <div class="border-t border-gray-100"></div>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">تسجيل الخروج</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>