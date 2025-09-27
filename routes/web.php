<?php

use App\Http\Controllers\JobPositionController;
use App\Http\Controllers\panel\DashboardController;
use App\Http\Controllers\panel\ResumeStorageController;
use Illuminate\Support\Facades\Route;

Route::controller(JobPositionController::class)->group(function () {
    Route::get('/', "show")->name("job-position.show");
    Route::get('/detail', "show_detail")->name("job-position.detail");
});

Route::prefix('panel')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', "show")->name('panel.dashboard');
    });

    Route::controller(\App\Http\Controllers\panel\JobPositionController::class)->group(function () {
        Route::get('/job-position/list', "index")->name('panel.job-position.index');
        Route::get('/job-position/create', "create")->name('panel.job-position.create');
        Route::post('/job-position/store', "store")->name('panel.job-position.store');
        Route::delete('/job-position/{jobPosition}', "destroy")->name('panel.job-position.destroy');
        Route::get('/job-position/{jobPosition}/resumes', "job_position_resumes")->name('panel.job-position.resumes');
        Route::get('/job-position/{jobPosition}/resume/{resumeStorage}', 'job_position_resume_detail')->name('panel.job-position.resume.detail');
        Route::post('/job-position/{jobPosition}/resume/{resumeStorage}/submit_score', 'submit_score')->name('panel.job-position.resume.submit_score');
    });

    Route::get('/applications', function () {
        $job_title = 'همه مشاغل';
        $applications = [
            [
                'id' => 1,
                'name' => 'محمد رضایی',
                'email' => 'mohammad.rezaei@example.com',
                'salary' => 180000000,
                'rank' => 7.5,
                'date' => '2023-08-06',
                'status' => 'در حال بررسی',
                'job_id' => 1,
                'job_title' => 'توسعه‌دهنده فرانت‌اند',
            ],
            [
                'id' => 2,
                'name' => 'فاطمه محمدی',
                'email' => 'fatemeh.mohammadi@example.com',
                'salary' => 200000000,
                'rank' => 8.5,
                'date' => '2023-08-01',
                'status' => 'تایید شده',
                'job_id' => 1,
                'job_title' => 'توسعه‌دهنده فرانت‌اند',
            ],
            [
                'id' => 3,
                'name' => 'علی حسینی',
                'email' => 'ali.hosseini@example.com',
                'salary' => 160000000,
                'rank' => 6.0,
                'date' => '2023-07-23',
                'status' => 'رد شده',
                'job_id' => 1,
                'job_title' => 'توسعه‌دهنده فرانت‌اند',
            ],
            [
                'id' => 4,
                'name' => 'سارا کریمی',
                'email' => 'sara.karimi@example.com',
                'salary' => 150000000,
                'rank' => 5.5,
                'date' => '2023-07-25',
                'status' => 'در حال بررسی',
                'job_id' => 2,
                'job_title' => 'کارشناس منابع انسانی',
            ],
        ];
        return view('admin.applications', compact('applications', 'job_title'));
    })->name('admin.applications.all');

    Route::get('/applications/{job_id}', function ($job_id) {
        $job_titles = [
            1 => 'توسعه‌دهنده فرانت‌اند',
            2 => 'کارشناس منابع انسانی',
            3 => 'حسابدار ارشد',
        ];
        $job_title = $job_titles[$job_id] ?? 'ناشناخته';
        $applications = [
            [
                'id' => 1,
                'name' => 'محمد رضایی',
                'email' => 'mohammad.rezaei@example.com',
                'salary' => 180000000,
                'rank' => 7.5,
                'date' => '2023-08-06',
                'status' => 'در حال بررسی',
                'job_id' => 1,
                'job_title' => 'توسعه‌دهنده فرانت‌اند',
            ],
            [
                'id' => 2,
                'name' => 'فاطمه محمدی',
                'email' => 'fatemeh.mohammadi@example.com',
                'salary' => 200000000,
                'rank' => 8.5,
                'date' => '2023-08-01',
                'status' => 'تایید شده',
                'job_id' => 1,
                'job_title' => 'توسعه‌دهنده فرانت‌اند',
            ],
            [
                'id' => 3,
                'name' => 'علی حسینی',
                'email' => 'ali.hosseini@example.com',
                'salary' => 160000000,
                'rank' => 6.0,
                'date' => '2023-07-23',
                'status' => 'رد شده',
                'job_id' => 1,
                'job_title' => 'توسعه‌دهنده فرانت‌اند',
            ],
            [
                'id' => 4,
                'name' => 'سارا کریمی',
                'email' => 'sara.karimi@example.com',
                'salary' => 150000000,
                'rank' => 5.5,
                'date' => '2023-07-25',
                'status' => 'در حال بررسی',
                'job_id' => 2,
                'job_title' => 'کارشناس منابع انسانی',
            ],
        ];
        $filtered_applications = array_filter($applications, fn($app) => $app['job_id'] == $job_id);
        return view('admin.applications', compact('filtered_applications', 'job_title', 'job_id'));
    })->name('admin.applications');

    Route::get('/application-review/{application_id}', function ($application_id) {
        $applicants = [
            1 => [
                'name' => 'محمد رضایی',
                'email' => 'mohammad.rezaei@example.com',
                'phone' => '09123456789',
                'salary' => 180000000,
                'cover_letter' => 'من یک توسعه‌دهنده با تجربه در React و JavaScript هستم و علاقه‌مند به همکاری با تیم شما.',
                'resume_pdf' => '/resumes/sample.pdf',
            ],
            2 => [
                'name' => 'فاطمه محمدی',
                'email' => 'fatemeh.mohammadi@example.com',
                'phone' => '09187654321',
                'salary' => 200000000,
                'cover_letter' => 'دارای مهارت‌های قوی در توسعه رابط کاربری و تجربه همکاری در پروژه‌های بزرگ.',
                'resume_pdf' => '/resumes/sample.pdf',
            ],
            3 => [
                'name' => 'علی حسینی',
                'email' => 'ali.hosseini@example.com',
                'phone' => '09111223344',
                'salary' => 160000000,
                'cover_letter' => 'علاقه‌مند به کار در محیط‌های پویا و یادگیری فناوری‌های جدید.',
                'resume_pdf' => '/resumes/sample.pdf',
            ],
            4 => [
                'name' => 'سارا کریمی',
                'email' => 'sara.karimi@example.com',
                'phone' => '09199887766',
                'salary' => 150000000,
                'cover_letter' => 'تجربه در مدیریت منابع انسانی و هماهنگی تیم‌ها.',
                'resume_pdf' => '/resumes/sample.pdf',
            ],
        ];
        $applicant = $applicants[$application_id] ?? [
            'name' => 'ناشناخته',
            'email' => 'unknown@example.com',
            'phone' => 'نامشخص',
            'salary' => 0,
            'cover_letter' => 'نامشخص',
            'resume_pdf' => '/resumes/sample.pdf',
        ];
        return view('admin.application-review', compact('applicant', 'application_id'));
    })->name('admin.application-review');

    Route::post('/application/review/store', function () {
        return redirect()->route('admin.applications.all')->with('success', 'نظر ثبت شد');
    })->name('admin.application.review.store');

    Route::get('/application-log/{application_id}', function ($application_id) {
        $applicants = [
            1 => 'محمد رضایی',
            2 => 'فاطمه محمدی',
            3 => 'علی حسینی',
            4 => 'سارا کریمی',
        ];
        $applicant_name = $applicants[$application_id] ?? 'ناشناخته';
        $logs = [
            [
                'reviewer' => 'مهندس احمدی',
                'score' => 8,
                'comments' => 'تسلط خوب به React\nاین توضیح چند خطی است\nخط سوم',
                'status' => 'تایید',
                'date' => '1404-08-07',
            ],
            [
                'reviewer' => 'خانم محمدی',
                'score' => 7,
                'comments' => 'انگیزه بالا\nتوضیحات اضافی\nو بیشتر',
                'status' => 'در حال بررسی',
                'date' => '1404-08-08',
            ],
            [
                'reviewer' => 'آقای رضایی',
                'score' => 9,
                'comments' => 'درک خوب از نیازهای کسب‌وکار',
                'status' => 'تایید',
                'date' => '1404-08-09',
            ],
        ];
        return response()->json(['logs' => $logs, 'applicant_name' => $applicant_name]);
    })->name('admin.application-log');

    Route::get('/ranked-applications', function () {
        $ranked_applications = [
            [
                'rank' => 1,
                'name' => 'فاطمه محمدی',
                'average_score' => 8.5,
                'salary' => 200000000,
                'application_id' => 2,
            ],
            [
                'rank' => 2,
                'name' => 'محمد رضایی',
                'average_score' => 7.5,
                'salary' => 180000000,
                'application_id' => 1,
            ],
            [
                'rank' => 3,
                'name' => 'علی حسینی',
                'average_score' => 6.0,
                'salary' => 160000000,
                'application_id' => 3,
            ],
            [
                'rank' => 4,
                'name' => 'سارا کریمی',
                'average_score' => 5.5,
                'salary' => 150000000,
                'application_id' => 4,
            ],
        ];
        return view('admin.ranked-applications', compact('ranked_applications'));
    })->name('admin.ranked-applications');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');

    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');

    Route::post('/settings/update', function () {
        return redirect()->route('admin.settings')->with('success', 'تنظیمات ذخیره شد');
    })->name('admin.settings.update');

    Route::post('/logout', function () {
        return redirect()->route('login')->with('success', 'با موفقیت خارج شدید');
    })->name('admin.logout');
});



Route::get('/job-detail', function () {
    return view('job-detail');
});


Route::get('/post-job', function () {
    return view('post-job');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/post-job', function () {
        return view('admin.post-job');
    })->name('admin.post-job');

    Route::post('/job/store', function () {
        return redirect()->route('admin.jobs')->with('success', 'آگهی ثبت شد');
    })->name('admin.job.store');

    Route::get('/jobs', function () {
        $jobs = [
            ['id' => 1, 'title' => 'توسعه‌دهنده فرانت‌اند', 'category' => 'توسعه نرم‌افزار', 'applicants' => 24, 'status' => 'فعال', 'date' => '2023-07-04'],
            ['id' => 2, 'title' => 'کارشناس منابع انسانی', 'category' => 'منابع انسانی', 'applicants' => 18, 'status' => 'فعال', 'date' => '2023-07-28'],
            ['id' => 3, 'title' => 'حسابدار ارشد', 'category' => 'مالی و حسابداری', 'applicants' => 12, 'status' => 'در انتظار تایید', 'date' => '2023-06-20'],
        ];
        return view('admin.jobs', compact('jobs'));
    })->name('admin.jobs');

    Route::get('/applications', function () {
        $job_title = 'همه مشاغل';
        $applications = [
            [
                'id' => 1,
                'name' => 'محمد رضایی',
                'email' => 'mohammad.rezaei@example.com',
                'salary' => 180000000,
                'rank' => 7.5,
                'date' => '2023-08-06',
                'status' => 'در حال بررسی',
                'job_id' => 1,
                'job_title' => 'توسعه‌دهنده فرانت‌اند',
            ],
            [
                'id' => 2,
                'name' => 'فاطمه محمدی',
                'email' => 'fatemeh.mohammadi@example.com',
                'salary' => 200000000,
                'rank' => 8.5,
                'date' => '2023-08-01',
                'status' => 'تایید شده',
                'job_id' => 1,
                'job_title' => 'توسعه‌دهنده فرانت‌اند',
            ],
            [
                'id' => 3,
                'name' => 'علی حسینی',
                'email' => 'ali.hosseini@example.com',
                'salary' => 160000000,
                'rank' => 6.0,
                'date' => '2023-07-23',
                'status' => 'رد شده',
                'job_id' => 1,
                'job_title' => 'توسعه‌دهنده فرانت‌اند',
            ],
            [
                'id' => 4,
                'name' => 'سارا کریمی',
                'email' => 'sara.karimi@example.com',
                'salary' => 150000000,
                'rank' => 5.5,
                'date' => '2023-07-25',
                'status' => 'در حال بررسی',
                'job_id' => 2,
                'job_title' => 'کارشناس منابع انسانی',
            ],
        ];
        return view('admin.applications', compact('applications', 'job_title'));
    })->name('admin.applications.all');

    Route::get('/applications/{job_id}', function ($job_id) {
        $job_titles = [
            1 => 'توسعه‌دهنده فرانت‌اند',
            2 => 'کارشناس منابع انسانی',
            3 => 'حسابدار ارشد',
        ];
        $job_title = $job_titles[$job_id] ?? 'ناشناخته';
        $applications = [
            [
                'id' => 1,
                'name' => 'محمد رضایی',
                'email' => 'mohammad.rezaei@example.com',
                'salary' => 180000000,
                'rank' => 7.5,
                'date' => '2023-08-06',
                'status' => 'در حال بررسی',
                'job_id' => 1,
                'job_title' => 'توسعه‌دهنده فرانت‌اند',
            ],
            [
                'id' => 2,
                'name' => 'فاطمه محمدی',
                'email' => 'fatemeh.mohammadi@example.com',
                'salary' => 200000000,
                'rank' => 8.5,
                'date' => '2023-08-01',
                'status' => 'تایید شده',
                'job_id' => 1,
                'job_title' => 'توسعه‌دهنده فرانت‌اند',
            ],
            [
                'id' => 3,
                'name' => 'علی حسینی',
                'email' => 'ali.hosseini@example.com',
                'salary' => 160000000,
                'rank' => 6.0,
                'date' => '2023-07-23',
                'status' => 'رد شده',
                'job_id' => 1,
                'job_title' => 'توسعه‌دهنده فرانت‌اند',
            ],
            [
                'id' => 4,
                'name' => 'سارا کریمی',
                'email' => 'sara.karimi@example.com',
                'salary' => 150000000,
                'rank' => 5.5,
                'date' => '2023-07-25',
                'status' => 'در حال بررسی',
                'job_id' => 2,
                'job_title' => 'کارشناس منابع انسانی',
            ],
        ];
        $filtered_applications = array_filter($applications, fn($app) => $app['job_id'] == $job_id);
        return view('admin.applications', compact('filtered_applications', 'job_title', 'job_id'));
    })->name('admin.applications');

    Route::get('/application-review/{application_id}', function ($application_id) {
        $applicants = [
            1 => [
                'name' => 'محمد رضایی',
                'email' => 'mohammad.rezaei@example.com',
                'phone' => '09123456789',
                'salary' => 180000000,
                'cover_letter' => 'من یک توسعه‌دهنده با تجربه در React و JavaScript هستم و علاقه‌مند به همکاری با تیم شما.',
                'resume_pdf' => '/resumes/sample.pdf',
            ],
            2 => [
                'name' => 'فاطمه محمدی',
                'email' => 'fatemeh.mohammadi@example.com',
                'phone' => '09187654321',
                'salary' => 200000000,
                'cover_letter' => 'دارای مهارت‌های قوی در توسعه رابط کاربری و تجربه همکاری در پروژه‌های بزرگ.',
                'resume_pdf' => '/resumes/sample.pdf',
            ],
            3 => [
                'name' => 'علی حسینی',
                'email' => 'ali.hosseini@example.com',
                'phone' => '09111223344',
                'salary' => 160000000,
                'cover_letter' => 'علاقه‌مند به کار در محیط‌های پویا و یادگیری فناوری‌های جدید.',
                'resume_pdf' => '/resumes/sample.pdf',
            ],
            4 => [
                'name' => 'سارا کریمی',
                'email' => 'sara.karimi@example.com',
                'phone' => '09199887766',
                'salary' => 150000000,
                'cover_letter' => 'تجربه در مدیریت منابع انسانی و هماهنگی تیم‌ها.',
                'resume_pdf' => '/resumes/sample.pdf',
            ],
        ];
        $applicant = $applicants[$application_id] ?? [
            'name' => 'ناشناخته',
            'email' => 'unknown@example.com',
            'phone' => 'نامشخص',
            'salary' => 0,
            'cover_letter' => 'نامشخص',
            'resume_pdf' => '/resumes/sample.pdf',
        ];
        return view('admin.application-review', compact('applicant', 'application_id'));
    })->name('admin.application-review');

    Route::post('/application/review/store', function () {
        return redirect()->route('admin.applications.all')->with('success', 'نظر ثبت شد');
    })->name('admin.application.review.store');

    Route::get('/application-log/{application_id}', function ($application_id) {
        $applicants = [
            1 => 'محمد رضایی',
            2 => 'فاطمه محمدی',
            3 => 'علی حسینی',
            4 => 'سارا کریمی',
        ];
        $applicant_name = $applicants[$application_id] ?? 'ناشناخته';
        $logs = [
            [
                'reviewer' => 'مهندس احمدی',
                'score' => 8,
                'comments' => 'تسلط خوب به React\nاین توضیح چند خطی است\nخط سوم',
                'status' => 'تایید',
                'date' => '1404-08-07',
            ],
            [
                'reviewer' => 'خانم محمدی',
                'score' => 7,
                'comments' => 'انگیزه بالا\nتوضیحات اضافی\nو بیشتر',
                'status' => 'در حال بررسی',
                'date' => '1404-08-08',
            ],
            [
                'reviewer' => 'آقای رضایی',
                'score' => 9,
                'comments' => 'درک خوب از نیازهای کسب‌وکار',
                'status' => 'تایید',
                'date' => '1404-08-09',
            ],
        ];
        return response()->json(['logs' => $logs, 'applicant_name' => $applicant_name]);
    })->name('admin.application-log');

    Route::get('/ranked-applications', function () {
        $ranked_applications = [
            [
                'rank' => 1,
                'name' => 'فاطمه محمدی',
                'average_score' => 8.5,
                'salary' => 200000000,
                'application_id' => 2,
            ],
            [
                'rank' => 2,
                'name' => 'محمد رضایی',
                'average_score' => 7.5,
                'salary' => 180000000,
                'application_id' => 1,
            ],
            [
                'rank' => 3,
                'name' => 'علی حسینی',
                'average_score' => 6.0,
                'salary' => 160000000,
                'application_id' => 3,
            ],
            [
                'rank' => 4,
                'name' => 'سارا کریمی',
                'average_score' => 5.5,
                'salary' => 150000000,
                'application_id' => 4,
            ],
        ];
        return view('admin.ranked-applications', compact('ranked_applications'));
    })->name('admin.ranked-applications');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');

    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');

    Route::post('/settings/update', function () {
        return redirect()->route('admin.settings')->with('success', 'تنظیمات ذخیره شد');
    })->name('admin.settings.update');

    Route::post('/logout', function () {
        return redirect()->route('login')->with('success', 'با موفقیت خارج شدید');
    })->name('admin.logout');
});
