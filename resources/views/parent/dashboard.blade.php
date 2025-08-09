@extends('layouts.user')

@section('title', 'لوحة ولي الأمر')

@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">مرحباً {{ auth()->user()->full_name ?? 'ولي الأمر' }}</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <a href="{{ route('parent.children') }}" class="bg-white shadow rounded p-4 text-center">أبنائي</a>
        <a href="#" class="bg-white shadow rounded p-4 text-center">الرسائل</a>
    </div>
</div>
@endsection




