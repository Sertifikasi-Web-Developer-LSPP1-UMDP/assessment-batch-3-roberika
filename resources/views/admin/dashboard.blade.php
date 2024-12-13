<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-message-handler/>
        
        <div class="flex flex-col gap-6 items-center">
            <div class="flex flex-row gap-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-preset">
                                {{ __('Selamat datang, Admin') }}
                            </h2>
                        </header>
                    </div>
                </div>
                
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex-grow">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-preset">
                                {{ __('Daftar Pengumuman') }}
                            </h2>
                        </header>

                        <div class="mt-6">
                            <div class="overflow-x-auto">
                                <table class="min-w-full dark:text-gray-100">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2">Judul</th>
                                            <th class="px-4 py-2">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($announcements as $announcement)
                                            <tr>
                                                <td class="border px-4 py-2">{{ $announcement->title }}</td>
                                                <td class="border px-4 py-2">{{ $announcement->getStatusLabel() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>

            <div class="flex flex-row gap-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-preset">
                                {{ __('Daftar Pengguna') }}
                            </h2>
                        </header>

                        <div class="mt-6">
                            <div class="overflow-x-auto">
                                <table class="min-w-full dark:text-gray-100">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2">Nama Pengguna</th>
                                            <th class="px-4 py-2">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="border px-4 py-2">{{ $user->username }}</td>
                                                <td class="border px-4 py-2">{{ $user->getStatusLabel() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                    </div>
                </div>
                
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-preset">
                                {{ __('Daftar Calon Mahasiswa') }}
                            </h2>
                        </header>

                        <div class="mt-6">
                            <div class="overflow-x-auto">
                                <table class="min-w-full dark:text-gray-100">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2">Nama Calon Mahasiswa</th>
                                            <th class="px-4 py-2">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($applicants as $applicant)
                                            <tr>
                                                <td class="border px-4 py-2">{{ $applicant->name }}</td>
                                                <td class="border px-4 py-2">{{ $applicant->getStatusLabel() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
