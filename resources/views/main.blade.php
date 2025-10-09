@extends('layouts.app')

@section('title', 'فرصت‌های شغلی')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Job Listings Page -->
    <section id="jobs" class="mb-12">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">فرصت‌های شغلی</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Active Job Card -->
            @foreach($job_positions as $job_position)
            <div class="job-card rounded-xl overflow-hidden relative">
                @if($job_position->expired_at < now() || $job_position->is_open == 0)
                <div class="expired-tag">منقضی شده</div>
                @endif
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-xs font-medium">{{ __($job_position->category->name) }}</span>
                            <h3 class="text-xl font-bold text-gray-800 mt-2">{{ $job_position->title }}</h3>
                            <p class="text-gray-600 mt-1">شرکت فناوری اطلاعات نوین</p>
                        </div>
                        @php
                            $categoryIcons = [
                                "Management & Leadership" => "fas fa-user-tie",
                                "Operations" => "fas fa-cogs",
                                "Technical & Engineering" => "fas fa-laptop-code",
                                "Support & Customer Service" => "fas fa-headset",
                                "Sales & Marketing" => "fas fa-chart-line",
                                "HR & Administration" => "fas fa-users",
                                "Finance & Accounting" => "fas fa-calculator",
                                "Research & Development" => "fas fa-flask",
                                "Legal & Compliance" => "fas fa-balance-scale",
                                "General Services" => "fas fa-concierge-bell",
                            ];
                        @endphp
                        <div class="text-indigo-600 text-3xl">
                            <i class="{{ $categoryIcons[$job_position->category->name] ?? 'fas fa-briefcase' }}"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="flex items-center text-gray-600 text-sm">
                            <i class="fas fa-map-marker-alt ml-1"></i>
                            {{ $job_position->location }}
                        </span>
                        <span class="flex items-center text-gray-600 text-sm">
                            <i class="fas fa-clock ml-1"></i>
                            {{ __($job_position->type->name) }}
                        </span>
                        <span class="flex items-center text-gray-600 text-sm">
                            <i class="fas fa-money-bill-wave ml-1"></i>
                            {{ $job_position->price }}
                        </span>
                    </div>
                    <p class="text-gray-700 mt-3 text-sm line-clamp-2">{{ $job_position->description }}</p>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-xs text-gray-500">{{ \Morilog\Jalali\Jalalian::fromDateTime($job_position->created_at)->ago() }}</span>
                        <a href="{{ route('job-position.detail', $job_position->id) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Expired Job Card -->
            {{--<div class="job-card rounded-xl overflow-hidden relative">
                <div class="expired-tag">منقضی شده</div>
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <span class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">منابع انسانی</span>
                            <h3 class="text-xl font-bold text-gray-800 mt-2">کارشناس جذب و استخدام</h3>
                            <p class="text-gray-600 mt-1">شرکت توسعه منابع انسانی</p>
                        </div>
                        <div class="text-green-600 text-3xl">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="flex items-center text-gray-600 text-sm">
                            <i class="fas fa-map-marker-alt ml-1"></i>
                            اصفهان
                        </span>
                        <span class="flex items-center text-gray-600 text-sm">
                            <i class="fas fa-clock ml-1"></i>
                            پاره وقت
                        </span>
                        <span class="flex items-center text-gray-600 text-sm">
                            <i class="fas fa-money-bill-wave ml-1"></i>
                            ۱۰ - ۱۲ میلیون تومان
                        </span>
                    </div>
                    <p class="text-gray-700 mt-3 text-sm line-clamp-2">به دنبال یک کارشناس منابع انسانی با تجربه در فرآیندهای جذب و استخدام برای همکاری در تیم HR شرکت هستیم. تسلط به نرم‌افزارهای HRM یک مزیت محسوب می‌شود.</p>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-xs text-gray-500">۱ هفته پیش</span>
                        <a href="#job-detail" class="text-green-600 hover:text-green-800 font-medium">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>--}}

            <!-- Another Active Job Card -->
            {{--<div class="job-card rounded-xl overflow-hidden relative">
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">مالی و حسابداری</span>
                            <h3 class="text-xl font-bold text-gray-800 mt-2">حسابدار ارشد</h3>
                            <p class="text-gray-600 mt-1">شرکت خدمات مالی پویا</p>
                        </div>
                        <div class="text-blue-600 text-3xl">
                            <i class="fas fa-calculator"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="flex items-center text-gray-600 text-sm">
                            <i class="fas fa-map-marker-alt ml-1"></i>
                            مشهد
                        </span>
                        <span class="flex items-center text-gray-600 text-sm">
                            <i class="fas fa-clock ml-1"></i>
                            تمام وقت
                        </span>
                        <span class="flex items-center text-gray-600 text-sm">
                            <i class="fas fa-money-bill-wave ml-1"></i>
                            ۱۸ - ۲۲ میلیون تومان
                        </span>
                    </div>
                    <p class="text-gray-700 mt-3 text-sm line-clamp-2">به دنبال یک حسابدار ارشد با حداقل ۵ سال سابقه کار در زمینه حسابداری مالی و صنعتی هستیم. تسلط به نرم‌افزارهای حسابداری و قوانین مالیاتی ضروری است.</p>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-xs text-gray-500">۳ روز پیش</span>
                        <a href="#job-detail" class="text-blue-600 hover:text-blue-800 font-medium">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>--}}
        </div>

        <div class="mt-8 flex justify-center">
            <nav class="flex items-center gap-2">
                <button class="pagination-circle bg-gray-200 text-gray-700 hover:bg-gray-300">
                    <i class="fas fa-chevron-right"></i>
                </button>
                <button class="pagination-circle bg-indigo-600 text-white">1</button>
                <button class="pagination-circle hover:bg-gray-100">2</button>
                <button class="pagination-circle hover:bg-gray-100">3</button>
                <button class="pagination-circle bg-gray-200 text-gray-700 hover:bg-gray-300">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </nav>
        </div>
    </section>

    <!-- Job Detail Page -->
    <section id="job-detail" class="mb-12 hidden">
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

            <!-- Apply Form (Hidden by default) -->
            <div id="apply-form" class="hidden p-6 bg-gray-50">
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
        </section>

        <!-- Post Job Page (Admin) -->
        <section id="post-job" class="mb-12 hidden">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800">ثبت آگهی جدید</h2>
                    <p class="text-gray-600 mt-1">فرم زیر را برای ثبت آگهی استخدام جدید تکمیل کنید.</p>
                </div>

                <div class="p-6">
                    <form>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="job-title" class="block text-sm font-medium text-gray-700 mb-1">عنوان شغلی</label>
                                <input type="text" id="job-title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label for="job-category" class="block text-sm font-medium text-gray-700 mb-1">دسته‌بندی</label>
                                <select id="job-category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option value="">انتخاب کنید</option>
                                    <option value="development">توسعه نرم‌افزار</option>
                                    <option value="design">طراحی</option>
                                    <option value="marketing">بازاریابی</option>
                                    <option value="hr">منابع انسانی</option>
                                    <option value="finance">مالی و حسابداری</option>
                                </select>
                            </div>
                            <div>
                                <label for="job-type" class="block text-sm font-medium text-gray-700 mb-1">نوع همکاری</label>
                                <select id="job-type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option value="">انتخاب کنید</option>
                                    <option value="full-time">تمام وقت</option>
                                    <option value="part-time">پاره وقت</option>
                                    <option value="remote">دورکاری</option>
                                    <option value="internship">کارآموزی</option>
                                </select>
                            </div>
                            <div>
                                <label for="job-location" class="block text-sm font-medium text-gray-700 mb-1">محل کار</label>
                                <input type="text" id="job-location" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                            <div class="md:col-span-2">
                                <label for="job-description" class="block text-sm font-medium text-gray-700 mb-1">شرح موقعیت شغلی</label>
                                <textarea id="job-description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                            </div>
                            <div class="md:col-span-2">
                                <label for="job-responsibilities" class="block text-sm font-medium text-gray-700 mb-1">مسئولیت‌ها</label>
                                <textarea id="job-responsibilities" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                                <p class="text-xs text-gray-500 mt-1">هر مسئولیت را در یک خط جداگانه وارد کنید.</p>
                            </div>
                            <div class="md:col-span-2">
                                <label for="job-requirements" class="block text-sm font-medium text-gray-700 mb-1">الزامات</label>
                                <textarea id="job-requirements" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                                <p class="text-xs text-gray-500 mt-1">هر مورد را در یک خط جداگانه وارد کنید.</p>
                            </div>
                            <div>
                                <label for="min-salary" class="block text-sm font-medium text-gray-700 mb-1">حداقل حقوق (تومان)</label>
                                <input type="text" id="min-salary" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label for="max-salary" class="block text-sm font-medium text-gray-700 mb-1">حداکثر حقوق (تومان)</label>
                                <input type="text" id="max-salary" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label for="job-skills" class="block text-sm font-medium text-gray-700 mb-1">مهارت‌های مورد نیاز</label>
                                <input type="text" id="job-skills" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <p class="text-xs text-gray-500 mt-1">مهارت‌ها را با کاما از هم جدا کنید (مثال: React, JavaScript, HTML)</p>
                            </div>
                            <div>
                                <label for="job-deadline" class="block text-sm font-medium text-gray-700 mb-1">مهلت ارسال رزومه</label>
                                <input type="date" id="job-deadline" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
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
        </section>

        <!-- Admin Dashboard -->
        <section id="admin" class="mb-12 hidden">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Sidebar -->
                <div class="w-full md:w-64 bg-white rounded-lg shadow-md p-4 h-fit">
                    <div class="mb-6">
                        <div class="flex items-center space-x-3 space-x-reverse mb-4">
                            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <p class="font-medium">مدیر سیستم</p>
                                <p class="text-xs text-gray-500">سطح دسترسی: مدیرکل</p>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 pt-4">
                            <p class="text-xs text-gray-500">آخرین ورود: امروز ۱۴:۳۰</p>
                        </div>
                    </div>

                    <nav class="space-y-1">
                        <a href="#admin-jobs" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium rounded-md bg-indigo-50 text-indigo-700">
                            <i class="fas fa-briefcase ml-2"></i>
                            آگهی‌های استخدام
                        </a>
                        <a href="#admin-applications" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                            <i class="fas fa-file-alt ml-2"></i>
                            رزومه‌های دریافتی
                        </a>
                        <a href="#admin-interviews" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                            <i class="fas fa-comments ml-2"></i>
                            مصاحبه‌ها
                        </a>
                        <a href="#admin-reports" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                            <i class="fas fa-chart-bar ml-2"></i>
                            گزارشات
                        </a>
                        <a href="#admin-settings" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-50">
                            <i class="fas fa-cog ml-2"></i>
                            تنظیمات
                        </a>
                    </nav>
                </div>

                <!-- Main Content -->
                <div class="flex-1">
                    <!-- Admin Jobs -->
                    <div id="admin-jobs" class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex justify-between items-center">
                                <h2 class="text-xl font-bold text-gray-800">آگهی‌های استخدام</h2>
                                <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 flex items-center">
                                    <i class="fas fa-plus ml-2"></i>
                                    آگهی جدید
                                </button>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">عنوان شغلی</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">دسته‌بندی</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">تعداد متقاضیان</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">وضعیت</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">تاریخ انتشار</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">عملیات</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">توسعه‌دهنده فرانت‌اند</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-indigo-100 text-indigo-800 rounded-full text-xs">توسعه نرم‌افزار</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">۲۴</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">فعال</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">۱۴۰۲/۰۵/۱۲</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900 ml-3">ویرایش</a>
                                            <a href="#" class="text-red-600 hover:text-red-900">حذف</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">کارشناس منابع انسانی</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">منابع انسانی</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">۱۸</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">فعال</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">۱۴۰۲/۰۵/۰۵</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900 ml-3">ویرایش</a>
                                            <a href="#" class="text-red-600 hover:text-red-900">حذف</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">حسابدار ارشد</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">مالی و حسابداری</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">۱۲</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">در انتظار تایید</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">۱۴۰۲/۰۴/۲۸</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900 ml-3">ویرایش</a>
                                            <a href="#" class="text-red-600 hover:text-red-900">حذف</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="bg-gray-50 px-6 py-3 flex items-center justify-between border-t border-gray-200">
                            <div class="flex-1 flex justify-between sm:hidden">
                                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> قبلی </a>
                                <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> بعدی </a>
                            </div>
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700">
                                        نمایش
                                        <span class="font-medium">۱</span>
                                        تا
                                        <span class="font-medium">۳</span>
                                        از
                                        <span class="font-medium">۳</span>
                                        نتیجه
                                    </p>
                                </div>
                                <div>
                                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                            <span class="sr-only">قبلی</span>
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                        <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 1 </a>
                                        <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 2 </a>
                                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                            <span class="sr-only">بعدی</span>
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Applications for a Job -->
                    <div id="admin-applications" class="bg-white rounded-lg shadow-md overflow-hidden mt-6 hidden">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800">رزومه‌های دریافتی</h2>
                                    <p class="text-sm text-gray-600 mt-1">برای موقعیت شغلی: توسعه‌دهنده فرانت‌اند</p>
                                </div>
                                <div class="flex space-x-3 space-x-reverse">
                                    <button class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 flex items-center">
                                        <i class="fas fa-download ml-2"></i>
                                        خروجی Excel
                                    </button>
                                    <button class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 flex items-center">
                                        <i class="fas fa-filter ml-2"></i>
                                        فیلترها
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">نام متقاضی</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">مهارت‌ها</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">حقوق درخواستی</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">امتیاز فنی</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">امتیاز HR</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">وضعیت</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">عملیات</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="mr-4">
                                                    <div class="text-sm font-medium text-gray-900">محمد رضایی</div>
                                                    <div class="text-sm text-gray-500">mohammad.rezaei@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-wrap gap-1">
                                                <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">React</span>
                                                <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">JavaScript</span>
                                                <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">HTML/CSS</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">۱۸ میلیون تومان</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-16 bg-gray-200 rounded-full h-2">
                                                    <div class="bg-green-600 h-2 rounded-full" style="width: 80%"></div>
                                                </div>
                                                <span class="text-sm text-gray-500 mr-2">۸/۱۰</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-16 bg-gray-200 rounded-full h-2">
                                                    <div class="bg-blue-600 h-2 rounded-full" style="width: 70%"></div>
                                                </div>
                                                <span class="text-sm text-gray-500 mr-2">۷/۱۰</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">در حال بررسی</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900 ml-3">مشاهده</a>
                                            <a href="#" class="text-green-600 hover:text-green-900 ml-3">مصاحبه</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="mr-4">
                                                    <div class="text-sm font-medium text-gray-900">فاطمه محمدی</div>
                                                    <div class="text-sm text-gray-500">fatemeh.mohammadi@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-wrap gap-1">
                                                <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">React</span>
                                                <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">TypeScript</span>
                                                <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">Redux</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">۲۰ میلیون تومان</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-16 bg-gray-200 rounded-full h-2">
                                                    <div class="bg-green-600 h-2 rounded-full" style="width: 90%"></div>
                                                </div>
                                                <span class="text-sm text-gray-500 mr-2">۹/۱۰</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-16 bg-gray-200 rounded-full h-2">
                                                    <div class="bg-blue-600 h-2 rounded-full" style="width: 85%"></div>
                                                </div>
                                                <span class="text-sm text-gray-500 mr-2">۸.۵/۱۰</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">تایید شده</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900 ml-3">مشاهده</a>
                                            <a href="#" class="text-green-600 hover:text-green-900 ml-3">مصاحبه</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="mr-4">
                                                    <div class="text-sm font-medium text-gray-900">علی حسینی</div>
                                                    <div class="text-sm text-gray-500">ali.hosseini@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-wrap gap-1">
                                                <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">Angular</span>
                                                <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">JavaScript</span>
                                                <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">UI/UX</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">۱۶ میلیون تومان</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-16 bg-gray-200 rounded-full h-2">
                                                    <div class="bg-green-600 h-2 rounded-full" style="width: 60%"></div>
                                                </div>
                                                <span class="text-sm text-gray-500 mr-2">۶/۱۰</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-16 bg-gray-200 rounded-full h-2">
                                                    <div class="bg-blue-600 h-2 rounded-full" style="width: 50%"></div>
                                                </div>
                                                <span class="text-sm text-gray-500 mr-2">۵/۱۰</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">رد شده</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900 ml-3">مشاهده</a>
                                            <a href="#" class="text-gray-400 ml-3 cursor-not-allowed">مصاحبه</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Application Detail -->
                    <div id="admin-application-detail" class="bg-white rounded-lg shadow-md overflow-hidden mt-6 hidden">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800">جزئیات رزومه</h2>
                                    <p class="text-sm text-gray-600 mt-1">برای موقعیت شغلی: توسعه‌دهنده فرانت‌اند</p>
                                </div>
                                <button class="text-gray-500 hover:text-gray-700" id="back-to-applications">
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="md:col-span-2">
                                    <div class="bg-gray-50 p-4 rounded-lg mb-6">
                                        <h3 class="text-lg font-bold text-gray-800 mb-3">اطلاعات شخصی</h3>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <p class="text-sm text-gray-500">نام کامل</p>
                                                <p class="text-gray-800 font-medium">محمد رضایی</p>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-500">ایمیل</p>
                                                <p class="text-gray-800 font-medium">mohammad.rezaei@example.com</p>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-500">شماره تماس</p>
                                                <p class="text-gray-800 font-medium">۰۹۱۲۱۲۳۴۵۶۷</p>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-500">محل سکونت</p>
                                                <p class="text-gray-800 font-medium">تهران</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 p-4 rounded-lg mb-6">
                                        <h3 class="text-lg font-bold text-gray-800 mb-3">سوابق شغلی</h3>
                                        <div class="space-y-4">
                                            <div class="border-l-2 border-indigo-500 pl-4">
                                                <p class="text-gray-800 font-medium">توسعه‌دهنده فرانت‌اند</p>
                                                <p class="text-sm text-gray-600">شرکت نرم‌افزاری آوا | ۱۴۰۰ - حال حاضر</p>
                                                <p class="text-sm text-gray-700 mt-1">توسعه رابط کاربری با React.js و Redux برای محصولات شرکت. همکاری با تیم طراحی برای بهبود تجربه کاربری.</p>
                                            </div>
                                            <div class="border-l-2 border-indigo-500 pl-4">
                                                <p class="text-gray-800 font-medium">توسعه‌دهنده وب</p>
                                                <p class="text-sm text-gray-600">شرکت طراحی وب آرمان | ۱۳۹۸ - ۱۴۰۰</p>
                                                <p class="text-sm text-gray-700 mt-1">پیاده‌سازی وبسایت‌های شرکتی با استفاده از HTML, CSS, JavaScript و jQuery.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <h3 class="text-lg font-bold text-gray-800 mb-3">تحصیلات</h3>
                                        <div class="border-l-2 border-indigo-500 pl-4">
                                            <p class="text-gray-800 font-medium">کارشناسی ارشد مهندسی نرم‌افزار</p>
                                            <p class="text-sm text-gray-600">دانشگاه تهران | ۱۳۹۶ - ۱۳۹۸</p>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="bg-gray-50 p-4 rounded-lg mb-6">
                                        <h3 class="text-lg font-bold text-gray-800 mb-3">مهارت‌ها</h3>
                                        <div class="flex flex-wrap gap-2">
                                            <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">React.js</span>
                                            <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">JavaScript</span>
                                            <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">HTML5</span>
                                            <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">CSS3</span>
                                            <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">Redux</span>
                                            <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">Git</span>
                                            <span class="px-2 py-1 bg-gray-200 text-gray-700 rounded-full text-xs">Responsive Design</span>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 p-4 rounded-lg mb-6">
                                        <h3 class="text-lg font-bold text-gray-800 mb-3">ارزیابی‌ها</h3>
                                        <div class="space-y-4">
                                            <div>
                                                <p class="text-sm text-gray-500 mb-1">امتیاز فنی (توسط مهندس احمدی)</p>
                                                <div class="flex items-center">
                                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                                        <div class="bg-green-600 h-2 rounded-full" style="width: 80%"></div>
                                                    </div>
                                                    <span class="text-sm text-gray-500 mr-2">۸/۱۰</span>
                                                </div>
                                                <p class="text-xs text-gray-500 mt-1">تسلط خوب به React و مفاهیم پیشرفته JavaScript</p>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-500 mb-1">امتیاز HR (توسط خانم محمدی)</p>
                                                <div class="flex items-center">
                                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                                        <div class="bg-blue-600 h-2 rounded-full" style="width: 70%"></div>
                                                    </div>
                                                    <span class="text-sm text-gray-500 mr-2">۷/۱۰</span>
                                                </div>
                                                <p class="text-xs text-gray-500 mt-1">توانایی ارتباطی خوب و انگیزه بالا</p>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-500 mb-1">امتیاز مدیر محصول (توسط آقای رضایی)</p>
                                                <div class="flex items-center">
                                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                                        <div class="bg-purple-600 h-2 rounded-full" style="width: 75%"></div>
                                                    </div>
                                                    <span class="text-sm text-gray-500 mr-2">۷.۵/۱۰</span>
                                                </div>
                                                <p class="text-xs text-gray-500 mt-1">درک خوب از نیازهای کاربر و کسب‌وکار</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <h3 class="text-lg font-bold text-gray-800 mb-3">عملیات</h3>
                                        <div class="space-y-3">
                                            <button class="w-full px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 flex items-center justify-center">
                                                <i class="fas fa-download ml-2"></i>
                                                دانلود رزومه
                                            </button>
                                            <button class="w-full px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 flex items-center justify-center">
                                                <i class="fas fa-check ml-2"></i>
                                                تایید نهایی
                                            </button>
                                            <button class="w-full px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 flex items-center justify-center">
                                                <i class="fas fa-times ml-2"></i>
                                                رد درخواست
                                            </button>
                                            <button class="w-full px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 flex items-center justify-center">
                                                <i class="fas fa-comment ml-2"></i>
                                                ثبت نظر
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Interview Scheduling -->
                    <div id="admin-interview-schedule" class="bg-white rounded-lg shadow-md overflow-hidden mt-6 hidden">
                        <div class="p-6 border-b border-gray-200">
                            <h2 class="text-xl font-bold text-gray-800">برنامه‌ریزی مصاحبه</h2>
                            <p class="text-sm text-gray-600 mt-1">برای متقاضی: محمد رضایی | موقعیت شغلی: توسعه‌دهنده فرانت‌اند</p>
                        </div>

                        <div class="p-6">
                            <form>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="interview-type" class="block text-sm font-medium text-gray-700 mb-1">نوع مصاحبه</label>
                                        <select id="interview-type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option value="">انتخاب کنید</option>
                                            <option value="technical">فنی</option>
                                            <option value="hr">منابع انسانی</option>
                                            <option value="managerial">مدیریتی</option>
                                            <option value="final">نهایی</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="interview-date" class="block text-sm font-medium text-gray-700 mb-1">تاریخ مصاحبه</label>
                                        <input type="date" id="interview-date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    </div>
                                    <div>
                                        <label for="interview-time" class="block text-sm font-medium text-gray-700 mb-1">ساعت مصاحبه</label>
                                        <input type="time" id="interview-time" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    </div>
                                    <div>
                                        <label for="interview-method" class="block text-sm font-medium text-gray-700 mb-1">روش مصاحبه</label>
                                        <select id="interview-method" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option value="">انتخاب کنید</option>
                                            <option value="in-person">حضوری</option>
                                            <option value="online">آنلاین</option>
                                            <option value="phone">تلفنی</option>
                                        </select>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="interviewers" class="block text-sm font-medium text-gray-700 mb-1">مصاحبه‌کنندگان</label>
                                        <select id="interviewers" multiple class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <option value="1">مهندس احمدی (فنی)</option>
                                            <option value="2">خانم محمدی (منابع انسانی)</option>
                                            <option value="3">آقای رضایی (مدیر محصول)</option>
                                            <option value="4">دکتر حسینی (مدیر فنی)</option>
                                        </select>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="interview-notes" class="block text-sm font-medium text-gray-700 mb-1">توضیحات / سوالات مصاحبه</label>
                                        <textarea id="interview-notes" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                                    </div>
                                </div>

                                <div class="mt-8 pt-5 border-t border-gray-200 flex justify-end">
                                    <button type="button" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100">
                                        انصراف
                                    </button>
                                    <button type="submit" class="mr-3 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                        ثبت مصاحبه
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
