[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-22041afd0340ce965d47ae6ef1cefeee28c7c493a6346c4f15d667ab976d596c.svg)](https://classroom.github.com/a/UwpJJG2e)

## Installation

Tahap instalasi mengikuti tahap instalasi Laravel, yaitu:

1. Clone repositori dari Github:

    ```bash
    git clone https://github.com/Sertifikasi-Web-Developer-LSPP1-UMDP/assessment-batch-3-roberika.git
    ```

2. Buka folder proyek:

    ```bash
    cd assessment-batch-3-roberika
    ```

3. Unduh dependencies dari proyek dengan Composer:

    ```bash
    composer install
    ```

4. Duplikat `.env.example` dan namakan dengan `.env`:

    ```bash
    cp .env.example .env
    ```

5. Generasi APP_KEY baru pada `.env`:

    ```bash
    php artisan key:generate
    ```

6. Konfigurasi hubungan ke database pada `.env` (bebas selama dapat tersambung):

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=[your_database]
    DB_USERNAME=[your_username]
    DB_PASSWORD=[your_password]
    ```

7. Jalankan migrasi dan seeding database:

    ```bash
    php artisan migrate
    php artisan db:seed --class=InitialSeeder
    ```

8. Jalankan server development:

    ```bash
    php artisan serve
    ```

9. Aplikasi dapat diakses pada `http://localhost:8000`.

## Project Specification

Proyek Laravel ini dilaksanakan sebagai pemenuhan sertifikasi Lembaga Sertifikasi Profesi bidang Pengembang Web. Proyek dilaksanakan berdasarkan spesifikasi yang telah ditentukan oleh lembaga sertifikasi pada dokumen FR.IA.04A. Berikut dilampirkan diagram use case dari proyek.

![Diagram Use Case](https://github.com/roberika/dataset/blob/main/usecasediagram.png?raw=true)

Aplikasi menggunakan MySQL Community Version sebagai basis data. Berikut skema basis data yang digunakan.

![Diagram Relasi Database](https://github.com/roberika/dataset/blob/main/eerdiagram%20terbaru.png?raw=true)

Aplikasi dapat digunakan oleh calon mahasiswa untuk:

- Mendaftarkan akun pengguna baru bagi calon mahasiswa
- Mendaftarkan calon mahasiswa baru
- Melihat status pendaftaran calon mahasiswa baru pada akun pengguna
- Melihat informasi dan pengumuman yang dipublikasi oleh admin pada aplikasi

Aplikasi dapat digunakan oleh admin untuk:

- Memverifikasi akun pengguna yang telah mendaftarkan akun
- Mengelola status pendaftaran calon mahasiswa
- Mengelola informasi dan pengumuman yang ditampilkan ke pengguna

## Routes

Rute akses aplikasi dapat dibagi menjadi 3 kategori untuk otentikasi dan otoritasi, untuk penggunaan oleh calon mahasiswa, dan untuk penggunaan oleh admin. Rute terkait pengaturan akun terdapat pada `routes/auth.php`. Rute terkait penggunaan terdapat pada `routes/web.php` dengan rute tanpa awalan (`/dashboard`, `/application`, dan sebagainya) digunakan untuk penggunaan oleh calon mahasiswa dan rute yang diawali oleh `admin/` untuk penggunaan oleh admin. Berikut penjelasan bagi rute-rute tersebut:

- `GET \register`: Halaman registrasi akun
- `POST \register`: Daftarkan akun pengguna
- `GET \login`: Halaman login pengguna
- `POST \login`: Melakukan login akun
- `POST \logout`: Melakukan logout akun

- `GET /welcome`: Halaman awal
- `GET /profile`: Halaman profile pengguna
- `PATCH /profile`: Update akun pengguna
- `DELETE /profile`: Nonaktifkan akun pengguna

- `GET /dashboard`: Dashboard calon mahasiswa
- `GET /application`: Halaman pendaftaran calon mahasiswa
- `post /application`: Menyimpan data calon mahasiswa

- `GET /admin/dashboard`: Dashboard admin
- `GET /admin/users`: Daftar akun pengguna
- `PUT /admin/users/{id}`: Verifikasi akun pengguna

- `GET /admin/applicants`: Daftar calon mahasiswa
- `PUT /admin/applicants/{id}`: Ubah status pendaftaran calon mahasiswa

- `GET /admin/announcements`: Daftar penngumuman
- `GET /admin/announcements/create`: Halaman membuat pengumuman baru
- `POST /admin/announcements/`: Simpan pengumuman baru
- `PUT /admin/announcements/{id}`: Simpan perubahan pada pengumuman
- `DELETE /admin/announcements/{id}`: Nonaktifkan pengumuman

## Dependencies

Ketergantungan utama pada proyek ini adalah pada beberapa pustaka ini:

- PHP v8
- Laravel v11
- Vite v6
- Laravel Breeze v11
- Tailwind v3

Spesifikasi versi lengkap ada pada [composer.json](https://github.com/Sertifikasi-Web-Developer-LSPP1-UMDP/assessment-batch-3-roberika/blob/main/composer.json) dan pada [package.json](https://github.com/Sertifikasi-Web-Developer-LSPP1-UMDP/assessment-batch-3-roberika/blob/main/package.json).

## Screenshots

Berikut adalah beberapa tangkapan layar aplikasi untuk menunjukkan tampilan dari aplikasi:

`/`
![Halaman Welcome](https://github.com/roberika/dataset/blob/main/IMG-20241213-WA0005.jpg?raw=true)

`/login`
![Halaman Login](https://github.com/roberika/dataset/blob/main/IMG-20241213-WA0008.jpg?raw=true)

`/register`
![Halaman Register](https://github.com/roberika/dataset/blob/main/Screenshot 2024-12-14 104443.png?raw=true)

`/profile`
![Halaman Profile](https://github.com/roberika/dataset/blob/main/Screenshot 2024-12-14 104058.png?raw=true)

`/dashboard`
![Halaman Dashboard](https://github.com/roberika/dataset/blob/main/IMG-20241213-WA0004.jpg?raw=true)

`/application`
![Halaman Pendaftaran](https://github.com/roberika/dataset/blob/main/IMG-20241213-WA0010.jpg?raw=true)

`/admin/dashboard`
![Halaman Dashboard Admin](https://github.com/roberika/dataset/blob/main/IMG-20241213-WA0009.jpg?raw=true)

`/admin/users`
![Halaman Kelola Pengguna](https://github.com/roberika/dataset/blob/main/IMG-20241213-WA0003.jpg?raw=true)

`/admin/applicants`
![Halaman Kelola Pendaftaran](https://github.com/roberika/dataset/blob/main/IMG-20241213-WA0003.jpg?raw=true)

`/admin/announcements`
![Halaman Kelola Pengumuman](https://github.com/roberika/dataset/blob/main/IMG-20241213-WA0011.jpg?raw=true)

`/admin/announcements/create`
![Halaman Tambah Pengumuman](https://github.com/roberika/dataset/blob/main/IMG-20241213-WA0014.jpg?raw=true)

`/admin/announcements/{id}`
![Halaman Setel Pengumuman](https://github.com/roberika/dataset/blob/main/IMG-20241213-WA0015.jpg?raw=true)

## Presentation

Presentasi aplikasi terdapat pada [Google Presentation berikut](https://docs.google.com/presentation/d/1vGdwTSptRSKhjy13ElXtoGUnZb8RerWuR61G-xX9Cn8/edit?usp=sharing).
