@php
    // Replace attendance page with static design structure; keep dynamic data optional later
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الحضور والغياب - مدارِك</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('Madarek Front End/المدير/styles.css') }}">
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
                                <li><a href="{{ route('manager.attendance') }}" class="bg-gradient-to-r from-amber-400 to-orange-500 text-slate-800 group flex items-center px-3 py-2 text-sm font-medium rounded-md shadow-lg">الحضور والغياب</a></li>
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
                            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">الحضور والغياب</h2>
                            <p class="mt-1 text-sm text-gray-500">إدارة وتسجيل ومتابعة حضور وغياب الطلاب</p>
                        </div>
                        <div class="mt-4 flex md:mt-0 md:mr-4 space-x-2 space-x-reverse">
                            <button id="recordAttendanceBtn" class="bg-secondary hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium shadow-sm">تسجيل الحضور لليوم</button>
                            <button id="viewAbsenceReportsBtn" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-md text-sm font-medium shadow-sm">عرض تقارير الغياب</button>
                        </div>
                    </div>

                    <div class="mt-6 bg-white shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">فلاتر عرض سجلات الحضور</h3>
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">التاريخ</label>
                                    <input type="date" id="dateFilter" class="w-full border rounded px-2 py-2" />
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">الصف/الفصل</label>
                                    <select id="attendanceClassFilter" class="w-full border rounded px-2 py-2">
                                        <option value="">جميع الصفوف/الفصول</option>
                                        <option value="الصف الأول أ">الصف الأول أ</option>
                                        <option value="الصف الأول ب">الصف الأول ب</option>
                                        <option value="الصف الأول ج">الصف الأول ج</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700 mb-1">اسم الطالب</label>
                                    <input type="text" id="studentNameFilter" placeholder="اكتب للبحث..." class="w-full border rounded px-2 py-2" />
                                </div>
                                <div class="flex items-end">
                                    <button id="applyAttendanceFiltersBtn" class="w-full bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded">تطبيق</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">سجلات الحضور والغياب</h3>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">اسم الطالب</th>
                                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">الصف/الفصل</th>
                                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">التاريخ</th>
                                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">الحالة</th>
                                        </tr>
                                    </thead>
                                    <tbody id="attendanceTableBody" class="bg-white divide-y divide-gray-200">
                                        <tr id="attendanceTablePlaceholder">
                                            <td colspan="4" class="px-6 py-10 text-center text-gray-500">حدد الفلاتر لعرض السجلات.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4 px-4 py-3 bg-gray-50 text-right sm:px-6 border-t border-gray-200">
                                <a href="#" class="text-sm font-medium text-primary hover:text-primary-dark">عرض المزيد من السجلات...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div id="recordAttendanceModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-10 md:top-20 mx-auto p-5 border w-11/12 md:max-w-2xl shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">تسجيل الحضور لليوم</h3>
                    <button class="close-modal-btn text-gray-400 hover:text-gray-600" data-modal-id="recordAttendanceModal"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></button>
                </div>
                <form id="recordAttendanceForm" class="space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div><label class="block text-sm font-medium text-gray-700">التاريخ</label><input type="date" id="attendanceDate" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm"></div>
                        <div><label class="block text-sm font-medium text-gray-700">الصف/الفصل</label><select id="attendanceTargetClass" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md"><option value="">اختر الصف/الفصل</option><option value="الصف الأول أ">الصف الأول أ</option><option value="الصف الأول ب">الصف الأول ب</option><option value="الصف الأول ج">الصف الأول ج</option></select></div>
                    </div>
                    <div class="mt-4">
                        <h4 class="text-md font-medium text-gray-900 mb-2">قائمة الطلاب</h4>
                        <div id="attendanceListForRecording" class="border border-gray-200 rounded-md p-3 bg-gray-50 max-h-72 overflow-y-auto space-y-3">
                            <p class="text-sm text-gray-500 text-center py-4">اختر الصف/الفصل أولاً لتحميل القائمة.</p>
                            <div id="attendanceUserRowTemplate" class="hidden flex flex-col sm:flex-row items-center justify-between py-2 border-b border-gray-200 last:border-b-0 bg-white p-3 rounded-md shadow-sm">
                                <span class="text-sm text-gray-800 font-medium mb-2 sm:mb-0 sm:w-1/3 user-name-placeholder">اسم المستخدم</span>
                                <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-3 sm:space-x-reverse sm:w-2/3">
                                    <select name="status_user_ID_PLACEHOLDER" class="block w-full sm:w-auto px-2 py-1 text-xs border-gray-300 rounded-md focus:ring-primary focus:border-primary"><option value="present">حاضر</option><option value="absent">غائب</option></select>
                                    <input type="text" name="notes_user_ID_PLACEHOLDER" placeholder="ملاحظات (اختياري)" class="block w-full sm:flex-1 px-2 py-1 text-xs border-gray-300 rounded-md focus:ring-primary focus:border-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end pt-4 space-x-2 space-x-reverse border-t border-gray-200 mt-4">
                        <button type="button" class="cancel-modal-btn bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-md" data-modal-id="recordAttendanceModal">إلغاء</button>
                        <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-medium py-2 px-4 rounded-md">حفظ سجل الحضور</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('Madarek Front End/المدير/dashboard.js') }}"></script>
    <script>
        const dateFilter = document.getElementById('dateFilter');
        if(dateFilter) dateFilter.valueAsDate = new Date();
        const classFilter = document.getElementById('attendanceClassFilter');
        const studentNameFilter = document.getElementById('studentNameFilter');
        const applyBtn = document.getElementById('applyAttendanceFiltersBtn');
        const tableBody = document.getElementById('attendanceTableBody');
        const placeholderRow = document.getElementById('attendanceTablePlaceholder');
        const fetchAndDisplayAttendance = () => {
            const selectedDate = dateFilter ? dateFilter.value : '';
            const selectedClass = classFilter ? classFilter.value : '';
            const selectedName = studentNameFilter ? studentNameFilter.value.trim().toLowerCase() : '';
            tableBody.innerHTML = '<tr><td colspan="4" class="px-6 py-10 text-center text-gray-500">جاري تحميل البيانات...</td></tr>';
            setTimeout(() => {
                let sampleData = [
                    { id:1, name: 'أحمد عبدالله', section: 'الصف الأول ج', date: selectedDate || '2024-07-26', status: 'حاضر', statusColor: 'green' },
                    { id:2, name: 'سارة محمود', section: 'الصف الأول ج', date: selectedDate || '2024-07-26', status: 'غائب', statusColor: 'red' }
                ];
                let filteredData = sampleData.filter(item => {
                    const dateMatch = selectedDate ? item.date === selectedDate : true;
                    const classMatch = selectedClass ? item.section.includes(selectedClass) : true;
                    const nameMatch = selectedName ? item.name.includes(selectedName) : true;
                    return dateMatch && classMatch && nameMatch;
                });
                tableBody.innerHTML = '';
                if (filteredData.length === 0) { tableBody.appendChild(placeholderRow); }
                else {
                    filteredData.forEach(item => {
                        const row = `<tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${item.name}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.section}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.date}</td>
                            <td class="px-6 py-4 whitespace-nowrap"><span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-${item.statusColor}-100 text-${item.statusColor}-800">${item.status}</span></td>
                        </tr>`;
                        tableBody.insertAdjacentHTML('beforeend', row);
                    });
                }
            }, 400);
        };
        applyBtn?.addEventListener('click', fetchAndDisplayAttendance);

        const recordAttendanceBtn = document.getElementById('recordAttendanceBtn');
        const recordAttendanceModal = document.getElementById('recordAttendanceModal');
        const recordAttendanceForm = document.getElementById('recordAttendanceForm');
        const attendanceDateInput = document.getElementById('attendanceDate');
        const attendanceTargetClassSelect = document.getElementById('attendanceTargetClass');
        const attendanceListContainer = document.getElementById('attendanceListForRecording');
        const userRowTemplate = document.getElementById('attendanceUserRowTemplate');
        const toggleModal = (modal, show) => { modal?.classList.toggle('hidden', !show); };
        recordAttendanceBtn?.addEventListener('click', () => { toggleModal(recordAttendanceModal, true); recordAttendanceForm?.reset(); attendanceDateInput.valueAsDate = new Date(); attendanceListContainer.innerHTML = '<p class="text-sm text-gray-500 text-center py-4">اختر الصف/الفصل أولاً لتحميل القائمة.</p>'; });
        document.querySelectorAll('.close-modal-btn, .cancel-modal-btn').forEach(button => { button.addEventListener('click', () => toggleModal(recordAttendanceModal, false)); });
        recordAttendanceModal?.addEventListener('click', (e) => { if (e.target === recordAttendanceModal) toggleModal(recordAttendanceModal, false); });
        attendanceTargetClassSelect?.addEventListener('change', function() {
            const selectedClass = this.value;
            attendanceListContainer.innerHTML = '';
            if (!selectedClass) { attendanceListContainer.innerHTML = '<p class="text-sm text-gray-500 text-center py-4">اختر الصف/الفصل أولاً لتحميل القائمة.</p>'; return; }
            setTimeout(() => {
                let users = selectedClass === 'الصف الأول أ' ? [{id: 101, name: 'علي يوسف'}, {id: 102, name: 'محمد علي'}] : [{id: 201, name: 'فاطمة الزهراء'}];
                attendanceListContainer.innerHTML = '';
                users.forEach(user => {
                    const newRow = userRowTemplate.cloneNode(true);
                    newRow.classList.remove('hidden');
                    newRow.id = `user_row_${user.id}`;
                    newRow.querySelector('.user-name-placeholder').textContent = user.name;
                    newRow.querySelectorAll('select, input').forEach(input => { input.name = input.name.replace('ID_PLACEHOLDER', user.id); });
                    attendanceListContainer.appendChild(newRow);
                });
            }, 300);
        });
        recordAttendanceForm?.addEventListener('submit', (e) => { e.preventDefault(); alert('تم حفظ سجل الحضور (عرض توضيحي).'); toggleModal(recordAttendanceModal, false); });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الحضور والغياب - المدير</title>
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
                        <li><a href="#" class="bg-gradient-to-r from-amber-400 to-orange-500 text-slate-800 px-3 py-2 rounded-md block shadow">الحضور والغياب</a></li>
                        <li><a href="{{ route('manager.messages') }}" class="text-gray-700 hover:bg-gray-50 px-3 py-2 rounded-md block">الرسائل</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="flex-1 overflow-y-auto">
            <div class="max-w-7xl mx-auto p-6">
                <h2 class="text-2xl font-bold text-gray-900">الحضور والغياب</h2>
                <form method="get" class="mt-4 bg-white shadow rounded-lg p-4 grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm text-gray-700 mb-1">التاريخ</label>
                        <input type="date" name="date" value="{{ $selectedDate }}" class="w-full border rounded-md px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 mb-1">الحالة</label>
                        <select name="status" class="w-full border rounded-md px-3 py-2">
                            <option value="">الكل</option>
                            <option value="present" @selected($selectedStatus==='present')>حاضر</option>
                            <option value="absent" @selected($selectedStatus==='absent')>غائب</option>
                            <option value="late" @selected($selectedStatus==='late')>متأخر</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-primary text-white py-2 rounded-md">تطبيق</button>
                    </div>
                </form>

                <div class="mt-6 bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:p-6 overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-xs">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-3 py-3 text-right">الطالب</th>
                                    <th class="px-3 py-3 text-right">التاريخ</th>
                                    <th class="px-3 py-3 text-right">الحالة</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($records as $rec)
                                    <tr>
                                        <td class="px-3 py-3">{{ $rec->user->full_name ?? '—' }}</td>
                                        <td class="px-3 py-3">{{ \Illuminate\Support\Carbon::parse($rec->date)->format('Y-m-d') }}</td>
                                        <td class="px-3 py-3">{{ $rec->status }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-3 py-3 text-center text-gray-500">لا توجد سجلات</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-4">{{ $records->links() }}</div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>


