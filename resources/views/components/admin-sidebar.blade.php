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
        <a href="{{ route('panel.dashboard') }}" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium rounded-md {{ $active == 'dashboard' ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
            <i class="fas fa-tachometer-alt ml-2"></i>
            داشبورد
        </a>
        <a href="{{ route('panel.job-position.create') }}" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium rounded-md {{ $active == 'post-job' ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
            <i class="fas fa-plus ml-2"></i>
            ثبت آگهی جدید
        </a>
        <a href="{{ route('panel.job-position.index') }}" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium rounded-md {{ $active == 'jobs' ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
            <i class="fas fa-briefcase ml-2"></i>
            مدیریت آگهی‌ها
        </a>
        <a href="{{ route('panel.user.index') }}" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium rounded-md {{ $active == 'users' ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
            <i class="fas fa-users ml-2"></i>
            کاربران
        </a>
        <a href="{{ route('admin.settings') }}" class="sidebar-item flex items-center px-3 py-2 text-sm font-medium rounded-md {{ $active == 'settings' ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
            <i class="fas fa-cog ml-2"></i>
            تنظیمات
        </a>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit"
                    class="sidebar-item flex items-center px-3 py-2 text-sm font-medium rounded-md
            {{ $active == 'logout' ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                <i class="fas fa-sign-out-alt ml-2"></i>
                خروج
            </button>
        </form>

    </nav>
</div>
