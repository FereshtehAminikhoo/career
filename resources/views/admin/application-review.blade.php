@extends('layouts.app')

@section('title', 'بررسی رزومه')

@section('content')
<div id="page-content" class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-6">
        @include('components.admin-sidebar', ['active' => 'applications'])
        <div class="flex-1">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800">بررسی رزومه: {{ $applicant['name'] }}</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-bold text-gray-800 mb-3">اطلاعات متقاضی</h3>
                            <div class="space-y-2">
                                <p class="text-sm text-gray-700">
                                    <span class="font-medium">نام:</span> {{ $applicant['name'] }}
                                </p>
                                <p class="text-sm text-gray-700">
                                    <span class="font-medium">ایمیل:</span> {{ $applicant['email'] }}
                                </p>
                                <p class="text-sm text-gray-700">
                                    <span class="font-medium">شماره تماس:</span> {{ $applicant['phone'] }}
                                </p>
                                <p class="text-sm text-gray-700">
                                    <span class="font-medium">حقوق پیشنهادی:</span> {{ toToman($applicant['salary']) }}
                                </p>
                                <p class="text-sm text-gray-700">
                                    <span class="font-medium">نامه همراه:</span> {{ $applicant['cover_letter'] }}
                                </p>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg relative">
                            <h3 class="text-lg font-bold text-gray-800 mb-3">پیش‌نمایش رزومه</h3>
                            <iframe id="resume-preview" src="{{ $applicant['resume_pdf'] }}" class="w-full h-96 border border-gray-200 rounded-lg"></iframe>
                            <div class="mt-3 flex justify-end space-x-3 space-x-reverse">
                                <a href="{{ $applicant['resume_pdf'] }}" download class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200">
                                    دانلود رزومه
                                </a>
                                <button id="zoom-resume" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-200">
                                    بزرگنمایی
                                </button>
                            </div>
                            <button id="exit-fullscreen" class="hidden absolute top-4 left-4 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200">
                                خروج
                            </button>
                            <p class="text-xs text-gray-500 mt-2">پیش‌نمایش PDF رزومه متقاضی</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.application.review.store') }}">
                        @csrf
                        <input type="hidden" name="application_id" value="{{ $application_id }}">
                        <input type="hidden" name="job_id" value="{{ $job_id ?? 1 }}">
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="score" class="block text-sm font-medium text-gray-700 mb-1">امتیاز فنی (از ۱ تا ۱۰)</label>
                                <input type="number" id="score" name="score" min="1" max="10" class="w-full px-4 py-2 border border-gray-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label for="comments" class="block text-sm font-medium text-gray-700 mb-1">توضیحات</label>
                                <textarea id="comments" name="comments" rows="4" class="w-full px-4 py-2 border border-gray-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                            </div>
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">وضعیت</label>
                                <select id="status" name="status" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-700 hover:bg-gray-50 transition duration-200 appearance-none text-right pr-10" style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22%23666666%22 stroke-width=%222%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22%3e%3cpolyline points=%226 9 12 15 18 9%22%3e%3c/polyline%3e%3c/svg%3e'); background-position: left 0.5rem center; background-repeat: no-repeat; background-size: 1.5em;">
                                    <option value="approve">تایید</option>
                                    <option value="reject">رد</option>
                                    <option value="pending">در حال بررسی</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-6 flex justify-end space-x-3 space-x-reverse">
                            <button type="button" class="px-4 py-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50">
                                انصراف
                            </button>
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                                ثبت نظر
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const zoomButton = document.getElementById('zoom-resume');
    const exitButton = document.getElementById('exit-fullscreen');
    const resumeIframe = document.getElementById('resume-preview');
    const pageContent = document.getElementById('page-content');

    zoomButton.addEventListener('click', () => {
        resumeIframe.classList.remove('h-96');
        resumeIframe.classList.add('fixed', 'inset-0', 'w-full', 'h-full', 'z-50');
        pageContent.classList.add('hidden');
        exitButton.classList.remove('hidden');
        zoomButton.classList.add('hidden');
    });

    exitButton.addEventListener('click', () => {
        resumeIframe.classList.remove('fixed', 'inset-0', 'w-full', 'h-full', 'z-50');
        resumeIframe.classList.add('h-96');
        pageContent.classList.remove('hidden');
        exitButton.classList.add('hidden');
        zoomButton.classList.remove('hidden');
    });
</script>
@endsection