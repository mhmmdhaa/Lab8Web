# Aplikasi Data Barang

Aplikasi web sederhana berbasis PHP native dan MySQL untuk mengelola data barang. Aplikasi ini dibuat sebagai latihan operasi CRUD (*Create, Read, Update, Delete*) pada database.

## Fitur

- Menampilkan seluruh data barang.
- Menambahkan data barang baru.
- Mengubah data barang.
- Menghapus data barang.
- Mengunggah gambar barang.
- Menghapus file gambar saat data barang dihapus.

## Teknologi

- PHP
- MySQL/MariaDB
- Apache
- XAMPP
- HTML dan CSS

## Struktur File

| File | Keterangan |
| --- | --- |
| `index.php` | Menampilkan daftar data barang dari database. |
| `tambah.php` | Form dan proses penambahan data barang. |
| `ubah.php` | Form dan proses perubahan data barang. |
| `hapus.php` | Proses penghapusan data barang beserta file gambarnya. |
| `koneksi.php` | Konfigurasi koneksi ke database MySQL. |
| `gambar/` | Folder penyimpanan gambar barang yang diunggah. |

## Persyaratan

- XAMPP atau server lokal lain yang menyediakan Apache, PHP, dan MySQL.
- PHP dengan ekstensi `mysqli` aktif.

## Instalasi

1. Salin atau letakkan proyek di folder `htdocs` XAMPP:

   ```text
   C:\xampp\htdocs\lab8_php_database
   ```

2. Jalankan **Apache** dan **MySQL** melalui XAMPP Control Panel.

3. Buat database bernama `latihan1` melalui phpMyAdmin atau MySQL.  
   Dokumentasi: [Foto 1](/screenshoot/foto1.png)

4. Buat tabel `data_barang` menggunakan perintah SQL berikut.  
   Dokumentasi: [Foto 2](/screenshoot/foto2.png)

   ```sql
   USE latihan1;

   CREATE TABLE data_barang (
       id_barang INT AUTO_INCREMENT PRIMARY KEY,
       nama VARCHAR(100) NOT NULL,
       kategori VARCHAR(50) NOT NULL,
       harga_jual DECIMAL(15, 2) NOT NULL,
       harga_beli DECIMAL(15, 2) NOT NULL,
       stok INT NOT NULL,
       gambar VARCHAR(255) DEFAULT NULL
   );
   ```

5. Tambahkan data awal melalui phpMyAdmin dan terminal MariaDB.  
   Dokumentasi: [Foto 3](/screenshoot/foto3.png) dan [Foto 4](/screenshoot/foto4.png)

6. Pastikan folder `gambar` tersedia di dalam folder proyek dan direktori dapat diakses. Folder ini digunakan untuk menyimpan gambar yang diunggah.  
   Dokumentasi: [Foto 5](/screenshoot/foto5.png)

7. Periksa konfigurasi pada `koneksi.php` untuk memastikan koneksi database. Konfigurasi bawaan proyek adalah:

   ```php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db = "latihan1";
   ```

   Sesuaikan nilai tersebut jika konfigurasi MySQL pada komputer Anda berbeda.

   Dokumentasi: [Foto 6](/screenshoot/foto6.png)

8. Pastikan file `index.php` dapat menampilkan data (*Read*).  
   Dokumentasi: [Foto 7](/screenshoot/foto7.png)

9. Uji fitur aplikasi:
   - Tambahkan data barang melalui menu **Tambah Data**. Dokumentasi: [Foto 8](/screenshoot/foto8.png)
   - Ubah data barang melalui tautan **Ubah**. Dokumentasi: [Foto 9](/screenshoot/foto9.png)
   - Hapus data barang melalui tautan **Hapus**. Dokumentasi: [Foto 10](/screenshoot/foto10.png)

## Menjalankan Aplikasi

Buka alamat berikut pada browser:

```text
http://localhost/lab8_php_database/
```

Halaman utama menampilkan daftar barang. Gunakan tombol **Tambah Data** untuk memasukkan barang baru, lalu gunakan tautan **Ubah** atau **Hapus** pada daftar untuk mengelola data.

## Alur Penggunaan

1. Buka halaman utama aplikasi.
2. Tambahkan barang melalui menu **Tambah Data**.
3. Isi nama, kategori, harga jual, harga beli, stok, dan gambar barang.
4. Simpan data untuk menampilkannya pada daftar.
5. Ubah atau hapus data sesuai kebutuhan.

## Catatan

- Nama database dan tabel harus sesuai dengan konfigurasi serta query pada aplikasi.
- Pastikan folder `gambar` memiliki izin tulis agar proses unggah file dapat berjalan.
- Untuk penggunaan di lingkungan produksi, tambahkan validasi input, pembatasan tipe dan ukuran file, serta gunakan *prepared statement* untuk query database.

