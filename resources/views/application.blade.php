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
                                    <x-combo-box id="school_path" name="school_path" class="mt-1 block w-full" required autocomplete="school_path">
                                        <option disabled selected>. . .</option>
                                        @foreach (['IPA', 'IPS', 'SMK Non-teknik', 'SMK Teknik'] as $item)
                                            <option>{{ $item }}</option>
                                        @endforeach
                                    </x-combo-box>
                                    <x-input-error class="mt-2" :messages="$errors->get('school_path')" />
                                </div>
                                
                                <div>
                                    <x-input-label for="major" :value="__('Pilihan Program Studi')" />
                                    <x-combo-box id="school_path" name="school_path" class="mt-1 block w-full" required autocomplete="school_path">
                                        <option disabled selected>. . .</option>
                                        {{-- @foreach (['Matematika', 'Fisika', 'Biologi', 'Kimia', 'Statistika', 'Aktuaria', 'Meteorologi', 'Astronomi', 'Geofisika', 'Geologi', 'Ilmu Kedokteran', 'Pendidikan Dokter', 'Kedokteran Gigi', 'Kedokteran Hewan', 'Gizi', 'Ilmu Keperawatan', 'Apoteker', 'Kebidanan', 'Kesehatan Lingkungan', 'Keselamatan dan Kesehatan Kerja', 'Kesehatan Masyarakat', 'Farmasi/Ilmu Farmasi', 'Teknik Elektro', 'Teknik Sipil', 'Teknik Listrik', 'Teknik Bangunan', 'Teknik Biomedis', 'Teknik Geodesi', 'Teknik Geologi', 'Teknik Kimia', 'Pendidikan Teknologi Agroindustri', 'Teknik Lingkungan', 'Teknik Mesin', 'Teknik Perkapalan', 'Teknik Nuklir', 'Rekayasa Keselamatan Kebakaran', 'Teknik Kimia', 'Teknologi Bioproses', 'Teknik Informatika', 'Teknik Industri', 'Teknik Biomedis', 'Teknik Pertambangan', 'Teknik Perminyakan', 'Teknik Material', 'Teknik Geodesi dan Geomatika', 'Teknik Dirgantara/Penerbangan', 'Teknik Metalurgi', 'Ilmu Komputer', 'Teknologi Informasi', 'Sistem Informasi', 'Teknik Komputer', 'Arsitektur', 'Perencanaan Wilayah dan Kota', 'Teknik Pengairan', 'Arsitektur Interior', 'Kehutanan', 'Agronomi', 'Akuakultur', 'Teknik Pertanian', 'Teknologi Pangan', 'Teknologi Industri Pertanian', 'Pertanian dan Agribisnis', 'Agribisnis', 'Peternakan', 'Ilmu Kelautan', 'Ilmu Perikanan/Teknologi Perikanan', 'Agrobisnis Perikanan', 'Bioteknologi', 'Agriekoteknologi', 'Ilmu Keolahragaan', 'Hubungan Internasional', 'Ilmu Politik', 'Ilmu Pemerintahan', 'Kriminologi', 'Sosiologi', 'Ilmu Administrasi Negara', 'Ilmu Administrasi Niaga', 'Ilmu Administrasi Fiskal', 'Administrasi Bisnis/Tata Niaga', 'Administrasi Publik', 'Administrasi Pemerintahan', 'Antropologi Sosial/Antropologi Budaya', 'Arkeologi', 'Sejarah', 'Ilmu Komunikasi', 'Ilmu Perpustakaan', 'Kearsipan Digital', 'Jurnalistik', 'Hubungan Masyarakat', 'Tv dan Film', 'Manajemen Komunikasi', 'Bahasa dan Kebudayaan Korea', 'Bahasa dan Budaya Tiongkok', 'Sastra Belanda', 'Sastra Cina', 'Sastra Indonesia', 'Sastra Jawa/Sunda/Daerah', 'Sastra Jepang', 'Sastra Jerman', 'Sastra Inggris', 'Sastra Prancis', 'Sastra Rusia/Slavia', 'Sastra Arab', 'Sejarah dan Kebudayaan Islam', 'Ilmu Filsafat', 'Ilmu Ekonomi', 'Ekonomi Pembangunan', 'Hubungan Masyarakat', 'Manajemen', 'Manajemen Bisnis', 'Akuntansi', 'Ilmu Ekonomi Islam', 'Bisnis Islam', 'Bisnis Digital', 'Bisnis Internasional', 'Keuangan dan Perbankan', 'Kewirausahaan', 'Ilmu Hukum', 'Psikologi', 'Geografi', 'Ilmu Kesejahteraan Sosial', 'Studi Agama', 'Peradilan Agama', 'Politik Islam', 'Teologi', 'Pariwisata', 'Perhotelan', 'Teknologi Pendidikan', 'Administrasi Pendidikan', 'Manajemen Pendidikan', 'Psikologi Pendidikan dan Bimbingan', 'Pendidikan Masyarakat', 'Pendidikan Khusus', 'Bimbingan dan Konseling', 'Perpustakaan & Sains Informasi', 'Pendidikan Guru Sekolah Dasar (Pgsd)', 'Pendidikan Guru Anak Usia Dini (Paud)', 'Pendidikan Luar Sekolah (Pls)', 'Pendidikan Luar Biasa', 'Pendidikan Bahasa Indonesia', 'Pendidikan Bahasa Daerah', 'Pendidikan Bahasa Inggris', 'Pendidikan Bahasa Arab', 'Pendidikan Bahasa Jepang', 'Pendidikan Bahasa Jerman', 'Pendidikan Bahasa Prancis', 'Pendidikan Bahasa Korea', 'Pendidikan Pancasila dan Kewarganegaraan', 'Pendidikan Sejarah', 'Pendidikan Geografi', 'Pendidikan Sosiologi', 'Pendidikan Ips', 'Pendidikan Agama Islam', 'Manajemen Pemasaran Pariwisata', 'Pendidikan Matematika', 'Pendidikan Fisika', 'Pendidikan Biologi', 'Pendidikan Kimia', 'Pendidikan Ipa', 'Pendidikan Ilmu Komputer', 'Pendidikan Seni Rupa', 'Pendidikan Seni Tari', 'Pendidikan Seni Musik', 'Pendidikan Kepelatihan Olahraga', 'Pendidikan Jasmani, Kesehatan, dan Rekreasi', 'Pendidikan Teknik Otomotif', 'Seni Rupa Murni', 'Seni Kriya', 'Seni Tari', 'Seni Musik', 'Desain dan Komunikasi Visual', 'Desain Interior', 'Desain Produk', 'Tata Kelola Seni', 'Film dan Televisi', 'Film dan Animasi', 'Musik', 'Tata Rias', 'Tata Busana', 'Tata Boga', 'Sekretaris', 'Administrasi Asuransi dan Aktuaria', 'Administrasi Keuangan dan Perbankan', 'Administrasi Perkantoran dan Sekretaris', 'Administrasi Perpajakan', 'Administrasi Bisnis', 'Fisioterapi', 'Hubungan Masyarakat', 'Manajemen Informasi dan Dokumentasi', 'Vokasional Pariwisata', 'Okupasi Terapi', 'Penyiaran Multimedia', 'Periklanan Kreatif', 'Akuntansi', 'Administrasi Perumahsakitan', 'Manajemen Perhotelan', 'Desain Grafis', 'Batik dan Fashion', 'Akuntansi Perpajakan', 'Akuntansi Sektor Publik', 'Bisnis Internasional', 'Pemasaran Digital'] as $item) --}}
                                        @foreach (['Bisnis', 'Ilmu Administrasi', 'Manajemen', 'Akutansi', 'Teknik Industri', 'Teknik Sipil', 'Ilmu Komunikasi', 'Sastra Inggris', 'Psikologi', 'Sistem Informasi', 'Teknik Informatika', 'Teknik Elektro', 'Ilmu Komputer', 'Manajemen Informatika', 'Pendidikan Bahasa Indonesia', 'Pendidikan Olahraga'] as $item)
                                            <option>{{ $item }}</option>
                                        @endforeach
                                    </x-combo-box>
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
