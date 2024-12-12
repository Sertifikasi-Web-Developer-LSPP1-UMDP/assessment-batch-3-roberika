<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pendaftaran Mahasiswa Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data" class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">
                @csrf
                <input class="hidden" id="id" name="id" type="text" value="{{ Auth::user()->id }}">
                <div class="flex flex-row gap-6 ">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg basis-1/2">
                        <div class="max-w-xl">
                            <header>
                                <h2 class="text-preset">
                                    {{ __('Identitas Calon Mahasiswa') }}
                                </h2>

                                <p class="subtext-preset">
                                    {{ __("Isi identitas calon mahasiswa yang akan mendaftar") }}
                                </p>
                            </header>

                            <div class="mt-6 space-y-6">    
                                <div>
                                    <x-input-label for="name" :value="__('Nama Lengkap')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>

                                <div>
                                    <x-input-label for="gender" :value="__('Jenis Kelamin')" />
                                    <x-combo-box id="gender" name="gender" class="mt-1 block w-full" required autocomplete="gender">
                                        <option disabled selected>. . .</option>
                                        @foreach (['Laki-laki', 'Perempuan'] as $item)
                                            <option>{{ $item }}</option>
                                        @endforeach
                                    </x-combo-box>
                                    <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                                </div>
                                
                                <div>
                                    <x-input-label for="birthplace" :value="__('Tempat Lahir')" />
                                    <x-text-input id="birthplace" name="birthplace" type="text" class="mt-1 block w-full" required autofocus autocomplete="birthplace" />
                                    <x-input-error class="mt-2" :messages="$errors->get('birthplace')" />
                                </div>
                                
                                <div>
                                    <x-input-label for="birthdate" :value="__('Tanggal Lahir')" />
                                    <x-date-picker id="birthdate" name="birthdate" class="mt-1 block w-full" required autofocus autocomplete="birthdate" />
                                    <x-input-error class="mt-2" :messages="$errors->get('birthdate')" />
                                </div>
                                
                                <div>
                                    <x-input-label for="religion" :value="__('Agama')" />
                                    <x-combo-box id="religion" name="religion" class="mt-1 block w-full" required autocomplete="religion">
                                        <option disabled selected>. . .</option>
                                        @foreach (['Buddha', 'Kristen', 'Katolik', 'Islam', 'Konghucu', 'Hindu'] as $item)
                                            <option>{{ $item }}</option>
                                        @endforeach
                                    </x-combo-box>
                                    <x-input-error class="mt-2" :messages="$errors->get('religion')" />
                                </div>

                                <div>
                                    <x-input-label for="citizenship" :value="__('Kewarganegaraan')" />
                                    <x-text-input id="citizenship" name="citizenship" type="text" class="mt-1 block w-full" required autofocus autocomplete="citizenship" />
                                    <x-input-error class="mt-2" :messages="$errors->get('citizenship')" />
                                </div>

                                <div>
                                    <x-input-label for="address" :value="__('Alamat')" />
                                    <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" required autofocus autocomplete="address" />
                                    <x-input-error class="mt-2" :messages="$errors->get('address')" />
                                </div>

                                <div>
                                    <x-input-label for="phone_number" :value="__('Nomor Telepon')" />
                                    <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" required autofocus autocomplete="phone_number" />
                                    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                                </div>  
                                
                                <div>
                                    <x-input-label for="guardian_phone_number" :value="__('Kontak Wali')" />
                                    <x-text-input id="guardian_phone_number" name="guardian_phone_number" type="text" class="mt-1 block w-full" required autofocus autocomplete="guardian_phone_number" />
                                    <x-input-error class="mt-2" :messages="$errors->get('guardian_phone_number')" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg basis-1/2">
                        <div class="max-w-xl">
                            <header>
                                <h2 class="text-preset">
                                    {{ __('Tujuan Akademik') }}
                                </h2>

                                <p class="subtext-preset">
                                    {{ __("Pendidikan asal dan jurusan yang ingin dituju calon mahasiswa") }}
                                </p>
                            </header>

                            <div class="mt-6 space-y-6">   
                                <div>
                                    <x-input-label for="school" :value="__('Sekolah Asal')" />
                                    <x-text-input id="school" name="school" type="text" class="mt-1 block w-full" required autofocus autocomplete="school" />
                                    <x-input-error class="mt-2" :messages="$errors->get('school')" />
                                </div>

                                <div>
                                    <x-input-label for="school_path" :value="__('Jurusan Sekolah')" />
                                    <x-text-input id="school_path" name="school_path" type="text" class="mt-1 block w-full" required autofocus autocomplete="school_path" />
                                    <x-input-error class="mt-2" :messages="$errors->get('school_path')" />
                                </div>
                                
                                <div>
                                    <x-input-label for="major" :value="__('Pilihan Program Studi')" />
                                    <x-text-input id="major" name="major" type="text" class="mt-1 block w-full" required autofocus autocomplete="major" />
                                    <x-input-error class="mt-2" :messages="$errors->get('major')" />
                                </div>

                                <div>
                                    <x-input-label for="reason" :value="__('Alasan Memilih Universitas')" />
                                    <x-text-input id="reason" name="reason" type="text" class="mt-1 block w-full" required autofocus autocomplete="reason" />
                                    <x-input-error class="mt-2" :messages="$errors->get('reason')" />
                                </div>

                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Daftar') }}</x-primary-button>

                                    @if (session('status') === 'profile-updated')
                                        <p
                                            x-data="{ show: true }"
                                            x-show="show"
                                            x-transition
                                            x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm subtext-preset"
                                        >{{ __('Saved.') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
