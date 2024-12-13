@php
    use App\Models\UserStatus;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Pengguna') }}
        </h2>
    </x-slot>
        
    <div class="py-12">
        <x-message-handler/>

        <div class="max-w-7xl mx-auto p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full dark:text-gray-100">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nama Pengguna</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>   
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->username }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2 text-center {{ $user->getStatusColor() }}">
                                    {{ $user->getStatusLabel() }}
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    @if ( $user->isNotAdminVerified())
                                        <form method="POST" action="{{ route('admin.users.update', [$user->id]) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input name="status_id" type="hidden" value="{{ UserStatus::ACTIVE }}">
                                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Verifikasi
                                            </button>
                                        </form>
                                    @elseif ($user->isInactive())
                                        <button disabled class="bg-gray-700 text-gray-300 font-bold py-2 px-4 rounded">
                                            Verifikasi
                                        </button>
                                    @else
                                        <button disabled class="bg-green-700 text-green-300 font-bold py-2 px-4 rounded">
                                            Verifikasi
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>
            <br/>
            {{ $users->links() }}   
        </div>  
    </div>
</x-app-layout>
