<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Message;
use App\Models\ClassModel;
use Carbon\Carbon;

class ManagerController extends Controller
{
    public function dashboard()
    {
        return app(StaticPageController::class)->show('manager', 'index');
    }

    public function users(Request $request)
    {
        return app(StaticPageController::class)->show('manager', 'users');
    }

    public function classes(Request $request)
    {
        return app(StaticPageController::class)->show('manager', 'classes');
    }

    public function attendance(Request $request)
    {
        return app(StaticPageController::class)->show('manager', 'attendance');
    }

    public function messages(Request $request)
    {
        return app(StaticPageController::class)->show('manager', 'messages');
    }

    public function announcements()
    {
        return app(StaticPageController::class)->show('manager', 'announcements');
    }

    public function schedules()
    {
        return app(StaticPageController::class)->show('manager', 'schedules');
    }

    public function marks()
    {
        return app(StaticPageController::class)->show('manager', 'marks');
    }

    public function settings()
    {
        return app(StaticPageController::class)->show('manager', 'settings');
    }

    public function profile()
    {
        return app(StaticPageController::class)->show('manager', 'profile');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
