<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }
    
    public function students()
    {
        $students = User::where('role', 'student')->with('studentRegistrations')->get();
        return view('admin.students', compact('students'));
    }
    
    public function teachers()
    {
        $teachers = User::where('role', 'teacher')->with('teacherSubjects')->get();
        return view('admin.teachers', compact('teachers'));
    }
}