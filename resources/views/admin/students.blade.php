@extends('layouts.admin')

@section('title', 'الطلاب')

@section('content')
<main class="flex-1 overflow-y-auto focus:outline-none">
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                        قائمة الطلاب
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">عرض جميع الطلاب المسجلين</p>
                </div>
            </div>

            <div class="mt-6 bg-white shadow rounded-lg overflow-hidden">
                <div class="px-4 py-5 sm:p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-right font-semibold text-gray-600">#</th>
                                    <th class="px-4 py-2 text-right font-semibold text-gray-600">الاسم</th>
                                    <th class="px-4 py-2 text-right font-semibold text-gray-600">البريد</th>
                                    <th class="px-4 py-2 text-right font-semibold text-gray-600">رقم القيد</th>
                                    <th class="px-4 py-2 text-right font-semibold text-gray-600">عدد التسجيلات</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @forelse($students as $index => $student)
                                    <tr>
                                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                                        <td class="px-4 py-2">{{ trim(($student->first_name ?? '').' '.($student->father_name ?? '').' '.($student->last_name ?? '')) ?: '—' }}</td>
                                        <td class="px-4 py-2">{{ $student->email }}</td>
                                        <td class="px-4 py-2">{{ $student->registration_number ?? '—' }}</td>
                                        <td class="px-4 py-2">{{ $student->studentRegistrations->count() }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">لا يوجد طلاب</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection