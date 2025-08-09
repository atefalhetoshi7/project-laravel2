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
        $totalStudents = User::where('role', 'student')->count();
        $totalTeachers = User::where('role', 'teacher')->count();

        $today = Carbon::today();
        $presentTodayCount = Attendance::whereDate('date', $today)
            ->where('status', 'present')
            ->count();

        $attendanceTodayPercent = $totalStudents > 0
            ? round(($presentTodayCount / $totalStudents) * 100, 1)
            : null;

        $newMessagesCount = Message::where('sent_at', '>=', now()->subDay())->count();

        return view('manager.dashboard', [
            'totalStudents' => $totalStudents,
            'totalTeachers' => $totalTeachers,
            'attendanceTodayPercent' => $attendanceTodayPercent,
            'newMessagesCount' => $newMessagesCount,
        ]);
    }

    public function users(Request $request)
    {
        $query = User::query();

        if ($request->filled('role')) {
            $query->where('role', $request->input('role'));
        }

        if ($request->filled('q')) {
            $term = $request->input('q');
            $query->where(function ($q) use ($term) {
                $q->where('first_name', 'like', "%{$term}%")
                  ->orWhere('father_name', 'like', "%{$term}%")
                  ->orWhere('last_name', 'like', "%{$term}%")
                  ->orWhere('registration_number', 'like', "%{$term}%");
            });
        }

        $users = $query->orderByDesc('created_at')->paginate(10)->withQueryString();

        return view('manager.users', [
            'users' => $users,
            'filterRole' => (string) $request->input('role', ''),
            'searchTerm' => (string) $request->input('q', ''),
        ]);
    }

    public function classes(Request $request)
    {
        $allClasses = ClassModel::withCount('studentRegistrations')
            ->orderBy('grade_level')
            ->orderBy('class_number')
            ->get();

        $classesByGrade = $allClasses->groupBy('grade_level');

        return view('manager.classes', [
            'classesByGrade' => $classesByGrade,
        ]);
    }

    public function attendance(Request $request)
    {
        $query = Attendance::query()
            ->select('attendance.*', 'classes.grade_level', 'classes.class_number', 'users.first_name', 'users.father_name', 'users.last_name', 'users.email')
            ->join('users', 'users.id', '=', 'attendance.user_id')
            ->leftJoin('student_registrations', function ($join) {
                $join->on('student_registrations.user_id', '=', 'attendance.user_id')
                     ->on('student_registrations.academic_year_id', '=', 'attendance.academic_year_id');
            })
            ->leftJoin('classes', 'classes.id', '=', 'student_registrations.class_id');

        if ($request->filled('date')) {
            $query->whereDate('attendance.date', Carbon::parse($request->input('date')));
        }

        if ($request->filled('status')) {
            $query->where('attendance.status', $request->input('status'));
        }

        if ($request->filled('q')) {
            $term = $request->input('q');
            $query->where(function ($q) use ($term) {
                $q->where('users.first_name', 'like', "%{$term}%")
                  ->orWhere('users.father_name', 'like', "%{$term}%")
                  ->orWhere('users.last_name', 'like', "%{$term}%")
                  ->orWhere('users.email', 'like', "%{$term}%");
            });
        }

        if ($request->filled('class_id')) {
            $query->where('classes.id', $request->input('class_id'));
        }

        $records = $query->orderByDesc('attendance.date')->paginate(15)->withQueryString();

        // For filters: list of classes
        $classes = ClassModel::orderBy('grade_level')->orderBy('class_number')->get();

        return view('manager.attendance', [
            'records' => $records,
            'selectedDate' => (string) $request->input('date', ''),
            'selectedStatus' => (string) $request->input('status', ''),
            'searchTerm' => (string) $request->input('q', ''),
            'selectedClassId' => (string) $request->input('class_id', ''),
            'classes' => $classes,
        ]);
    }

    public function messages(Request $request)
    {
        $messages = Message::orderByDesc('sent_at')->paginate(15);
        return view('manager.messages', [
            'messages' => $messages,
        ]);
    }

    public function announcements()
    {
        return view('manager.announcements');
    }

    public function schedules()
    {
        return view('manager.schedules');
    }

    public function marks()
    {
        return view('manager.marks');
    }

    public function settings()
    {
        return view('manager.settings');
    }

    public function profile()
    {
        return view('manager.profile');
    }

    public function storeClass(Request $request)
    {
        $validated = $request->validate([
            'grade_level' => ['required', 'integer', 'min:1', 'max:12'],
            'class_number' => ['required', 'integer', 'min:1', 'max:20'],
            'display_name' => ['nullable', 'string', 'max:255'],
        ]);

        $class = new ClassModel();
        $class->grade_level = $validated['grade_level'];
        $class->class_number = $validated['class_number'];
        if (!empty($validated['display_name'])) {
            $class->display_name = $validated['display_name'];
        }
        $class->save();

        return redirect()->route('manager.classes')->with('status', 'تم إنشاء الصف بنجاح');
    }
}
