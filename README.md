# 🏥 Sistem Antrian Klinik Sejahtera

Sistem Antrian Klinik Sejahtera adalah aplikasi berbasis **Laravel** yang digunakan untuk mengelola proses antrian dan janji temu pasien pada sebuah klinik. Aplikasi ini mendukung **multi-role (Admin & User/Pasien)**, pengelolaan poli dan dokter, pembuatan janji temu, serta manajemen antrian secara terstruktur.

Project ini dikembangkan sebagai **Proyek Ujian Akhir Semester (UAS)** dan dirancang dengan struktur yang rapi, aman, serta mudah dijalankan.

---

## 👨‍💻 Developer

Muhammad Rizqi Firdaus (2402310196)
Aditya Dwi Putra Anugraha (2402310180)
Arief Yusril (2402310194)
Moh. Faiqul Kamil (2402310198)

Sistem Antrian Klinik Sejahtera © 2026

---

## 📌 Fitur Utama

### 👤 User (Pasien)

* Registrasi & Login
* Melihat dashboard user
* Membuat janji temu dengan dokter
* Memilih dokter berdasarkan poli
* Mengisi tanggal temu & keluhan
* Melihat riwayat antrian
* Membatalkan antrian (selama status WAITING)

### 🛠 Admin

* Login admin
* Dashboard admin
* CRUD Poli
* CRUD Dokter (relasi Poli → Dokter)
* Manajemen antrian pasien
* Memanggil antrian dokter

### 🔐 Keamanan & Teknis

* Authentication & Authorization (Gate & Policy)
* Validasi Form Request
* Relasi Eloquent ORM
* Feature Test (PHPUnit)

---

## ⚙️ Teknologi yang Digunakan

* **Laravel 10** (Framework PHP)
* **PHP 8.1.10**
* **MySQL / MariaDB**
* **Bootstrap 5**
* **Blade Template Engine**

---

## 📂 Struktur Role

| Role  | Akses                                            |
| ----- | ------------------------------------------------ |
| Admin | Dashboard Admin, Poli, Dokter, Manajemen Antrian |
| User  | Dashboard User, Buat Janji Temu, Riwayat Antrian |

---

## 🚀 Cara Instalasi

### 1️⃣ Clone Repository

```bash
git clone https://github.com/username/sistem-antrian-klinik.git
cd sistem-antrian-klinik
```

### 2️⃣ Install Dependency

```bash
composer install
```

### 3️⃣ Copy File Environment

```bash
cp .env.example .env
```

### 4️⃣ Konfigurasi Database

Edit file **.env** sesuai konfigurasi lokal:

```env
APP_NAME="Sistem Antrian Klinik"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=klinik_mini
DB_USERNAME=root
DB_PASSWORD=
```

### 5️⃣ Generate App Key

```bash
php artisan key:generate
```

### 6️⃣ Migrasi & Seeder Database

```bash
php artisan migrate --seed
```

### 7️⃣ Jalankan Server

```bash
php artisan serve
```

Akses aplikasi di browser:

```
http://127.0.0.1:8000
```

---

## 👥 Akun Demo

### 🔑 Admin

* **Email:** [admin@klinik.test](mailto:admin@klinik.test)
* **Password:** password123

### 👤 User (Pasien)

* **Email:** [user@klinik.test](mailto:user@klinik.test)
* **Password:** password123

> Akun demo dibuat melalui **database seeder**.

---

## 🧪 Testing

Project ini memiliki minimal **1 Feature Test** untuk memastikan aturan bisnis berjalan dengan benar.

Menjalankan test:

```bash
php artisan test
```

---

## 📄 Catatan Tambahan

* Fitur reset password menggunakan fitur pencocokan email
* Sistem role menggunakan Gate Authorization
* UI dibuat sederhana dan fokus pada fungsionalitas

---

## ✅ Status Project

✔ Siap dijalankan
✔ Struktur rapi & terdokumentasi

---

Terima kasih 🙌
