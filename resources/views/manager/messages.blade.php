<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرسائل - مدارِك</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('Madarek Front End/المدير/styles.css') }}">
    <script>
        tailwind.config = {
            content: ["./*.html"],
            theme: {
                extend: {
                    fontFamily: { 'arabic': ['Tajawal', 'Arial', 'sans-serif'] },
                    colors: { 'primary': '#4F46E5','primary-dark': '#4338CA','secondary': '#059669','accent': '#0891b2' }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="https://r2.flowith.net/files/o/1748451765656-Modern_Logo_Design_for_Madarek_School_Management_Platform_index_0@1024x1024.png" type="image/png">
    <style>
        .chat-messages::-webkit-scrollbar { width: 6px; }
        .chat-messages::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 3px; }
        .chat-messages::-webkit-scrollbar-track { background-color: #f1f5f9; }
        .conversation-list::-webkit-scrollbar { width: 6px; }
        .conversation-list::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 3px; }
        .chat-messages { background-color: #e0e7fa; background-image: repeating-linear-gradient(135deg, #b0c4de 0px, #b0c4de 2px, transparent 2px, transparent 20px), linear-gradient(135deg, #e0e7fa 0%, #c7d2fe 100%); background-size: 40px 40px, cover; }
        #mobileMenuButton { opacity: 0 !important; pointer-events: auto !important; }
        #mobileMenuButton, #mobileMenuButton:hover, #mobileMenuButton:focus, #mobileMenuButton:active { opacity: 0 !important; pointer-events: auto !important; }
        #mobileMenuOverlay:not(.hidden) #mobileMenuButton { opacity: 0 !important; }
    </style>
    @php($username = optional(auth()->user())->full_name ?? 'أحمد المدير')
</head>
<body class="font-arabic bg-gray-50 h-screen">
    <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-40">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <img src="https://r2.flowith.net/files/o/1748451765656-Modern_Logo_Design_for_Madarek_School_Management_Platform_index_0@1024x1024.png" alt="مدارك" class="h-10 w-10 rounded-full">
                        <span class="lg:max-w-none lg:whitespace-normal mr-3 text-xl font-bold text-gray-800 leading-relaxed"><span class="hidden sm:inline-block">مدارِك - </span> مدرسة الصِّديقة</span>
                    </div>
                </div>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <div class="relative">
                        <button id="notificationButton" class="p-2 text-gray-400 hover:text-gray-600 relative">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                            <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400 transform translate-x-1/2 -translate-y-1/2"></span>
                        </button>
                        <div id="notificationsDropdown" class="hidden absolute left-0 mt-2 w-80 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                            <div class="py-1">
                                <div class="px-4 py-2 border-b border-gray-100"><h3 class="text-sm font-medium text-gray-900">الإشعارات</h3></div>
                                <div class="max-h-96 overflow-y-auto"></div>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <button id="userMenuButton" class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            <div class="h-8 w-8 rounded-full bg-primary text-white flex items-center justify-center text-sm font-medium">أ</div>
                            <span class="mr-2 header-username hidden sm:block">{{ $username }}</span>
                            <svg class="w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div id="userMenu" class="hidden absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">الملف الشخصي</a>
                                <a href="{{ route('manager.settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">الإعدادات</a>
                                <div class="border-t border-gray-100"></div>
                                <form method="POST" action="{{ route('logout') }}">@csrf<button class="w-full text-right px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">تسجيل الخروج</button></form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="flex h-[calc(100vh-4rem)] bg-gray-50">
        <nav class="hidden lg:flex lg:flex-shrink-0 h-full">
            <div class="flex flex-col w-64 h-full">
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
                                <li><a href="{{ route('manager.messages') }}" class="bg-gradient-to-r from-amber-400 to-orange-500 text-slate-800 group flex items-center px-3 py-2 text-sm font-medium rounded-md shadow-lg">الرسائل</a></li>
                                <li><a href="{{ route('manager.announcements') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الإعلانات</a></li>
                                <li><a href="{{ route('manager.settings') }}" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">إعدادات النظام</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>

        <div class="lg:hidden">
            <button id="mobileMenuButton" class="fixed top-4 right-4 z-50 p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        <div id="mobileMenuOverlay" class="fixed inset-0 z-40 lg:hidden hidden">
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>
            <nav class="fixed top-0 right-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 bg-white shadow-xl overflow-y-auto">
                <div class="px-4 pb-4 flex items-center justify-between">
                    <div>
                        <img src="https://r2.flowith.net/files/o/1748451765656-Modern_Logo_Design_for_Madarek_School_Management_Platform_index_0@1024x1024.png" alt="مدارك" class="h-8 w-8 rounded-full inline-block">
                        <span class="mr-2 text-lg font-bold text-white">مدارك</span>
                    </div>
                    <button id="closeMobileMenuButtonMessages" class="p-2 text-gray-500 hover:text-gray-700 lg:hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <nav class="mt-5 px-4 flex-1">
                    <ul class="space-y-1">
                        <li><a href="{{ route('manager.dashboard') }}" class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">لوحة التحكم</a></li>
                        <li><a href="{{ route('manager.users') }}" class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">إدارة المستخدمين</a></li>
                        <li><a href="{{ route('manager.classes') }}" class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الصفوف والفصول</a></li>
                        <li><a href="{{ route('manager.schedules') }}" class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الجداول الدراسية</a></li>
                        <li><a href="{{ route('manager.attendance') }}" class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الحضور والغياب</a></li>
                        <li><a href="{{ route('manager.marks') }}" class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الدرجات والتقارير</a></li>
                        <li><a href="{{ route('manager.messages') }}" class="bg-primary text-white group flex items-center px-3 py-2 text-sm font-medium rounded-md">الرسائل</a></li>
                        <li><a href="{{ route('manager.announcements') }}" class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">الإعلانات</a></li>
                        <li><a href="{{ route('manager.settings') }}" class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">إعدادات النظام</a></li>
                    </ul>
                </nav>
            </nav>
        </div>

        <main class="flex-1 flex flex-col h-full min-h-0 overflow-hidden focus:outline-none">
            <div class="flex-1 flex flex-col lg:flex-row gap-6 h-full min-h-0 px-4 sm:px-6 md:px-8 py-6 overflow-hidden">
                <div class="w-full lg:w-1/3 bg-white shadow rounded-lg flex flex-col overflow-hidden border border-gray-200 h-full min-h-0">
                    <div class="p-4 border-b border-gray-200"><input type="text" placeholder="البحث في الرسائل..." class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm"></div>
                    <div class="px-4 pt-2 pb-1"><h2 class="text-base font-semibold text-gray-700">الرسائل</h2></div>
                    <div id="conversationList" class="flex-1 overflow-y-auto divide-y divide-gray-200 conversation-list">
                        <a href="#" class="block p-4 hover:bg-gray-50 transition-colors duration-150 ease-in-out">
                            <div class="flex items-center">
                                <div class="flex-shrink-0"><img class="h-10 w-10 rounded-full object-cover" src="https://ui-avatars.com/api/?name=معلم+الرياضيات&background=4F46E5&color=fff" alt="معلم الرياضيات"></div>
                                <div class="mr-3 flex-1 min-w-0"><p class="text-sm font-medium text-gray-900 truncate">معلم الرياضيات</p><p class="text-xs text-gray-500 truncate">شكراً جزيلاً على التوضيح!</p></div>
                                <div class="flex-shrink-0 text-xs text-gray-400 text-left"><p>10:32ص</p><span class="mt-1 inline-flex items-center justify-center px-1.5 py-0.5 text-xs font-semibold text-white bg-primary rounded-full">2</span></div>
                            </div>
                        </a>
                        <a href="#" class="block p-4 hover:bg-gray-50 bg-gray-100 transition-colors duration-150 ease-in-out">
                            <div class="flex items-center">
                                <div class="flex-shrink-0"><img class="h-10 w-10 rounded-full object-cover" src="https://ui-avatars.com/api/?name=ولي+أمر&background=059669&color=fff" alt="ولي أمر الطالب"></div>
                                <div class="mr-3 flex-1 min-w-0"><p class="text-sm font-medium text-gray-900 truncate">ولي أمر الطالب أحمد</p><p class="text-xs text-gray-500 truncate">تمام، سأقوم بمراجعة التقرير.</p></div>
                                <div class="flex-shrink-0 text-xs text-gray-400 text-left"><p>أمس</p></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="w-full lg:w-2/3 bg-gradient-to-br from-blue-50 via-white to-indigo-100 shadow rounded-lg flex flex-col overflow-hidden border border-gray-200 h-full min-h-0">
                    <div class="px-4 py-3 border-b border-gray-200 flex items-center justify-between sticky top-0 bg-white z-10">
                        <div class="flex items-center min-w-0">
                            <img class="h-10 w-10 rounded-full object-cover mr-3" src="https://ui-avatars.com/api/?name=ولي+أمر&background=059669&color=fff" alt="ولي أمر الطالب">
                            <div class="min-w-0"><h3 class="text-md font-semibold text-gray-900 truncate">ولي أمر الطالب أحمد</h3></div>
                        </div>
                        <div class="flex-shrink-0"><button class="p-2 text-gray-500 hover:text-gray-700 rounded-full hover:bg-gray-100"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg></button></div>
                    </div>
                    <div id="chatMessages" class="flex-1 p-4 space-y-4 overflow-y-auto chat-messages min-h-0"></div>
                    <div class="px-4 py-3 border-t border-gray-200 bg-white">
                        <form id="sendMessageForm" class="flex items-center space-x-3 space-x-reverse">
                            <button type="button" class="p-2 text-gray-500 hover:text-gray-700 rounded-full hover:bg-gray-100" title="إرفاق ملف"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79V17a5 5 0 01-5 5h-4a5 5 0 01-5-5V7a5 5 0 015-5h4a5 5 0 015 5v5.79a3.5 3.5 0 01-7 0V7" /></svg></button>
                            <input type="text" id="messageInput" placeholder="اكتب رسالتك هنا..." class="flex-1 px-3 py-2 border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary sm:text-sm" autocomplete="off">
                            <button type="submit" class="p-2 text-white bg-primary hover:bg-primary-dark rounded-lg transition-colors duration-150 ease-in-out"><svg class="w-6 h-6 transform rotate-180" fill="currentColor" viewBox="0 0 20 20"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 16.571V11a1 1 0 112 0v5.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg><span class="sr-only">إرسال</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('Madarek Front End/المدير/dashboard.js') }}"></script>
    <script>
        const closeMobileMenuButtonMessages = document.getElementById('closeMobileMenuButtonMessages');
        const mobileMenuOverlayInstance = document.getElementById('mobileMenuOverlay');
        if (closeMobileMenuButtonMessages && mobileMenuOverlayInstance) {
            closeMobileMenuButtonMessages.addEventListener('click', () => { mobileMenuOverlayInstance.classList.add('hidden'); });
        }
        const sendMessageForm = document.getElementById('sendMessageForm');
        const messageInput = document.getElementById('messageInput');
        const chatMessagesContainer = document.getElementById('chatMessages');
        function seedDemo() {
            const demo = `
                <div class="flex items-start max-w-md lg:max-w-lg">
                    <img class="h-8 w-8 rounded-full object-cover mr-2 flex-shrink-0" src="https://ui-avatars.com/api/?name=ولي+أمر&background=059669&color=fff" alt="ولي أمر">
                    <div class="bg-white border border-gray-200 rounded-tr-lg rounded-bl-lg rounded-br-lg p-3 shadow-sm">
                        <p class="text-sm text-gray-800">السلام عليكم، أود الاستفسار عن مستوى ابني أحمد في مادة الرياضيات.</p>
                        <p class="mt-1 text-xs text-gray-500 text-left">10:30 صباحاً</p>
                    </div>
                </div>
                <div class="flex items-start justify-end">
                    <div class="bg-primary text-white rounded-tl-lg rounded-bl-lg rounded-br-lg p-3 shadow-sm max-w-md lg:max-w-lg">
                        <p class="text-sm">وعليكم السلام ورحمة الله. أهلاً بك. مستوى أحمد جيد جداً ويظهر تحسناً ملحوظاً. سأرسل لك تقريراً مفصلاً قريباً.</p>
                        <p class="mt-1 text-xs text-gray-200 text-left">10:35 صباحاً ✓✓</p>
                    </div>
                </div>`;
            chatMessagesContainer.insertAdjacentHTML('beforeend', demo);
            chatMessagesContainer.scrollTop = chatMessagesContainer.scrollHeight;
        }
        seedDemo();
        if (sendMessageForm) {
            sendMessageForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const messageText = messageInput.value.trim();
                if (messageText) {
                    const sentMessageHTML = `
                        <div class="flex items-start justify-end">
                            <div class="bg-primary text-white rounded-tl-lg rounded-bl-lg rounded-br-lg p-3 shadow-sm max-w-md lg:max-w-lg">
                                <p class="text-sm">${messageText}</p>
                                <p class="mt-1 text-xs text-gray-200 text-left">${new Date().toLocaleTimeString('ar-EG', { hour: '2-digit', minute: '2-digit' })} ✓</p>
                            </div>
                        </div>`;
                    chatMessagesContainer.insertAdjacentHTML('beforeend', sentMessageHTML);
                    messageInput.value = '';
                    chatMessagesContainer.scrollTop = chatMessagesContainer.scrollHeight;
                }
            });
        }
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرسائل - المدير</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('Madarek Front End/المدير/styles.css') }}">
</head>
<body class="font-arabic bg-gray-50 h-screen">
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">الرسائل</h1>
        <div class="bg-white rounded shadow p-4">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 py-2 text-right">من</th>
                            <th class="px-3 py-2 text-right">إلى</th>
                            <th class="px-3 py-2 text-right">المحتوى</th>
                            <th class="px-3 py-2 text-right">أُرسلت</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($messages as $msg)
                            <tr>
                                <td class="px-3 py-2">{{ $msg->sender->full_name ?? $msg->sender->email ?? '—' }}</td>
                                <td class="px-3 py-2">{{ $msg->receiver->full_name ?? $msg->receiver->email ?? '—' }}</td>
                                <td class="px-3 py-2">{{ \Illuminate\Support\Str::limit($msg->content, 100) }}</td>
                                <td class="px-3 py-2">{{ $msg->sent_at?->format('Y-m-d H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-3 py-6 text-center text-gray-500">لا توجد رسائل</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">{{ $messages->links() }}</div>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرسائل - المدير</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('Madarek Front End/المدير/styles.css') }}">
</head>
<body class="font-arabic bg-gray-50">
    <div class="flex h-screen">
        <nav class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64 bg-white border-l border-gray-200">
                <div class="flex-grow mt-5 px-3">
                    <ul class="space-y-1">
                        <li><a href="{{ route('manager.dashboard') }}" class="text-gray-700 hover:bg-gray-50 px-3 py-2 rounded-md block">لوحة التحكم</a></li>
                        <li><a href="{{ route('manager.users') }}" class="text-gray-700 hover:bg-gray-50 px-3 py-2 rounded-md block">إدارة المستخدمين</a></li>
                        <li><a href="{{ route('manager.classes') }}" class="text-gray-700 hover:bg-gray-50 px-3 py-2 rounded-md block">الصفوف والفصول</a></li>
                        <li><a href="{{ route('manager.attendance') }}" class="text-gray-700 hover:bg-gray-50 px-3 py-2 rounded-md block">الحضور والغياب</a></li>
                        <li><a href="#" class="bg-gradient-to-r from-amber-400 to-orange-500 text-slate-800 px-3 py-2 rounded-md block shadow">الرسائل</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="flex-1 overflow-y-auto">
            <div class="max-w-7xl mx-auto p-6">
                <h2 class="text-2xl font-bold text-gray-900">الرسائل</h2>
                <div class="mt-6 bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 text-xs">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-3 py-3 text-right">المرسل</th>
                                        <th class="px-3 py-3 text-right">المستلم</th>
                                        <th class="px-3 py-3 text-right">النص</th>
                                        <th class="px-3 py-3 text-right">التاريخ</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($messages as $msg)
                                        <tr>
                                            <td class="px-3 py-3">{{ $msg->sender_id }}</td>
                                            <td class="px-3 py-3">{{ $msg->receiver_id }}</td>
                                            <td class="px-3 py-3">{{ \Illuminate\Support\Str::limit($msg->content, 120) }}</td>
                                            <td class="px-3 py-3">{{ $msg->sent_at }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-3 py-3 text-center text-gray-500">لا توجد رسائل</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="mt-4">{{ $messages->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>


