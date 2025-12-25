# Analisis Kompleksitas Algoritma Iteratif dan Rekursif  
## Perhitungan Deret Geometri Berbasis PHP

## 📌 Deskripsi Proyek
Repository ini berisi implementasi dan analisis perbandingan **algoritma iteratif** dan **algoritma rekursif** dalam menghitung deret geometri menggunakan bahasa pemrograman **PHP**.  
Penelitian ini bertujuan untuk membandingkan **kompleksitas waktu dan ruang** dari kedua pendekatan algoritma tersebut, baik secara **teoretis (Big-O)** maupun **empiris (pengujian waktu eksekusi)**.

Aplikasi dikembangkan berbasis web dan menyediakan antarmuka untuk memasukkan parameter deret geometri serta menampilkan hasil perhitungan dan waktu eksekusi masing-masing algoritma.

---

## 👨‍💻 Anggota Kelompok
- **Pangeran Clevario Decaesario** (103012400148)  
- **Raihan Wendra Baswara** (103012400330)  
- **Achmad Raffa Adhiyaksa** (103012400200)  

Fakultas Informatika  
Telkom University, 2025

---

## 🎯 Tujuan
1. Mengimplementasikan algoritma iteratif dan rekursif untuk menghitung deret geometri.
2. Menganalisis kompleksitas waktu dan ruang dari kedua algoritma.
3. Membandingkan waktu eksekusi algoritma iteratif dan rekursif berdasarkan hasil pengujian.
4. Menentukan algoritma yang lebih efisien untuk perhitungan deret geometri.

---

## 🧮 Konsep Deret Geometri
Deret geometri merupakan barisan bilangan dengan bentuk:

a, ar, ar², ar³, …, arⁿ⁻¹

dengan:
- `a` = suku pertama  
- `r` = rasio  
- `n` = jumlah suku  

---

## ⚙️ Implementasi Algoritma

### 🔄 Algoritma Iteratif
Algoritma iteratif menggunakan struktur perulangan untuk menghitung setiap suku deret secara berurutan hingga suku ke-n.

**Kompleksitas waktu:** O(n)  
**Kompleksitas ruang:** O(1)

```php
function geometriIteratif($a, $r, $n) {
    $hasil = 0;
    $suku = $a;
    for ($i = 1; $i <= $n; $i++) {
        $hasil += $suku;
        $suku *= $r;
    }
    return $hasil;
}
🔁 Algoritma Rekursif
Algoritma rekursif menghitung deret geometri dengan cara memanggil fungsi secara berulang hingga mencapai kondisi dasar (base case).

Kompleksitas waktu: O(n)
Kompleksitas ruang: O(n)

php
Copy code
function geometriRekursif($suku, $r, $n) {
    if ($n == 0) {
        return 0;
    }
    return $suku + geometriRekursif($suku * $r, $r, $n - 1);
}
🧪 Metode Pengujian
Parameter input: suku pertama (a), rasio (r), dan jumlah suku (n)

Nilai n divariasikan untuk mengamati perubahan waktu eksekusi

Setiap algoritma dijalankan 100.000 kali untuk mendapatkan hasil waktu yang lebih stabil

Pengukuran waktu menggunakan fungsi microtime(true) pada PHP

📊 Hasil Pengujian
Berdasarkan hasil pengujian empiris:

Waktu eksekusi kedua algoritma meningkat seiring bertambahnya nilai n

Algoritma iteratif secara konsisten memiliki waktu eksekusi lebih cepat dibandingkan algoritma rekursif

Perbedaan disebabkan oleh overhead pemanggilan fungsi dan penggunaan stack pada algoritma rekursif

🧠 Kesimpulan
Algoritma iteratif dan rekursif sama-sama menghasilkan nilai deret geometri yang benar.

Secara teoretis, keduanya memiliki kompleksitas waktu O(n).

Algoritma iteratif lebih efisien secara praktis karena menggunakan memori konstan.

Algoritma rekursif membutuhkan ruang tambahan akibat stack pemanggilan fungsi.

Untuk perhitungan deret geometri dengan ukuran input besar, algoritma iteratif lebih disarankan.

🚀 Cara Menjalankan Program
Pastikan PHP telah terinstal

Jalankan server PHP:

bash
Copy code
php -S localhost:8000
Buka browser dan akses:

bash
Copy code
http://localhost:8000/tubesAKA.php
