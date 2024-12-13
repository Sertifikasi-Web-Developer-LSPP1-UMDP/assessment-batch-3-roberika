@php
    use App\Models\ApplicantStatus;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Calon Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-message-handler/>

        <div class="max-w-7xl mx-auto p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full dark:text-gray-100">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Nama Calon Mahasiswa</th>
                            <th class="px-4 py-2">Nomor Telepon</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Ubah Status</th>
                        </tr>   
                    </thead>
                    <tbody>
                        @foreach ($applicants as $applicant)
                            <tr>
                                <td class="border px-4 py-2">{{ $applicant->name }}</td>
                                <td class="border px-4 py-2">{{ $applicant->phone_number }}</td>
                                <td class="border px-4 py-2 text-center font-bold {{ $applicant->getStatusColor() }}">
                                    {{ $applicant->getStatusLabel() }}
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    <form method="POST" action="{{ route('admin.applicants.update', [$applicant->id]) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')  
                                        <x-combo-box id="status_id" name="status_id" class="mt-1 block w-full text-center" onchange="this.form.submit()">
                                            <option disabled selected>{{ $applicant->getStatusLabel() }}</option>
                                            @foreach (ApplicantStatus::STATUSES as $item)
                                                <option value="{{ $item }}">{{ ApplicantStatus::getStatusLabel($item) }}</option>
                                            @endforeach
                                        </x-combo-box>
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