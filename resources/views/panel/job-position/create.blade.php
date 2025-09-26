@extends('layouts.app')

@section('title', 'ثبت آگهی شغلی')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row gap-6">
            @include('components.admin-sidebar', ['active' => 'post-job'])
            <div class="flex-1">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-800">ثبت آگهی جدید</h2>
                        <p class="text-gray-600 mt-1">فرم زیر را برای ثبت آگهی استخدام جدید تکمیل کنید.</p>
                    </div>
                    <div class="p-6">
                        <form method="POST" action="{{ route("panel.job-position.store") }}">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="job-title" class="block text-sm font-medium text-gray-700 mb-1">عنوان شغلی</label>
                                    <input type="text" id="job-title" name="title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="مثال: توسعه‌دهنده وب">
                                </div>
                                <div>
                                    <label for="job-category" class="block text-sm font-medium text-gray-700 mb-1">دسته‌بندی</label>
                                    <select id="job-category" name="category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($categories as $category)
                                            <option value={{ $category->id }}>{{ __($category->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="job-level" class="block text-sm font-medium text-gray-700 mb-1">سطح</label>
                                    <select id="job-level" name="level" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($levels as $level)
                                            <option value={{ $level->id }}>{{ __($level->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="job-type" class="block text-sm font-medium text-gray-700 mb-1">نوع همکاری</label>
                                    <select id="job-type" name="type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($types as $type)
                                            <option value={{ $type->id }}>{{ __($type->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="job-location" class="block text-sm font-medium text-gray-700 mb-1">محل کار</label>
                                    <input type="text" id="job-location" name="location" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="مثال: تهران">
                                </div>
                                <div class="md:col-span-2">
                                    <label for="job-description" class="block text-sm font-medium text-gray-700 mb-1">شرح موقعیت شغلی</label>
                                    <textarea id="job-description" name="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="توضیحات درباره موقعیت شغلی"></textarea>
                                </div>
                                {{--<div class="md:col-span-2">
                                    <label for="job-responsibilities" class="block text-sm font-medium text-gray-700 mb-1">مسئولیت‌ها</label>
                                    <textarea id="job-responsibilities" name="responsibilities" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="هر مسئولیت را در یک خط جداگانه وارد کنید"></textarea>
                                    <p class="text-xs text-gray-500 mt-1">هر مسئولیت را در یک خط جداگانه وارد کنید.</p>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="job-requirements" class="block text-sm font-medium text-gray-700 mb-1">الزامات</label>
                                    <textarea id="job-requirements" name="requirements" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="هر مورد را در یک خط جداگانه وارد کنید"></textarea>
                                    <p class="text-xs text-gray-500 mt-1">هر مورد را در یک خط جداگانه وارد کنید.</p>
                                </div>--}}
                                <div>
                                    <label for="salary" class="block text-sm font-medium text-gray-700 mb-1">میزان حقوق درخواستی(تومان)</label>
                                    <input type="text" id="salary" name="salary" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="مثال: 10000000">
                                </div>
                                <div>
                                    <label for="job-skills" class="block text-sm font-medium text-gray-700 mb-1">مهارت‌های مورد نیاز</label>
                                    <input type="text" id="job-skills" name="skills" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="مثال: React, JavaScript, HTML">
                                    <p class="text-xs text-gray-500 mt-1">مهارت‌ها را با کاما از هم جدا کنید</p>
                                </div>
                                <div>
                                    <label for="deadline" class="block text-sm font-medium text-gray-700 mb-1">مهلت ارسال رزومه</label>
                                    <input type="date" id="deadline" name="deadline" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" value="2025-09-30">
                                </div>
                            </div>
                            <div class="mt-8 pt-5 border-t border-gray-200 flex justify-end">
                                <button type="button" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100">
                                    انصراف
                                </button>
                                <button type="submit" class="mr-3 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                    ثبت آگهی
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
