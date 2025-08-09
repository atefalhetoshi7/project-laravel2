<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return redirect()->route('static.show', ['role' => 'admin', 'path' => 'index']);
    }

    public function students()
    {
        return view('admin.students');
    }

    public function teachers()
    {
        return view('admin.teachers');
    }
}