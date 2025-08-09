<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الإعلانات - مدارِك</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('Madarek Front End/المدير/styles.css') }}">
    <script>
        tailwind.config = {
            content: ["./*.html", "./*.js"],
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
        #mobileMenuButton { opacity: 0 !important; pointer-events: auto !important; }
        #mobileMenuButton, #mobileMenuButton:hover, #mobileMenuButton:focus, #mobileMenuButton:active { opacity: 0 !important; pointer-events: auto !important; }
        #mobileMenuOverlay:not(.hidden) #mobileMenuButton { opacity: 0 !important; }
    </style>
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
                                <li><a href="{{ route('manager.announcements') }}" class="bg-gradient-to-r from-amber-400 to-orange-500 text-slate-800 group flex items-center px-3 py-2 text-sm font-medium rounded-md shadow-lg">الإعلانات</a></li>
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
                            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">الإعلانات</h2>
                            <p class="mt-1 text-sm text-gray-500">عرض جميع الإعلانات والمنشورات الهامة على مستوى المدرسة.</p>
                        </div>
                        <div class="mt-4 flex md:mt-0 md:mr-4">
                            <button id="addAnnouncementBtn" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-md text-sm font-medium shadow-sm">إضافة إعلان جديد</button>
                        </div>
                    </div>

                    <div class="mt-4 bg-white shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                                <div class="relative">
                                    <button id="toggleRolesFilterBtn" type="button" class="w-full flex justify-between items-center px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">تحديد الأدوار<svg id="rolesFilterChevron" class="w-4 h-4 ml-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg></button>
                                    <div id="rolesFilterBox" class="absolute right-0 mt-2 w-full z-20 flex flex-col space-y-2 bg-white rounded-md p-3 border border-gray-200 shadow-lg hidden">
                                        <label class="inline-flex items-center"><input type="checkbox" class="form-checkbox text-primary" name="roles[]" value="الإداريين"><span class="mr-2">الإداريين</span></label>
                                        <label class="inline-flex items-center"><input type="checkbox" class="form-checkbox text-primary" name="roles[]" value="المعلمين"><span class="mr-2">المعلمين</span></label>
                                        <label class="inline-flex items-center"><input type="checkbox" class="form-checkbox text-primary" name="roles[]" value="الطلاب"><span class="mr-2">الطلاب</span></label>
                                        <label class="inline-flex items-center"><input type="checkbox" class="form-checkbox text-primary" name="roles[]" value="أولياء الأمور"><span class="mr-2">أولياء الأمور</span></label>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <label for="dateFrom" class="block text-sm font-medium text-gray-700">من</label>
                                        <input type="date" id="dateFrom" name="dateFrom" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                    </div>
                                    <div>
                                        <label for="dateTo" class="block text-sm font-medium text-gray-700">إلى</label>
                                        <input type="date" id="dateTo" name="dateTo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                                    </div>
                                </div>
                                <div class="flex items-end">
                                    <button id="applyRolesFilterBtn" class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-md text-sm font-medium border border-gray-300">تطبيق الفلتر</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 bg-white shadow rounded-lg overflow-hidden">
                        <ul id="announcementsListContainer" class="divide-y divide-gray-200">
                            <li class="px-4 py-4 sm:px-6 hover:bg-gray-50 transition-colors duration-150 ease-in-out">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-semibold text-primary truncate">إعلان هام بخصوص الامتحانات النهائية للفصل الدراسي الثاني</p>
                                        <div class="mt-1 flex items-center text-xs text-gray-500">
                                            <svg class="flex-shrink-0 mr-1.5 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                                            <span>نشر في: 2 أغسطس 2024</span>
                                            <span class="mx-2">|</span>
                                            <span class="text-green-600 font-medium">عام</span>
                                        </div>
                                    </div>
                                    <div class="mr-4 flex-shrink-0 text-xs text-gray-400">منذ 3 ساعات</div>
                                </div>
                                <div class="mt-2 text-sm text-gray-700 prose prose-sm max-w-none"><p>يرجى من جميع الطلاب وأولياء الأمور الكرام العلم بأنه سيتم نشر جدول الامتحانات النهائية للفصل الدراسي الثاني يوم الأحد القادم الموافق 4 أغسطس 2024 على الموقع الرسمي للمدرسة ولوحة الإعلانات الرئيسية. نتمنى لجميع طلابنا التوفيق والنجاح.</p></div>
                                <div class="mt-3 text-left space-x-2 space-x-reverse">
                                    <button class="edit-announcement-btn bg-primary text-white text-xs font-medium py-1 px-3 rounded hover:bg-primary-dark">تعديل</button>
                                    <button class="delete-announcement-btn bg-red-600 text-white text-xs font-medium py-1 px-3 rounded hover:bg-red-800">حذف</button>
                                </div>
                            </li>
                            <li id="noAnnouncementsPlaceholder" class="hidden px-4 py-10 sm:px-6 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">لا توجد إعلانات حالياً</h3>
                                <p class="mt-1 text-sm text-gray-500">حاول تغيير الفلاتر أو تحقق مرة أخرى لاحقاً.</p>
                            </li>
                        </ul>
                        <div class="px-4 py-3 bg-gray-50 text-center sm:px-6 border-t border-gray-200">
                            <a href="#" class="text-sm font-medium text-primary hover:text-primary-dark">تحميل المزيد من الإعلانات...</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Add Announcement Modal -->
    <div id="addAnnouncementModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-10 md:top-20 mx-auto p-5 border w-11/12 md:max-w-md shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900">إضافة إعلان جديد</h3>
                    <button class="close-modal-btn text-gray-400 hover:text-gray-600" data-modal-id="addAnnouncementModal">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>
                <form id="addAnnouncementForm" class="space-y-4">
                    <div>
                        <label for="announcementTitle" class="block text-sm font-medium text-gray-700">عنوان الإعلان</label>
                        <input type="text" id="announcementTitle" name="announcementTitle" required class="mt-1 block w-full border border-primary focus:border-primary rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                    </div>
                    <div>
                        <label for="announcementContent" class="block text-sm font-medium text-gray-700">محتوى الإعلان</label>
                        <textarea id="announcementContent" name="announcementContent" rows="4" required class="mt-1 block w-full border border-primary focus:border-primary rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">تحديد الأدوار</label>
                        <div class="flex flex-col space-y-2 bg-gray-50 p-3 rounded-md border border-gray-200">
                            <label class="inline-flex items-center"><input type="checkbox" class="form-checkbox text-primary" name="roles[]" value="الإداريين"><span class="mr-2">الإداريين</span></label>
                            <label class="inline-flex items-center"><input type="checkbox" class="form-checkbox text-primary" name="roles[]" value="المعلمين"><span class="mr-2">المعلمين</span></label>
                            <label class="inline-flex items-center"><input type="checkbox" class="form-checkbox text-primary" name="roles[]" value="الطلاب"><span class="mr-2">الطلاب</span></label>
                            <label class="inline-flex items-center"><input type="checkbox" class="form-checkbox text-primary" name="roles[]" value="أولياء الأمور"><span class="mr-2">أولياء الأمور</span></label>
                        </div>
                    </div>
                    <div class="flex items-center justify-end pt-4 space-x-2 space-x-reverse">
                        <button type="button" class="cancel-modal-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-md" data-modal-id="addAnnouncementModal">إلغاء</button>
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-medium py-2 px-4 rounded-md">نشر الإعلان</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Announcement Modal -->
    <div id="editAnnouncementModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-10 md:top-20 mx-auto p-5 border w-11/12 md:max-w-md shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900">تعديل الإعلان</h3>
                    <button class="close-modal-btn text-gray-400 hover:text-gray-600" data-modal-id="editAnnouncementModal"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></button>
                </div>
                <form id="editAnnouncementForm" class="space-y-4">
                    <div>
                        <label for="editAnnouncementTitle" class="block text-sm font-medium text-gray-700">عنوان الإعلان</label>
                        <input type="text" id="editAnnouncementTitle" name="editAnnouncementTitle" required class="mt-1 block w-full border border-primary focus:border-primary rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                    </div>
                    <div>
                        <label for="editAnnouncementContent" class="block text-sm font-medium text-gray-700">محتوى الإعلان</label>
                        <textarea id="editAnnouncementContent" name="editAnnouncementContent" rows="4" required class="mt-1 block w-full border border-primary focus:border-primary rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">تحديد الأدوار</label>
                        <div class="flex flex-col space-y-2 bg-gray-50 p-3 rounded-md border border-gray-200">
                            <label class="inline-flex items-center"><input type="checkbox" class="form-checkbox text-primary" name="editRoles[]" value="الإداريين"><span class="mr-2">الإداريين</span></label>
                            <label class="inline-flex items-center"><input type="checkbox" class="form-checkbox text-primary" name="editRoles[]" value="المعلمين"><span class="mr-2">المعلمين</span></label>
                            <label class="inline-flex items-center"><input type="checkbox" class="form-checkbox text-primary" name="editRoles[]" value="الطلاب"><span class="mr-2">الطلاب</span></label>
                            <label class="inline-flex items-center"><input type="checkbox" class="form-checkbox text-primary" name="editRoles[]" value="أولياء الأمور"><span class="mr-2">أولياء الأمور</span></label>
                        </div>
                    </div>
                    <div class="flex items-center justify-end pt-4 space-x-2 space-x-reverse">
                        <button type="button" class="cancel-modal-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-md" data-modal-id="editAnnouncementModal">إلغاء</button>
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-medium py-2 px-4 rounded-md">حفظ التعديلات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('Madarek Front End/المدير/dashboard.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const addAnnouncementBtn = document.getElementById('addAnnouncementBtn');
            const addAnnouncementModal = document.getElementById('addAnnouncementModal');
            const addAnnouncementForm = document.getElementById('addAnnouncementForm');
            const editAnnouncementModal = document.getElementById('editAnnouncementModal');
            const editAnnouncementForm = document.getElementById('editAnnouncementForm');
            const announcementsList = document.getElementById('announcementsListContainer');
            const noAnnouncementsPlaceholder = document.getElementById('noAnnouncementsPlaceholder');

            const toggleModal = (modal, show) => { if (modal) modal.classList.toggle('hidden', !show); };

            addAnnouncementBtn?.addEventListener('click', () => { toggleModal(addAnnouncementModal, true); addAnnouncementForm?.reset(); });
            document.querySelectorAll('.close-modal-btn, .cancel-modal-btn').forEach(btn => btn.addEventListener('click', () => {
                toggleModal(addAnnouncementModal, false); toggleModal(editAnnouncementModal, false);
            }));

            addAnnouncementModal?.addEventListener('click', (e) => { if (e.target === addAnnouncementModal) toggleModal(addAnnouncementModal, false); });
            editAnnouncementModal?.addEventListener('click', (e) => { if (e.target === editAnnouncementModal) toggleModal(editAnnouncementModal, false); });

            addAnnouncementForm?.addEventListener('submit', (e) => {
                e.preventDefault();
                const formData = new FormData(addAnnouncementForm);
                const title = formData.get('announcementTitle');
                const content = formData.get('announcementContent');
                const roles = formData.getAll('roles[]');
                const html = `<li class="px-4 py-4 sm:px-6 hover:bg-gray-50">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-primary truncate">${title}</p>
                            <div class="mt-1 flex items-center text-xs text-gray-500"><span>نشر في: ${new Date().toLocaleDateString('ar-EG')}</span><span class="mx-2">|</span><span class="text-green-600 font-medium">${roles.join(', ')}</span></div>
                        </div>
                        <div class="mr-4 flex-shrink-0 text-xs text-gray-400">الآن</div>
                    </div>
                    <div class="mt-2 text-sm text-gray-700 prose prose-sm max-w-none"><p>${String(content).replace(/\n/g,'<br>')}</p></div>
                    <div class="mt-3 text-left space-x-2 space-x-reverse"><button class="edit-announcement-btn bg-primary text-white text-xs font-medium py-1 px-3 rounded">تعديل</button><button class="delete-announcement-btn bg-red-600 text-white text-xs font-medium py-1 px-3 rounded">حذف</button></div>
                </li>`;
                noAnnouncementsPlaceholder?.classList.add('hidden');
                announcementsList?.insertAdjacentHTML('afterbegin', html);
                toggleModal(addAnnouncementModal, false);
                addAnnouncementForm.reset();
            });

            announcementsList?.addEventListener('click', (e) => {
                const editBtn = e.target.closest('.edit-announcement-btn');
                const delBtn = e.target.closest('.delete-announcement-btn');
                if (editBtn) toggleModal(editAnnouncementModal, true);
                if (delBtn) editBtn?.closest('li')?.remove();
            });

            const toggleRolesFilterBtn = document.getElementById('toggleRolesFilterBtn');
            const rolesFilterBox = document.getElementById('rolesFilterBox');
            const rolesFilterChevron = document.getElementById('rolesFilterChevron');
            toggleRolesFilterBtn?.addEventListener('click', (e) => { e.preventDefault(); rolesFilterBox?.classList.toggle('hidden'); rolesFilterChevron?.classList.toggle('rotate-180'); });
            document.addEventListener('click', (e) => {
                if (rolesFilterBox && !rolesFilterBox.contains(e.target) && !toggleRolesFilterBtn?.contains(e.target)) rolesFilterBox.classList.add('hidden');
            });
        });
    </script>
</body>
</html>



