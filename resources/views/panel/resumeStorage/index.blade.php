@extends('layouts.app')

@section('title', 'رزومه‌های دریافتی')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row gap-6">
            @include('components.admin-sidebar', ['active' => 'applications'])
            <div class="flex-1">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-bold text-gray-800">رزومه‌های دریافتی برای آگهی: <span id="job-title">{{ $jobPosition->title }}</span></h2>
                        </div>
                        <div class="mt-4 flex flex-col sm:flex-row sm:space-x-4 sm:space-x-reverse">
                            @if (empty($jobPosition))
                                <div class="mb-4 sm:mb-0 sm:w-1/2">
                                    <label for="filter-job" class="block text-sm font-medium text-gray-700 mb-1">فیلتر بر اساس آگهی</label>
                                    <select id="filter-job" class="block w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-700 hover:bg-gray-50 transition duration-200 appearance-none text-right pr-10" style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22%23666666%22 stroke-width=%222%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22%3e%3cpolyline points=%226 9 12 15 18 9%22%3e%3c/polyline%3e%3c/svg%3e'); background-position: left 0.5rem center; background-repeat: no-repeat; background-size: 1.5em;">
                                        <option value="">همه آگهی‌ها</option>
                                        @foreach($jobPositions as $job)
                                            <option value="{{ $job->id }}">{{ __($job->title) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="sm:w-1/2">
                                <label for="sort-by" class="block text-sm font-medium text-gray-700 mb-1">مرتب‌سازی بر اساس</label>
                                <select id="sort-by" class="block w-full px-4 py-2.5 bg-white border border-gray-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-700 hover:bg-gray-50 transition duration-200 appearance-none text-right pr-10" style="background-image: url('data:image/svg+xml;charset=UTF-8,%3csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22%23666666%22 stroke-width=%222%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22%3e%3cpolyline points=%226 9 12 15 18 9%22%3e%3c/polyline%3e%3c/svg%3e'); background-position: left 0.5rem center; background-repeat: no-repeat; background-size: 1.5em;">
                                    <option value="name-asc">نام (صعودی)</option>
                                    <option value="name-desc">نام (نزولی)</option>
                                    <option value="name-asc">نام خانوادگی(صعودی)</option>
                                    <option value="name-desc">نام خانوادگی(نزولی)</option>
                                    <option value="salary-asc">حقوق (صعودی)</option>
                                    <option value="salary-desc">حقوق (نزولی)</option>
                                    <option value="rank-asc">رتبه (صعودی)</option>
                                    <option value="rank-desc">رتبه (نزولی)</option>
                                    <option value="date-asc">تاریخ (صعودی)</option>
                                    <option value="date-desc">تاریخ (نزولی)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table id="applications-table" class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">نام متقاضی</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">نام خانوادگی متقاضی</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">ایمیل</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">حقوق پیشنهادی</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">رتبه میانگین</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">تاریخ ارسال</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">وضعیت</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">عملیات</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($resumes as $resume)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $resume->first_name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $resume->last_name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $resume->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ number_format($resume->job_position->price) . " تومان" }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ number_format($resume->scores->avg('score') ?? 0, 1) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ \Morilog\Jalali\Jalalian::fromDateTime($resume->created_at)->format('Y/m/d') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 {{ $resume->status->name == 'Accepted' ? 'bg-green-100 text-green-800' : ($resume->status->name == 'Rejected' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800') }} rounded-full text-xs">{{ __($resume->status->name) }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route("panel.job-position.resume.detail", [$jobPosition->id, $resume->id]) }}" class="text-indigo-600 hover:text-indigo-900 ml-3">بررسی</a>
                                        <button onclick="openLogModal({{ $resume->id }})" class="text-green-600 hover:text-green-800 ml-3">لاگ</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Log -->
    <div id="log-modal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-md w-3/4 max-w-4xl">
            <h2 id="log-modal-title" class="text-xl font-bold text-gray-800 mb-4">لاگ بررسی رزومه</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">کارشناس</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">امتیاز</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">توضیحات</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">وضعیت</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">تاریخ</th>
                    </tr>
                    </thead>
                    <tbody id="log-table-body" class="bg-white divide-y divide-gray-200">
                    <!-- Logs will be loaded here -->
                    </tbody>
                </table>
            </div>
            <div class="mt-4 flex justify-end">
                <button onclick="closeLogModal()" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">بستن</button>
            </div>
        </div>
    </div>

    <script>
        function openLogModal(applicationId) {
            fetch(`/admin/application-log/${applicationId}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('log-table-body');
                    tableBody.innerHTML = '';
                    document.getElementById('log-modal-title').textContent = `لاگ بررسی رزومه: ${data.applicant_name}`;
                    data.logs.forEach(log => {
                        const row = `
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${log.reviewer}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${log.score}</td>
                            <td class="px-6 py-4 text-sm text-gray-700 whitespace-pre-wrap">${log.comments}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="px-2 py-1 ${log.status === 'تایید' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'} rounded-full text-xs">${log.status}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${log.date}</td>
                        </tr>
                    `;
                        tableBody.innerHTML += row;
                    });
                    document.getElementById('log-modal').classList.remove('hidden');
                })
                .catch(error => console.error('Error fetching logs:', error));
        }

        function closeLogModal() {
            document.getElementById('log-modal').classList.add('hidden');
        }

        document.getElementById('sort-by').addEventListener('change', function() {
            const sortValue = this.value;
            const table = document.getElementById('applications-table');
            const rows = Array.from(table.tBodies[0].rows);

            rows.sort((a, b) => {
                let aVal, bVal;
                if (sortValue === 'name-asc' || sortValue === 'name-desc') {
                    aVal = a.dataset.name;
                    bVal = b.dataset.name;
                    return sortValue === 'name-asc' ? aVal.localeCompare(bVal, 'fa') : bVal.localeCompare(aVal, 'fa');
                } else if (sortValue === 'salary-asc' || sortValue === 'salary-desc') {
                    aVal = parseInt(a.dataset.salary);
                    bVal = parseInt(b.dataset.salary);
                } else if (sortValue === 'rank-asc' || sortValue === 'rank-desc') {
                    aVal = parseFloat(a.dataset.rank);
                    bVal = parseFloat(b.dataset.rank);
                } else if (sortValue === 'date-asc' || sortValue === 'date-desc') {
                    aVal = new Date(a.dataset.date).getTime();
                    bVal = new Date(b.dataset.date).getTime();
                }

                if (isNaN(aVal) || isNaN(bVal)) {
                    return 0; // Fallback to prevent errors
                }

                return sortValue.endsWith('-asc') ? aVal - bVal : bVal - aVal;
            });

            rows.forEach(row => table.tBodies[0].appendChild(row));
        });

        document.getElementById('filter-job')?.addEventListener('change', function() {
            const selectedJobId = this.value;
            const jobTitles = {
                '': 'همه مشاغل',
                '1': 'توسعه‌دهنده فرانت‌اند',
                '2': 'کارشناس منابع انسانی',
                '3': 'حسابدار ارشد'
            };
            document.getElementById('job-title').textContent = jobTitles[selectedJobId] || 'ناشناخته';
            const rows = document.querySelectorAll('#applications-table tbody tr');
            rows.forEach(row => {
                if (selectedJobId === '' || row.dataset.jobId === selectedJobId) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
