@php($assetBase = 'Madarek Front End/Login-Signup')
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب جديد - مدارِك</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset($assetBase.'/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body class="font-arabic bg-gray-50">
    <div class="min-h-screen flex flex-col md:flex-row">
        <div class="md:w-1/2 lg:w-2/5 bg-gradient-to-br from-indigo-600 to-purple-700 text-white p-8 md:p-12 flex flex-col justify-center items-center relative overflow-hidden">
            <div class="text-center z-10 relative">
                <img src="https://r2.flowith.net/files/o/1748451765656-Modern_Logo_Design_for_Madarek_School_Management_Platform_index_0@1024x1024.png" class="w-32 h-32 md:w-40 md:h-40 mx-auto mb-6 object-contain rounded-full shadow-lg">
                <h1 class="text-4xl md:text-5xl font-bold mb-3">مــدارك</h1>
                <p class="text-lg md:text-xl text-indigo-200">نظام إدارة التعلم الشامل</p>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-3/5 flex items-center justify-center p-6 sm:p-8 md:p-12 bg-white">
            <div class="w-full max-w-md">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-8 text-center">إنشاء حساب جديد</h2>
                <form id="signupForm" method="POST" action="{{ route('register.post') }}" class="space-y-6">
                    @csrf
                    <div class="form-field-container">
                        <label for="user_id" class="block text-sm font-medium text-gray-700 mb-1">رقم القيد</label>
                        <input type="text" id="user_id" name="user_id" value="{{ old('user_id') }}" required class="w-full pr-3 pl-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="ادخل رقم القيد">
                        @error('user_id')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-field-container">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">البريد الإلكتروني</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full pr-3 pl-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="أدخل البريد الإلكتروني">
                        @error('email')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-field-container">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">كلمة المرور</label>
                        <input type="password" id="password" name="password" required minlength="8" class="w-full pr-3 pl-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="أدخل كلمة المرور">
                        @error('password')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-field-container">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">تأكيد كلمة المرور</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8" class="w-full pr-3 pl-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="أعد إدخال كلمة المرور">
                    </div>
                    <button type="submit" id="signupBtn" class="w-full bg-gradient-to-r from-indigo-600 to-purple-700 hover:from-indigo-700 hover:to-purple-800 text-white py-3 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 font-semibold text-lg shadow-md">إنشاء الحساب</button>
                    <div class="text-sm text-center mt-4">
                        لديك حساب بالفعل؟ <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">تسجيل الدخول</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset($assetBase.'/script.js') }}"></script>
</body>
</html>



