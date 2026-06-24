# GO-Hotel - Sistem Reservasi Kamar Hotel Berbasis Laravel

---

## Deskripsi Aplikasi

GO-Hotel adalah aplikasi web berbasis Laravel yang digunakan untuk melakukan reservasi kamar hotel secara online.

Aplikasi ini dibuat untuk memudahkan proses pemesanan kamar dengan menyediakan dua jenis pengguna, yaitu **Admin** dan **User**.

Admin memiliki akses untuk mengelola data kamar seperti menambah, mengubah, menghapus data kamar, serta mengatur status kamar. User dapat melihat daftar kamar yang tersedia, melakukan reservasi, melihat riwayat pemesanan, dan membatalkan reservasi.

---

## Fitur Aplikasi

### Admin

* Login ke sistem
* Menambah data kamar
* Mengubah data kamar
* Menghapus data kamar
* Upload foto kamar
* Mengelola status kamar

### User

* Registrasi akun
* Login ke sistem
* Melihat daftar kamar
* Melakukan reservasi
* Melihat riwayat reservasi
* Membatalkan reservasi

---

## Teknologi yang Digunakan

* Laravel
* PHP
* MySQL
* Laravel Breeze
* Blade
* Tailwind CSS
* Vite
* Alpine.js

---

## Struktur Modul

### 1. Modul Autentikasi

Mengelola proses login dan autentikasi pengguna.

Fitur:

* Register
* Login
* Logout
* Edit profil

### 2. Modul Manajemen Kamar

Digunakan admin untuk mengelola data kamar.

Fitur:

* Menampilkan daftar kamar
* Menambah kamar
* Mengubah kamar
* Menghapus kamar
* Upload foto

### 3. Modul Reservasi Kamar

Digunakan user untuk melakukan pemesanan.

Fitur:

* Melihat kamar tersedia
* Reservasi kamar
* Menentukan tanggal check-in dan check-out
* Perubahan status kamar otomatis

### 4. Modul Riwayat Reservasi

Digunakan untuk menampilkan riwayat transaksi pengguna.

Fitur:

* Menampilkan riwayat reservasi
* Membatalkan reservasi

### 5. Modul Database

Digunakan untuk menyimpan seluruh data aplikasi.

---

## Instalasi

Clone repository:

```bash
git clone https://github.com/RaisaNabila12/UAS-PBW--GO-HOTEL.git
```

Masuk ke folder project:

```bash
cd hotel-reservation
```

Install dependency:

```bash
composer install
npm install
```

Copy file environment:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Import database `.sql`

Jalankan migration:

```bash
php artisan migrate
```

Jalankan aplikasi:

```bash
php artisan serve
npm run dev
```

Buka browser:

```text
http://127.0.0.1:8000
```

---

## Struktur Project

```text
app/
├── Http/
│   └── Controllers/
│       ├── BookingController.php
│       ├── ProfileController.php
│       └── Admin/
│           └── RoomController.php

├── Models/
│   ├── User.php
│   ├── Room.php
│   └── Booking.php

database/
├── migrations/

resources/
├── views/

routes/
├── web.php

storage/
└── app/public/rooms
```

---

## Database

Database menggunakan **MySQL**.

Tabel utama yang digunakan:

### users

Menyimpan data akun pengguna.

### rooms

Menyimpan data kamar hotel.

### bookings

Menyimpan data transaksi reservasi.

Relasi:

* User → memiliki banyak booking
* Room → memiliki banyak booking
* Booking → dimiliki oleh satu user dan satu room

---

## Pengembang

Nama: *Raisa Nabila*
NPM : 2408107010037
Program Studi: Informatika
Mata Kuliah: Pemrograman Berbasis Web
