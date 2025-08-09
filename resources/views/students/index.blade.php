@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">قائمة الطلاب</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>رقم التسجيل</th>
                <th>الفصل</th>
                <th>حالة الحضور</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->first_name }} {{ $student->father_name }} {{ $student->last_name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->registration_number }}</td>
                <td>
                    @if($student->studentRegistrations->count() > 0)
                        @foreach($student->studentRegistrations as $registration)
                            {{ $registration->classModel->grade_level }} - {{ $registration->classModel->class_number }}
                        @endforeach
                    @else
                        غير مسجل
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection