@extends('layouts.app')

@section('title', 'تنظیمات')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-6">
        @include('components.admin-sidebar', ['active' => 'settings'])
        <div class="flex-1">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800">تنظیمات</h2>
                    <p class="text-gray-600 mt-1">تنظیمات سیستم را از اینجا مدیریت کنید.</p>
                </div>
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.settings.update') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="site-name" class="block text-sm font-medium text-gray-700 mb-1">نام سایت</label>
                                <input type="text" id="site-name" name="site_name" value="سامانه استخدام" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label for="default-category" class="block text-sm font-medium text-gray-700 mb-1">دسته‌بندی پیش‌فرض</label>
                                <select id="default-category" name="default_category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option value="development" selected>توسعه نرم‌افزار</option>
                                    <option value="design">طراحی</option>
                                    <option value="marketing">بازاریابی</option>
                                    <option value="hr">منابع انسانی</option>
                                    <option value="finance">مالی و حسابداری</option>
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label for="email-notifications" class="block text-sm font-medium text-gray-700 mb-1">اعلان‌های ایمیلی</label>
                                <textarea id="email-notifications" name="email_notifications" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">ارسال ایمیل برای رزومه‌های جدید: فعال
ارسال ایمیل برای وضعیت آگهی: فعال</textarea>
                            </div>
                            <div>
                                <label for="max-applications" class="block text-sm font-medium text-gray-700 mb-1">حداکثر تعداد رزومه در هر آگهی</label>
                                <input type="number" id="max-applications" name="max_applications" value="100" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                        </div>
                        <div class="mt-8 pt-5 border-t border-gray-200 flex justify-end">
                            <button type="button" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100">
                                انصراف
                            </button>
                            <button type="submit" class="mr-3 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                ذخیره تنظیمات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection