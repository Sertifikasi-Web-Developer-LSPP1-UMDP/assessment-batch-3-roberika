<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('message'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-preset">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @elseif (session('error'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-preset">
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        @endif
        
        <div class="flex flex-col gap-6">
            <div class="flex flex-row gap-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg basis-1/2">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-preset">
                                {{ __('Selamat datang, Admin') }}
                            </h2>
                        </header>
                    </div>
                </div>
                
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg basis-1/2">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-preset">
                                {{ __('Daftar Pengguna') }}
                            </h2>
                        </header>

                        <div>
                            @foreach ($users as $user)
                                {{ $user->username }}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-row gap-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg basis-1/2">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-preset">
                                {{ __('Daftar Pengumuman') }}
                            </h2>
                        </header>

                        <div>
                            @foreach ($announcements as $announcement)
                                {{ $announcement->title }}
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg basis-1/2">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-preset">
                                {{ __('Daftar Calon Mahasiswa') }}
                            </h2>
                        </header>

                        <div>
                            @foreach ($applicants as $applicant)
                                {{ $applicant->name }}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
