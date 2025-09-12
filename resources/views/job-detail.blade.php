@extends('layouts.app')

@section('title', 'جزئیات فرصت شغلی')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Job Detail Section -->
    <section id="job-detail" class="mb-12">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <div class="flex justify-between items-start">
                    <div>
                        <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-xs font-medium">توسعه نرم‌افزار</span>
                        <h2 class="text-2xl font-bold text-gray-800 mt-2">توسعه‌دهنده فرانت‌اند</h2>
                        <p class="text-gray-600 mt-1">شرکت فناوری اطلاعات نوین</p>
                    </div>
                    <div class="flex space-x-3 space-x-reverse">
                        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                            <i class="fas fa-bookmark ml-1"></i>
                            ذخیره
                        </button>
                        <button id="apply-button" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                            <i class="fas fa-paper-plane ml-1"></i>
                            ارسال رزومه
                        </button>
                    </div>
                </div>
                
                <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="col-span-2">
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-3">شرح موقعیت شغلی</h3>
                            <p class="text-gray-700 leading-relaxed">
                                شرکت فناوری اطلاعات نوین در حال گسترش تیم فنی خود می‌باشد و به دنبال یک توسعه‌دهنده فرانت‌اند با تجربه برای پیوستن به تیم ما است. در این نقش، شما مسئول توسعه و نگهداری رابط کاربری محصولات نرم‌افزاری ما خواهید بود و با تیم‌های طراحی و بک‌اند برای ایجاد تجربیات کاربری عالی همکاری خواهید کرد.
                            </p>
                        </div>
                        
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-3">مسئولیت‌ها</h3>
                            <ul class="list-disc pr-5 text-gray-700 space-y-2">
                                <li>توسعه و پیاده‌سازی رابط کاربری با استفاده از React.js و Next.js</li>
                                <li>همکاری با تیم طراحی برای تبدیل طرح‌های UI/UX به کدهای کارآمد و قابل نگهداری</li>
                                <li>بهینه‌سازی عملکرد برنامه‌های فرانت‌اند برای تجربه کاربری بهتر</li>
                                <li>نوشتن کدهای تمیز، قابل تست و مستندسازی شده</li>
                                <li>همکاری با تیم بک‌اند برای یکپارچه‌سازی APIها</li>
                            </ul>
                        </div>
                        
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-3">الزامات</h3>
                            <ul class="list-disc pr-5 text-gray-700 space-y-2">
                                <li>حداقل ۳ سال تجربه کار با React.js در محیط‌های تولیدی</li>
                                <li>تسلط به JavaScript (ES6+)، HTML5 و CSS3</li>
                                <li>آشنایی با کتابخانه‌های حالت مانند Redux یا Context API</li>
                                <li>تجربه کار با ابزارهای ساخت مانند Webpack یا Vite</li>
                                <li>آشنایی با مفاهیم RESTful APIs و GraphQL</li>
                                <li>تسلط به Git و فرآیندهای توسعه نرم‌افزار</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-bold text-gray-800 mb-3">جزئیات شغل</h3>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-gray-500 text-sm">موقعیت شغلی</p>
                                    <p class="text-gray-800">توسعه‌دهنده فرانت‌اند</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">نوع همکاری</p>
                                    <p class="text-gray-800">تمام وقت</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">حقوق</p>
                                    <p class="text-gray-800">۱۵ - ۲۰ میلیون تومان</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">محدوده مکانی</p>
                                    <p class="text-gray-800">تهران، سعادت آباد</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">سطح ارشدیت</p>
                                    <p class="text-gray-800">میان‌رده</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">مهارت‌های کلیدی</p>
                                    <div class="flex flex-wrap gap-2 mt-1">
                                        <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">React.js</span>
                                        <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">JavaScript</span>
                                        <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">HTML/CSS</span>
                                        <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">Redux</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4 bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-bold text-gray-800 mb-3">درباره شرکت</h3>
                            <p class="text-gray-700 text-sm">
                                شرکت فناوری اطلاعات نوین با بیش از ۱۰ سال سابقه در زمینه توسعه نرم‌افزارهای سازمانی و تحت وب، یکی از پیشروهای این صنعت در ایران محسوب می‌شود. ما با تمرکز بر نوآوری و کیفیت، راهکارهای نرم‌افزاری برای کسب‌وکارهای مختلف ارائه می‌دهیم.
                            </p>
                            <div class="mt-3 flex space-x-3 space-x-reverse text-sm">
                                <span class="flex items-center text-gray-600">
                                    <i class="fas fa-globe ml-1"></i>
                                    <a href="#" class="text-indigo-600 hover:underline">novin-it.com</a>
                                </span>
                                <span class="flex items-center text-gray-600">
                                    <i class="fas fa-users ml-1"></i>
                                    ۵۱-۲۰۰ نفر
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Resume Submission Form -->
            <div id="apply-form" class="p-6 bg-gray-50">
                <h3 class="text-xl font-bold text-gray-800 mb-4">ارسال رزومه</h3>
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="fullname" class="block text-sm font-medium text-gray-700 mb-1">نام و نام خانوادگی</label>
                            <input type="text" id="fullname" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">ایمیل</label>
                            <input type="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">شماره تماس</label>
                            <input type="tel" id="phone" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="salary" class="block text-sm font-medium text-gray-700 mb-1">حقوق پیشنهادی (تومان)</label>
                            <input type="text" id="salary" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <div class="md:col-span-2">
                            <label for="resume" class="block text-sm font-medium text-gray-700 mb-1">رزومه (PDF یا Word)</label>
                            <div class="mt-1 flex items-center">
                                <input type="file" id="resume" class="hidden">
                                <label for="resume" class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
                                    انتخاب فایل
                                </label>
                                <span class="mr-3 text-sm text-gray-500" id="file-name">هیچ فایلی انتخاب نشده است</span>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <label for="cover-letter" class="block text-sm font-medium text-gray-700 mb-1">نامه همراه (اختیاری)</label>
                            <textarea id="cover-letter" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end space-x-3 space-x-reverse">
                        <button type="button" id="cancel-apply" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100">
                            انصراف
                        </button>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                            ارسال درخواست
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection