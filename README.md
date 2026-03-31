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

2. 📄 index.php
```php
<?php
include 'conn.php';

$profile = mysqli_query($conn, "SELECT * FROM profile LIMIT 1");
$data = mysqli_fetch_assoc($profile);

$skills = mysqli_query($conn, "SELECT * FROM skills");
$certificates = mysqli_query($conn, "SELECT * FROM certificates");
?>
```
Penjelasan:

Mengambil data profile dari database
Mengambil data skills
Mengambil data certificates
Data ditampilkan menggunakan PHP echo dan looping
🔁 Contoh Looping Skills
```php
<?php while($skill = mysqli_fetch_assoc($skills)) { ?>
  <div class="mb-3">
    <label><?php echo $skill['name']; ?></label>
    <div class="progress">
      <div class="progress-bar" style="width: <?php echo $skill['level']; ?>%"></div>
    </div>
  </div>
<?php } ?>
```
🖼️ Contoh Menampilkan Gambar
```
<img src="assets/<?php echo $cert['image']; ?>">
```

Penjelasan:

- Database hanya menyimpan nama file
- Gambar diambil dari folder assets

---

3. 🎨 style.css

Digunakan untuk mengatur tampilan website:

- Dark gradient background
- Neon purple accent
- Card glass effect (blur)
- Progress bar custom
- Responsive layout

---

🗄️ E. Struktur Database
📌 Database: portfolio_db
Table: profile
- id
- name
- description
- about
- image
Table: skills
- id
- name
- level
Table: certificates
- id
- title
- issuer
- image
---
📂 F. Struktur Project
``` minpro2/
│
├── index.php
├── conn.php
├── style.css
├── assets/
│   ├── disini.jpeg
│   ├── image.png
│   ├── 6.png
│   └── lainnya...
└── README.md
```
---
🛠️ G. Teknologi yang Digunakan
HTML5
CSS3
Bootstrap 5
PHP (Native)
MySQL
Google Fonts

🏆 H. Hasil Pembelajaran

Melalui project ini, saya mempelajari:

- Mengubah website statis menjadi dinamis
- Menggunakan PHP untuk mengambil data dari database
- Menghubungkan MySQL dengan website
- Menggunakan looping PHP (while)
- Menampilkan data dinamis ke UI
- Mengelola struktur project web
  
---

📌 Catatan
Website tidak menggunakan template
Semua layout dibuat manual
Data diambil langsung dari database
Gambar disimpan di folder assets

---

👨‍💻 Author

Chiqo Nanda Rial Pratama
Mahasiswa Sistem Informasi
Universitas Mulawarman
Tahun 2026
