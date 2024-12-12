<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Calon Mahasiswa') }}
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
        
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg basis-1/2">
            <div class="max-w-xl">
                @foreach ($applicants as $applicant)
                    {{ $applicant->name }}
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>