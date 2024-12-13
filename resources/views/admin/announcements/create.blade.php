@php
    use App\Models\AnnouncementStatus;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Pengumuman Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-message-handler/>

        <form id="announcement-store" action="{{ route('admin.announcements.store') }}" method="POST" enctype="multipart/form-data" class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">
            @csrf
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
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus autocomplete="title" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <div>
                                <x-input-label for="summary" :value="__('Ringkasan Informasi')" />
                                <x-text-area-input rows="3" id="summary" name="summary" class="mt-1 block w-full" ></x-text-area-input>    
                                <x-input-error class="mt-2" :messages="$errors->get('summary')" />
                            </div>

                            <div>
                                <x-input-label for="released_at" :value="__('Tanggal Penerbitan')" />
                                <x-date-picker id="released_at" name="released_at" class="mt-1 block w-full" />
                                <x-input-error class="mt-2" :messages="$errors->get('released_at')" />
                            </div>

                            <div>
                                <x-input-label for="image" :value="__('Gambar')" />
                                <input type="file" name="image" id="image">
                                <x-input-error class="mt-2" :messages="$errors->get('image')" />
                            </div>

                            <div>
                                <x-input-label for="status_id" :value="__('Status')" />
                                <x-combo-box id="status_id" name="status_id" class="mt-1 block w-full text-center">
                                    <option disabled selected>{{ __('. . .') }}</option>
                                    @foreach ([AnnouncementStatus::DRAFT, AnnouncementStatus::ACTIVE] as $item)
                                        <option value="{{ $item }}">{{ AnnouncementStatus::getStatusLabel($item) }}</option>
                                    @endforeach
                                </x-combo-box>
                                <x-input-error class="mt-2" :messages="$errors->get('status_id')" />
                            </div>

                            <br/>
                            <br/>

                            <div class="grid grid-cols-2 gap-6">
                                <button form="announcement-store" class="bg-blue-500 hover:bg-blue-700 col-start-2 text-white font-bold py-2 px-4 rounded">
                                    Simpan Pengumuman
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
                                <x-text-area-input rows="20" id="body" name="body" class="mt-1 block w-full" ></x-text-area-input>    
                                <x-input-error class="mt-2" :messages="$errors->get('body')" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
