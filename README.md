# 🌌 Dark Portfolio Website (PHP Version)

## 👨‍💻 Nama: Chiqo Nanda Rial Pratama  
## 📚 Kelas: Sistem Informasi  
## 🆔 NIM: 2409116046

---

# 📖 A. Deskripsi Website

Website ini merupakan portfolio pribadi yang menampilkan informasi profil, kemampuan, serta sertifikat yang dimiliki.  

Berbeda dari versi sebelumnya yang statis, website ini sudah dikembangkan menjadi **dinamis menggunakan PHP dan MySQL**, sehingga seluruh data seperti profile, skills, dan certificates diambil langsung dari database.

Website ini memiliki tampilan modern dengan konsep **dark theme** serta layout responsif menggunakan Bootstrap.

---

# 🌐 B. Fitur Website

- ✅ Navbar responsif  
- ✅ Hero Section (Perkenalan)  
- ✅ About Me (Deskripsi diri)  
- ✅ Skills (Progress Bar dari database)  
- ✅ Certificates (Card dinamis dari database)  
- ✅ Dark Modern UI  
- ✅ Fullscreen Section (100vh)  
- ✅ Smooth Scrolling  

---

# 🖼️ C. Tampilan Website

## 1. 🔝 Navbar
Berfungsi sebagai navigasi utama website.

Isi:
- Logo / Nama
- Menu Home
- Menu About
- Menu Certificates
- Responsive Hamburger Menu

---

## 2. 🏠 Hero Section
Menampilkan perkenalan singkat.

Isi:
- Nama (dinamis dari database)
- Deskripsi singkat
- Foto profil
- Tombol navigasi

---

## 3. 👤 About Me
Menampilkan informasi diri.

Isi:
- Deskripsi diri
- Background pendidikan
- Minat di bidang teknologi

---

## 4. 💻 Technical Skills
Menampilkan skill dalam bentuk progress bar.

Isi:
- Data diambil dari database
- Menggunakan looping PHP (`while`)
- Progress bar sesuai level skill

---

## 5. 🏆 Certificates
Menampilkan sertifikat dalam bentuk card.

Isi:
- Gambar sertifikat (dari folder assets)
- Judul sertifikat
- Penerbit sertifikat
- Data diambil dari database (dinamis)

---

# 🧠 D. Penjelasan Code

---

## 1. 📂 conn.php

```php
<?php
$conn = mysqli_connect("localhost", "root", "", "portfolio_db");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
```

Fungsi:
Menghubungkan website dengan database MySQL
Digunakan di semua file PHP
