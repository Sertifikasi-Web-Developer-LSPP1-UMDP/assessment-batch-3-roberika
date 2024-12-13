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
        <x-message-handler/>
        
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
                            {{ __("Pendaftaran dapat dilakukan melalui") }}
                            <a href="{{ route('application') }}" class="px-2 py-1 rounded-lg bg-slate-500">{{ __   ("Pendaftaran") }}</a>
                        </div>
                        <div class="text-3xl">
                            {{ __("Belum mendaftar") }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <br/>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-preset">
                {{  __("Pengumuman") }}
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($announcements as $announcement)
                <div id="{{ $announcement->id }}" class="hidden target:block p-6 text-preset bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" >   
                    <h3 class="text-xl font-semibold">{{ $announcement->title }}</h3>
                    <br/>
                    @if ($announcement->image_url)
                        <img src="{{ asset('img/announcements/' . $announcement->image_url) }}" alt="{{ $announcement->title }}" class="mt-4">
                        <br/>
                    @endif
                    <p class="text-gray-600">{{ $announcement->summary }}</p>
                    <br/>   
                    <p >{{ $announcement->body }}</p>
                </div>
            @endforeach
        </div>

        </br>

        <div class="grid grid-cols-2 col-span-2 gap-6 max-w-7xl mx-auto sm:px-6 lg:px-8">    
            @foreach ($announcements as $announcement)
                <a href="#{{ $announcement->id }}" class="p-6 text-preset bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">   
                    <h3 class="text-xl font-semibold">{{ $announcement->title }}</h3>
                    <br/>
                    @if ($announcement->image)
                        <img src="{{ asset('images/' . $announcement->image) }}" alt="Announcement Image" class="mt-4">
                        <br/>
                    @endif
                    <p class="text-gray-600">{{ $announcement->summary }}</p>
                </a>
            @endforeach
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <br/>
            
            {{ $announcements->links() }}
        </div>
    </div>
</x-app-layout>
