@extends('layouts.app')

@section('title', 'داشبورد')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row gap-6">
            @include('components.admin-sidebar', ['active' => 'dashboard'])
            <div class="flex-1">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-bold text-gray-800">داشبورد</h2>
                    <p class="text-gray-600 mt-1">خلاصه‌ای از فعالیت‌های سیستم</p>
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-indigo-50 p-4 rounded-lg text-center">
                            <h3 class="text-lg font-semibold text-gray-800">تعداد آگهی‌ها</h3>
                            <p class="text-3xl font-bold text-indigo-600">۴۸</p>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg text-center">
                            <h3 class="text-lg font-semibold text-gray-800">رزومه‌های دریافتی</h3>
                            <p class="text-3xl font-bold text-green-600">۱۲۳</p>
                        </div>
                        <div class="bg-yellow-50 p-4 rounded-lg text-center">
                            <h3 class="text-lg font-semibold text-gray-800">کاربران فعال</h3>
                            <p class="text-3xl font-bold text-yellow-600">۲۷۵</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
