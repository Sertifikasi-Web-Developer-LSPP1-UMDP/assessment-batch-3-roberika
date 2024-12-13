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
        

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mx-10">
            <div class="overflow-x-auto">
                <table class="min-w-full dark:text-gray-100">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nama Calon Mahasiswa</th>
                            <th class="px-4 py-2">Nomor Telepon</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>   
                    </thead>
                    <tbody>
                        @foreach ($applicants as $applicant)
                            <tr>
                                <td class="border px-4 py-2">{{ $applicant->name }}</td>
                                <td class="border px-4 py-2">{{ $applicant->phone_number }}</td>
                                <td class="border px-4 py-2 text-center {{ $applicant->getStatusColor() }}">
                                    {{ $applicant->getStatusLabel() }}
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    <form method="POST" action="{{ route('admin.applicants.update', [$applicant->id]) }}" enctype="multipart/form-data">
                                        @csrf
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Verifikasi
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>
            <br/>
            {{ $applicants->links() }}   
        </div>  
    </div>
</x-app-layout>