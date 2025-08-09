@extends('layouts.teacher')

@section('title', 'لوحة المعلم')

@section('content')
<div class="max-w-5xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">مرحباً {{ auth()->user()->full_name ?? 'المعلم' }}</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <a href="{{ route('teacher.classes') }}" class="bg-white shadow rounded p-4 text-center">دروسي</a>
        <a href="#" class="bg-white shadow rounded p-4 text-center">الطلاب</a>
        <a href="#" class="bg-white shadow rounded p-4 text-center">الرسائل</a>
    </div>
</div>
@endsection




