@php
    use App\Models\AnnouncementStatus;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Setel Pengumuman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-message-handler/>

        <form id="announcement-destroy" action="{{ route('admin.announcements.destroy', [$announcement->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('delete')
        </form>
        <form id="announcement-update" action="{{ route('admin.announcements.update', [$announcement->id]) }}" method="POST" enctype="multipart/form-data" class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">
            @csrf
            @method('put')
            <div class="flex flex-row gap-6 ">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg basis-1/2">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-preset">
                                {{ __('Informasi Pengumuman') }}
                            </h2>

                            <p class="subtext-preset">
                                {{ __("Isi informasi dasar sekitar pengumuman") }}
                            </p>
                        </header>

                        <div class="mt-6 space-y-6">    
                            <div>
                                <x-input-label for="title" :value="__('Judul')" />
                                <x-text-input value="{{ $announcement->title }}" id="title" name="title" type="text" class="mt-1 block w-full" required autofocus autocomplete="title" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <div>
                                <x-input-label for="summary" :value="__('Ringkasan Informasi')" />
                                <x-text-area-input rows="3" id="summary" name="summary" class="mt-1 block w-full" >
                                    {{ $announcement->summary }}
                                </x-text-area-input>    
                                <x-input-error class="mt-2" :messages="$errors->get('summary')" />
                            </div>

                            <div>
                                <x-input-label for="released_at" :value="__('Tanggal Penerbitan')" />
                                <x-date-picker value="{{ $announcement->getPublicationDate() }}" id="released_at" name="released_at" class="mt-1 block w-full" />
                                <x-input-error class="mt-2" :messages="$errors->get('released_at')" />
                            </div>

                            <div>
                                <x-input-label for="status_id" :value="__('Status')" />
                                <x-combo-box id="status_id" name="status_id" class="mt-1 block w-full text-center {{ $announcement->getStatusColor() }}">
                                    @if($announcement->status_id === AnnouncementStatus::INACTIVE)
                                        <option selected value="{{  AnnouncementStatus::INACTIVE }}">{{ AnnouncementStatus::getStatusLabel( AnnouncementStatus::INACTIVE) }}</option>
                                    @endif
                                    @foreach ([AnnouncementStatus::DRAFT, AnnouncementStatus::ACTIVE] as $item)
                                        <option {{ $announcement->status_id === $item ? 'selected' : '' }} value="{{ $item }}">{{ AnnouncementStatus::getStatusLabel($item) }}</option>
                                    @endforeach
                                </x-combo-box>
                                <x-input-error class="mt-2" :messages="$errors->get('status_id')" />
                            </div>

                            <br/>
                            <br/>

                            <div class="grid grid-cols-2 gap-6">
                                <button form="announcement-update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Simpan Perubahan
                                </button>
                                <button form="announcement-destroy" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Hapus Pengumuman
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg basis-1/2">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-preset">
                                {{ __('Isi Pengumuman') }}
                            </h2>

                            <p class="subtext-preset">
                                {{ __("Isi dari pengumuman") }}
                            </p>
                        </header>

                        <div class="mt-6 space-y-6">   
                            <div>
                                <x-text-area-input rows="20" id="body" name="body" class="mt-1 block w-full" >
                                    {{ $announcement->body }}
                                </x-text-area-input>    
                                <x-input-error class="mt-2" :messages="$errors->get('body')" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
