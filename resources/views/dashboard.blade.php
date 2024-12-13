@php
    use Illuminate\Support\Facades\Auth;
@endphp

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
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-preset">
                    {{ __("Selamat datang,") }}
                    @if (Auth::user()->applicant)
                        {{ Auth::user()->applicant->name }}
                    @else
                        {{ Auth::user()->username }}
                    @endif
                    {{ __("!") }}
                </div>
            </div>
        </div>

        
        @if (Auth::user()->applicant)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
                <div class="{{ Auth::user()->applicant->getStatusMessageColor() }} overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-preset">
                        <div>
                            {{ __("Status pendaftaran anda saat ini: ") }}
                        </div>
                        <div class="text-3xl {{ Auth::user()->applicant->getStatusColor() }}">
                            {{ Auth::user()->applicant->getStatusMessage()}}
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-preset">
                        <div>
                            {{ __("Status pendaftaran anda saat ini: ") }}
                        </div>
                        <div class="text-3xl">
                            {{ __("Belum mendaftar") }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
