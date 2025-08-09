<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    $role = auth()->user()->role;

    return match ($role) {
        'admin' => redirect()->route('admin.dashboard'),
        'manager' => redirect()->route('manager.dashboard'),
        'teacher' => redirect()->route('teacher.dashboard'),
        'student' => redirect()->route('student.dashboard'),
        'parent' => redirect()->route('parent.dashboard'),
        default => redirect()->route('login'),
    };
})->name('home');

Route::get('/users/{id}', function (string $id) {
    
});


Route::get('/users', function(){
    return view('/users', ['name' => 'Welcome user']);
});

// Students listing (for managers) used by layouts/app sidebar
Route::get('/students', [StudentController::class, 'index'])
    ->middleware(['auth', 'role:manager'])
    ->name('students.index');

Route::resource('products', ProductController::class);




use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;


// مسارات حسب الدور
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/students', [AdminController::class, 'students'])->name('admin.students');
    Route::get('/teachers', [AdminController::class, 'teachers'])->name('admin.teachers');
    // Extra admin pages used by the admin layout
    Route::view('/users', 'admin.users')->name('admin.users');
    Route::view('/classes', 'manager.classes')->name('admin.classes');
    Route::view('/schedules', 'manager.schedules')->name('admin.schedules');
    Route::view('/attendance', 'admin.attendence')->name('admin.attendance');
    Route::view('/marks', 'manager.marks')->name('admin.marks');
    Route::view('/messages', 'manager.messages')->name('admin.messages');
    Route::view('/announcements', 'manager.announcements')->name('admin.announcements');
    Route::view('/settings', 'manager.settings')->name('admin.settings');
});

Route::middleware(['auth', 'role:manager'])->prefix('manager')->group(function () {
    Route::get('/', function(){ return redirect()->route('manager.dashboard'); })->name('manager.home');
    Route::get('/dashboard', [ManagerController::class, 'dashboard'])->name('manager.dashboard');
    Route::get('/users', [ManagerController::class, 'users'])->name('manager.users');
    Route::get('/classes', [ManagerController::class, 'classes'])->name('manager.classes');
    Route::get('/attendance', [ManagerController::class, 'attendance'])->name('manager.attendance');
    Route::get('/messages', [ManagerController::class, 'messages'])->name('manager.messages');
    Route::get('/announcements', [ManagerController::class, 'announcements'])->name('manager.announcements');
    Route::get('/schedules', [ManagerController::class, 'schedules'])->name('manager.schedules');
    Route::get('/marks', [ManagerController::class, 'marks'])->name('manager.marks');
    Route::get('/settings', [ManagerController::class, 'settings'])->name('manager.settings');
    Route::get('/profile', [ManagerController::class, 'profile'])->name('manager.profile');
});

Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->group(function () {
    Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    Route::get('/classes', [TeacherController::class, 'classes'])->name('teacher.classes');
});

Route::middleware(['auth', 'role:student'])->prefix('student')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/schedule', [StudentController::class, 'schedule'])->name('student.schedule');
});

Route::middleware(['auth', 'role:parent'])->prefix('parent')->group(function () {
    Route::get('/dashboard', [ParentController::class, 'dashboard'])->name('parent.dashboard');
    Route::get('/children', [ParentController::class, 'children'])->name('parent.children');
});

// Front-end developer navigation (Blade only)
Route::prefix('fe')->group(function () {
    Route::view('/', 'fe.index')->name('fe.home');
});

// Preview routes (no auth) to quickly see the new Blade pages
Route::prefix('preview')->group(function () {
    Route::get('/manager/dashboard', [ManagerController::class, 'dashboard']);
    Route::get('/manager/users', [ManagerController::class, 'users']);
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');