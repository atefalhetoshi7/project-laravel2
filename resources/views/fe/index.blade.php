<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>روابط جميع الواجهات (للمطور)</title>
    <style>
        body { font-family: Tahoma, Arial, sans-serif; direction: rtl; margin: 40px; }
        ul { line-height: 2; }
        h2 { color: #2c3e50; }
        a { color: #2980b9; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .muted { color: #888; font-size: 13px; }
    </style>
</head>
<body>
    <h2>روابط جميع الواجهات في مجلد مدارك (للمطور)</h2>
    <ul>
        <li><b>Login</b>
            <ul>
                <li><a href="{{ route('login') }}">/login</a></li>
            </ul>
        </li>
        <li><b>Sign up</b>
            <ul>
                <li><a href="{{ route('register') }}">/register</a></li>
            </ul>
        </li>
        <li><b>المدير</b>
            <ul>
                <li><a href="{{ route('manager.dashboard') }}">manager/dashboard</a> <span class="muted">(يتطلب تسجيل الدخول كمدير)</span></li>
                <li><a href="{{ route('manager.users') }}">manager/users</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('manager.classes') }}">manager/classes</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('manager.attendance') }}">manager/attendance</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('manager.messages') }}">manager/messages</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('manager.announcements') }}">manager/announcements</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('manager.schedules') }}">manager/schedules</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('manager.marks') }}">manager/marks</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('manager.settings') }}">manager/settings</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('manager.profile') }}">manager/profile</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
            </ul>
        </li>
        <li><b>الإداري</b>
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">admin/dashboard</a> <span class="muted">(يتطلب تسجيل الدخول كأدمن)</span></li>
                <li><a href="{{ route('admin.users') }}">admin/users</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('admin.classes') }}">admin/classes</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('admin.schedules') }}">admin/schedules</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('admin.attendance') }}">admin/attendance</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('admin.marks') }}">admin/marks</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('admin.messages') }}">admin/messages</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('admin.announcements') }}">admin/announcements</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('admin.settings') }}">admin/settings</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
            </ul>
        </li>
        <li><b>المعلم</b>
            <ul>
                <li><a href="{{ route('teacher.dashboard') }}">teacher/dashboard</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('teacher.classes') }}">teacher/classes</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
            </ul>
        </li>
        <li><b>ولي الامر</b>
            <ul>
                <li><a href="{{ route('parent.dashboard') }}">parent/dashboard</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('parent.children') }}">parent/children</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
            </ul>
        </li>
        <li><b>الطالب</b>
            <ul>
                <li><a href="{{ route('student.dashboard') }}">student/dashboard</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
                <li><a href="{{ route('student.schedule') }}">student/schedule</a> <span class="muted">(يتطلب تسجيل الدخول)</span></li>
            </ul>
        </li>
    </ul>
    <p class="muted">هذه الصفحة مؤقتة لتسهيل الوصول للواجهات أثناء التطوير فقط.</p>
</body>
</html>