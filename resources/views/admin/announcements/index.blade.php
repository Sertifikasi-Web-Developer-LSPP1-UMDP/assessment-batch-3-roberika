@php
    use App\Models\AnnouncementStatus;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex flex-row">
            <div class="grow">
                {{ __('Daftar Pengumuman') }}
            </div>
            <div>
                <form method="GET" action="{{ route('admin.announcements.create') }}">
                    @csrf
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-2 rounded text-base">
                        {{ __('Tambah Pengumuman Baru') }}
                    </button>
                </form>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <x-message-handler/> 

        <div class="max-w-7xl mx-auto p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full dark:text-gray-100">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Judul</th>
                            <th class="px-4 py-2">Tanggal Rilis</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>   
                    </thead>
                    <tbody>
                        @foreach ($announcements as $announcement)
                            <tr>
                                <td class="border px-4 py-2">{{ $announcement->title }}</td>
                                <td class="border px-4 py-2">{{ $announcement->released_at }}</td>  
                                <td class="border px-4 py-2 text-center font-bold {{ $announcement->getStatusColor() }}">
                                    {{ $announcement->getStatusLabel() }}
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    <form method="GET" action="{{ route('admin.announcements.edit', [$announcement->id]) }}">
                                        @csrf
                                        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                            Detail
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>
            <br/>
            {{ $announcements->links() }}   
        </div>  
    </div>
</x-app-layout>