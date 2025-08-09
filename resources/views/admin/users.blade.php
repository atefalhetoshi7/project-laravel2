@extends('layouts.admin')

@section('title', 'المستخدمين')

@section('content')
<!-- Main content -->
<main class="flex-1 overflow-y-auto focus:outline-none">
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <!-- Page header -->
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                        إدارة المستخدمين
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">
                        إضافة وتعديل وإدارة جميع المستخدمين في النظام
                    </p>
                </div>
                <div class="mt-4 flex md:mt-0 md:mr-4">
                    <button id="addUserBtn" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-md text-sm font-medium">
                        إضافة مستخدم جديد
                    </button>
                </div>
            </div>

            <!-- Filters -->
            <div class="mt-6 bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-4">
                        <div>
                            <label for="roleFilter" class="block text-sm font-medium text-gray-700">فلترة حسب الدور</label>
                            <select id="roleFilter" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md">
                                <option value="">جميع الأدوار</option>
                                <option value="admin">الإداري</option>
                                <option value="teacher">المعلم</option>
                                <option value="student">الطالب</option>
                                <option value="parent">ولي الأمر</option>
                            </select>
                        </div>
                        <div>
                            <label for="searchInput" class="block text-sm font-medium text-gray-700">البحث</label>
                            <input type="text" id="searchInput" placeholder="البحث بالاسم او  رقم القيد" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                        </div>
                        <div class="flex items-end">
                            <button id="clearFiltersBtn" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm font-medium">
                                مسح الفلاتر
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Users Table -->
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
                                    <th class="px-3 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody id="usersTableBody" class="bg-white divide-y divide-gray-200 text-xs">
                                <!-- Placeholder for loading or empty state -->
                                <tr>
                                    <td class="px-3 py-4 text-right">أحمد الإداري</td>
                                    <td class="px-3 py-4 text-right">الإداري</td>
                                    <td class="px-3 py-4 text-right">admin@example.com</td>
                                    <td class="px-3 py-4 text-right">0500000000</td>
                                    <td class="px-3 py-4 text-right">2025-07-01</td>
                                    <td class="px-3 py-4 text-right">-</td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-4 text-right">سارة المعلمة</td>
                                    <td class="px-3 py-4 text-right">المعلم</td>
                                    <td class="px-3 py-4 text-right">teacher@example.com</td>
                                    <td class="px-3 py-4 text-right">0500000001</td>
                                    <td class="px-3 py-4 text-right">2025-07-01</td>
                                    <td class="px-3 py-4 text-right">-</td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-4 text-right">محمد الطالب</td>
                                    <td class="px-3 py-4 text-right">الطالب</td>
                                    <td class="px-3 py-4 text-right">student@example.com</td>
                                    <td class="px-3 py-4 text-right">0500000002</td>
                                    <td class="px-3 py-4 text-right">2025-07-01</td>
                                    <td class="px-3 py-4 text-right">-</td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-4 text-right">أبو محمد</td>
                                    <td class="px-3 py-4 text-right">ولي الأمر</td>
                                    <td class="px-3 py-4 text-right">parent@example.com</td>
                                    <td class="px-3 py-4 text-right">0500000003</td>
                                    <td class="px-3 py-4 text-right">2025-07-01</td>
                                    <td class="px-3 py-4 text-right">-</td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="px-3 py-4 text-center text-gray-500 users-table-placeholder">
                                        يتم تحميل بيانات المستخدمين... (سيتم استبدال هذه البيانات بالبيانات الفعلية عند الربط مع الواجهة الخلفية)
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6 flex items-center justify-between">
                        <div id="mobilePagination" class="flex-1 flex justify-between sm:hidden">
                            <button id="prevPageMobile" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                السابق
                            </button>
                            <button id="nextPageMobile" class="mr-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                التالي
                            </button>
                        </div>
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">
                                    عرض <span class="font-medium pagination-start-item">1</span> إلى <span class="font-medium pagination-end-item">2</span> من أصل <span class="font-medium pagination-total-items">2</span> نتيجة
                                </p>
                            </div>
                            <div id="desktopPaginationContainer">
                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                    <button id="prevPageDesktop" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        السابق
                                    </button>
                                    <button data-page="1" class="pagination-page-btn relative inline-flex items-center px-4 py-2 border border-gray-300 bg-primary text-white text-sm font-medium hover:bg-primary-dark">
                                        1
                                    </button>
                                    <!-- More page buttons will be added dynamically by JS if needed -->
                                    <button id="nextPageDesktop" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        التالي
                                    </button>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>

<!-- Add User Modal -->
<div id="addUserModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
<div class="relative top-10 md:top-20 mx-auto p-5 border w-11/12 md:max-w-lg shadow-lg rounded-md bg-white max-h-[90vh] overflow-y-auto">
    <div class="mt-3">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-medium text-gray-900">إضافة مستخدم جديد</h3>
            <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form id="addUserForm" class="space-y-4">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label for="firstName" class="block text-sm font-medium text-gray-700">الاسم</label>
                    <input type="text" id="firstName" name="firstName" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                </div>
                <div>
                    <label for="secondName" class="block text-sm font-medium text-gray-700">اسم الاب</label>
                    <input type="text" id="secondName" name="secondName" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                </div>
                <div class="sm:col-span-2">
                    <label for="lastName" class="block text-sm font-medium text-gray-700">اللقب</label>
                    <input type="text" id="lastName" name="lastName" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                </div>
            </div>
            <div>
                <label for="userRoleModal" class="block text-sm font-medium text-gray-700">الدور</label>
                <select id="userRoleModal" name="userRole" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                    <option value="">اختر الدور</option>
                    <option value="admin">الإداري</option>
                    <option value="teacher">المعلم</option>
                    <option value="student">الطالب</option>
                    <option value="parent">ولي الأمر</option>
                </select>
            </div>
            <div id="enrollmentIdContainer" class="hidden">
                <label for="enrollmentId" class="block text-sm font-medium text-gray-700 mt-2">رقم القيد</label>
                <div class="flex gap-2">
                    <input type="text" id="enrollmentId" name="enrollmentId" readonly class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100 focus:ring-primary focus:border-primary sm:text-sm" placeholder="سيظهر رقم القيد هنا تلقائياً حسب الدور" />
                    <button type="button" id="regenEnrollmentIdBtn" class="mt-1 bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded-md text-sm font-medium">توليد رقم آخر</button>
                </div>
            </div>
            <div id="teacherSubjectsContainer" class="hidden mt-2 mb-6">
                <label for="teacherSubjects" class="block text-sm font-medium text-gray-700">المواد التي يقوم بتدريسها</label>
                <input type="text" id="teacherSubjectsSearch" placeholder="ابحث عن مادة..." class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm" autocomplete="off">
                <div id="teacherSubjectsList" class="mt-2 max-h-40 overflow-y-auto pr-2 flex flex-col gap-3">
                    <label class="flex items-center gap-2"><input type="checkbox" name="teacherSubjects" value="رياضيات أول أ" class="subject-checkbox"> رياضيات أول أ</label>
                    <label class="flex items-center gap-2"><input type="checkbox" name="teacherSubjects" value="رياضيات أول ب" class="subject-checkbox"> رياضيات أول ب</label>
                    <label class="flex items-center gap-2"><input type="checkbox" name="teacherSubjects" value="علوم ثاني أ" class="subject-checkbox"> علوم ثاني أ</label>
                    <label class="flex items-center gap-2"><input type="checkbox" name="teacherSubjects" value="علوم ثاني ب" class="subject-checkbox"> علوم ثاني ب</label>
                    <label class="flex items-center gap-2"><input type="checkbox" name="teacherSubjects" value="لغة عربية ثالث أ" class="subject-checkbox"> لغة عربية ثالث أ</label>
                    <label class="flex items-center gap-2"><input type="checkbox" name="teacherSubjects" value="لغة عربية ثالث ب" class="subject-checkbox"> لغة عربية ثالث ب</label>
                    <label class="flex items-center gap-2"><input type="checkbox" name="teacherSubjects" value="تربية إسلامية رابع أ" class="subject-checkbox"> تربية إسلامية رابع أ</label>
                    <label class="flex items-center gap-2"><input type="checkbox" name="teacherSubjects" value="تربية إسلامية رابع ب" class="subject-checkbox"> تربية إسلامية رابع ب</label>
                </div>
            </div>
            <div id="studentClassSection" class="hidden">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-2">
                    <div>
                        <label for="studentClass" class="block text-sm font-medium text-gray-700">الصف</label>
                        <select id="studentClass" name="studentClass" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                            <option value="">اختر الصف</option>
                            <option value="الأول">الأول</option>
                            <option value="الثاني">الثاني</option>
                            <option value="الثالث">الثالث</option>
                            <option value="الرابع">الرابع</option>
                            <option value="الخامس">الخامس</option>
                            <option value="السادس">السادس</option>
                        </select>
                    </div>
                    <div>
                        <label for="studentSection" class="block text-sm font-medium text-gray-700">الفصل</label>
                        <select id="studentSection" name="studentSection" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                            <option value="">اختر الفصل</option>
                            <option value="أ">أ</option>
                            <option value="ب">ب</option>
                            <option value="ج">ج</option>
                            <option value="د">د</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="parentStudentSection" class="hidden">
                <label for="parentStudent" class="block text-sm font-medium text-gray-700 mt-2">اختيار الابن</label>
                <input type="text" id="parentStudentSearch" placeholder="ابحث عن اسم الابن..." class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm" autocomplete="off">
                <select id="parentStudent" name="parentStudent" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                    <option value="">اختر الابن</option>
                    <!-- سيتم تعبئة الخيارات ديناميكياً -->
                </select>
            </div>
            <div id="externalTeacherCoursesContainer" class="hidden mt-2 mb-6">
                <label for="externalTeacherCourses" class="block text-sm font-medium text-gray-700">الدورات التي يقوم بتدريسها</label>
                <input type="text" id="externalTeacherCoursesSearch" placeholder="ابحث عن دورة..." class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm" autocomplete="off">
                <div id="externalTeacherCoursesList" class="mt-2 max-h-40 overflow-y-auto pr-2 flex flex-col gap-3">
                    <label class="flex items-center gap-2"><input type="checkbox" name="externalTeacherCourses" value="دورة الرياضيات" class="course-checkbox"> دورة الرياضيات</label>
                    <label class="flex items-center gap-2"><input type="checkbox" name="externalTeacherCourses" value="دورة التربية الإسلامية" class="course-checkbox"> دورة التربية الإسلامية</label>
                </div>
            </div>
            <div class="flex items-center justify-end pt-4 space-x-2 space-x-reverse mt-6">
                <button type="button" id="cancelModalBtn" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-md">
                    إلغاء
                </button>
                <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-medium py-2 px-4 rounded-md">
                    إضافة المستخدم
                </button>
            </div>
        </form>
    </div>
</div>
</div>

<!-- Password Modal -->
<div id="passwordModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50 hidden">
<div class="bg-white rounded-lg shadow-lg max-w-xs w-full p-6 text-center relative">
    <h3 class="text-lg font-bold text-gray-800 mb-4">كلمة المرور</h3>
    <div class="mb-2">
        <span id="passwordValue" class="text-2xl font-mono font-semibold text-primary select-all"></span>
    </div>
    <p class="text-xs text-gray-500 mb-4">يمكنك نسخ كلمة المرور أو تغييرها من صفحة الملف الشخصي.</p>
    <button id="closePasswordModalBtn" class="mt-2 bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-md font-medium">إغلاق</button>
</div>
</div>

<script src="dashboard.js"></script>
<script src="users.js"></script>
<script>
const closeMobileMenuButtonUsers = document.getElementById('closeMobileMenuButtonUsers');
const mobileMenuOverlayInstance = document.getElementById('mobileMenuOverlay');
if (closeMobileMenuButtonUsers && mobileMenuOverlayInstance) {
    closeMobileMenuButtonUsers.addEventListener('click', () => {
        mobileMenuOverlayInstance.classList.add('hidden');
    });
}

// إظهار حقلي الصف والفصل عند اختيار دور الطالب
document.addEventListener('DOMContentLoaded', function() {
var userRoleModal = document.getElementById('userRoleModal');
var studentClassSection = document.getElementById('studentClassSection');
var parentStudentSection = document.getElementById('parentStudentSection');
var teacherSubjectsContainer = document.getElementById('teacherSubjectsContainer');
var teacherSubjects = document.getElementById('teacherSubjects');
var teacherSubjectsSearch = document.getElementById('teacherSubjectsSearch');
if(userRoleModal && studentClassSection && parentStudentSection) {
    userRoleModal.addEventListener('change', function() {
        if(this.value === 'student') {
            studentClassSection.classList.remove('hidden');
            parentStudentSection.classList.add('hidden');
            if(teacherSubjectsContainer) teacherSubjectsContainer.classList.add('hidden');
            if(externalTeacherCoursesContainer) externalTeacherCoursesContainer.classList.add('hidden');
        } else if(this.value === 'parent') {
            parentStudentSection.classList.remove('hidden');
            studentClassSection.classList.add('hidden');
            if(teacherSubjectsContainer) teacherSubjectsContainer.classList.add('hidden');
            if(externalTeacherCoursesContainer) externalTeacherCoursesContainer.classList.add('hidden');
        } else if(this.value === 'teacher') {
            if(teacherSubjectsContainer) teacherSubjectsContainer.classList.remove('hidden');
            studentClassSection.classList.add('hidden');
            parentStudentSection.classList.add('hidden');
            if(externalTeacherCoursesContainer) externalTeacherCoursesContainer.classList.add('hidden');
        } else if(this.value === 'external_teacher') {
            if(externalTeacherCoursesContainer) externalTeacherCoursesContainer.classList.remove('hidden');
            if(teacherSubjectsContainer) teacherSubjectsContainer.classList.add('hidden');
            studentClassSection.classList.add('hidden');
            parentStudentSection.classList.add('hidden');
        } else {
            studentClassSection.classList.add('hidden');
            parentStudentSection.classList.add('hidden');
            if(teacherSubjectsContainer) teacherSubjectsContainer.classList.add('hidden');
            if(externalTeacherCoursesContainer) externalTeacherCoursesContainer.classList.add('hidden');
        }
        // إعادة تعيين القيم عند الإخفاء
        if(this.value !== 'student') {
            document.getElementById('studentClass').value = '';
            document.getElementById('studentSection').value = '';
        }
        if(this.value !== 'parent') {
            document.getElementById('parentStudent').value = '';
            document.getElementById('parentStudentSearch').value = '';
        }
        if(this.value !== 'teacher' && teacherSubjects) {
            Array.from(teacherSubjects.options).forEach(opt => opt.selected = false);
            if(teacherSubjectsSearch) teacherSubjectsSearch.value = '';
        }
        if(this.value !== 'external_teacher' && externalTeacherCoursesList) {
            Array.from(externalTeacherCoursesList.querySelectorAll('input[type=checkbox]')).forEach(cb => cb.checked = false);
            if(externalTeacherCoursesSearch) externalTeacherCoursesSearch.value = '';
        }
    });
}
// بحث المواد للمعلم
if(teacherSubjectsSearch && teacherSubjectsContainer) {
    const subjects = [
        'رياضيات أول أ',
        'رياضيات أول ب',
        'علوم ثاني أ',
        'علوم ثاني ب',
        'لغة عربية ثالث أ',
        'لغة عربية ثالث ب',
        'تربية إسلامية رابع أ',
        'تربية إسلامية رابع ب'
    ];
    const teacherSubjectsList = document.getElementById('teacherSubjectsList');
    function renderSubjects(filter = '') {
        // احفظ المواد المختارة
        const checkedValues = Array.from(teacherSubjectsList.querySelectorAll('input[type=checkbox]:checked')).map(cb => cb.value);
        teacherSubjectsList.innerHTML = '';
        subjects.filter(sub => sub.includes(filter)).forEach(sub => {
            const label = document.createElement('label');
            label.className = 'flex items-center gap-2';
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.name = 'teacherSubjects';
            checkbox.value = sub;
            checkbox.className = 'subject-checkbox';
            if (checkedValues.includes(sub)) checkbox.checked = true;
            label.appendChild(checkbox);
            label.appendChild(document.createTextNode(' ' + sub));
            teacherSubjectsList.appendChild(label);
        });
    }
    teacherSubjectsSearch.addEventListener('input', function() {
        renderSubjects(this.value.trim());
    });
    // أول تحميل
    renderSubjects();
}
// بحث الدورات للمعلم الخارجي
var externalTeacherCoursesSearch = document.getElementById('externalTeacherCoursesSearch');
var externalTeacherCoursesList = document.getElementById('externalTeacherCoursesList');
if(externalTeacherCoursesSearch && externalTeacherCoursesList) {
    const courses = [
        'دورة الرياضيات',
        'دورة التربية الإسلامية'
    ];
    function renderCourses(filter = '') {
        const checkedValues = Array.from(externalTeacherCoursesList.querySelectorAll('input[type=checkbox]:checked')).map(cb => cb.value);
        externalTeacherCoursesList.innerHTML = '';
        courses.filter(course => course.includes(filter)).forEach(course => {
            const label = document.createElement('label');
            label.className = 'flex items-center gap-2';
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.name = 'externalTeacherCourses';
            checkbox.value = course;
            checkbox.className = 'course-checkbox';
            if (checkedValues.includes(course)) checkbox.checked = true;
            label.appendChild(checkbox);
            label.appendChild(document.createTextNode(' ' + course));
            externalTeacherCoursesList.appendChild(label);
        });
    }
    externalTeacherCoursesSearch.addEventListener('input', function() {
        renderCourses(this.value.trim());
    });
    renderCourses();
}
});

@endsection