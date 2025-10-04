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
                            <p class="text-3xl font-bold text-indigo-600">{{ $job_positions->count() }}</p>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg text-center">
                            <h3 class="text-lg font-semibold text-gray-800">رزومه‌های دریافتی</h3>
                            <p class="text-3xl font-bold text-green-600">{{ $resumes->count() }}</p>
                        </div>
                        <div class="bg-yellow-50 p-4 rounded-lg text-center">
                            <h3 class="text-lg font-semibold text-gray-800">کاربران فعال</h3>
                            <p class="text-3xl font-bold text-yellow-600">{{ $users->count() }}</p>
                        </div>
                    </div>
                </div>

                {{-- بخش پیام status Fortify --}}
                {{--@if (session('status'))
                    <div class="bg-blue-50 p-4 mb-4 rounded text-blue-700">
                        {{ session('status') }}
                    </div>
                @endif--}}

                {{-- فرم خروج --}}
                {{--<form method="POST" action="{{ route('logout') }}" class="mb-6">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                        {{ __('Logout') }}
                    </button>
                </form>--}}

                {{-- فرم‌های Fortify: پروفایل، رمز، دو مرحله‌ای --}}
                {{--<div class="space-y-6">
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updateProfileInformation()))
                        @include('profile.update-profile-information-form')
                    @endif

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        @include('profile.update-password-form')
                    @endif

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
                        @include('profile.two-factor-authentication-form')
                    @endif
                </div>--}}
            </div>
        </div>
    </div>
@endsection
