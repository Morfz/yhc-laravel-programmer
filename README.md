<h2>Data Diri</h2>
Nama : Muhammad Majdi <br>
Perguruan Tinggi : Universitas Lambung Mangkurat <br>
Program Studi : Teknologi Informasi<br>
Alamat : Kec. Karang Intan Kab. Banjar, Kalimantan Selatan <br>
Nomor Telepon (WA) : 0882 4541 1080 <br>
Email : mhdmajdi2108@gmail.com

<h2>Proses Installasi Sistem</h2>
<b>Pastikan Anda telah menginstal PHP, Composer, dan MySQL di komputer Anda. Jika belum, Anda perlu menginstalnya terlebih dahulu.</b> <br>
<br>

1. Buka terminal atau command prompt dan arahkan ke direktori tempat Anda ingin menyimpan proyek Laravel.
2. Buka repositori proyek Laravel di GitHub yang ingin Anda jalankan oleh orang lain. Salin URL repositori.
3. Di terminal atau command prompt, jalankan perintah berikut untuk mengklon repositori ke komputer Anda:

<pre><code class="language-bash">git clone https://github.com/Morfz/yhc-laravel-programmer.git</code></pre>

4. Setelah repositori berhasil diklon, masuk ke direktori proyek Laravel dengan menjalankan perintah berikut:

<pre><code class="language-bash">cd yhc-laravel-programmer</code></pre>

5. Selanjutnya, jalankan perintah berikut untuk menginstal dependensi proyek Laravel:

<pre><code class="language-bash">composer install</code></pre>

6. Perintah ini akan mengunduh dan menginstal semua dependensi yang diperlukan oleh proyek Laravel.
7. Salin file .env.example dan ubah namanya menjadi .env:

<pre><code class="language-bash">cp .env.example .env</code></pre>

8. Kemudian, buka file .env dan konfigurasikan pengaturan database sesuai dengan lingkungan Anda (nama database, pengguna, kata sandi, dll.).
9. Generate kunci aplikasi Laravel dengan menjalankan perintah berikut:

<pre><code class="language-bash">php artisan key:generate</code></pre>

10. Perintah ini akan menghasilkan kunci unik yang diperlukan untuk menjalankan aplikasi Laravel.
11. Buka localhost pada PHPMyAdmin
12. Buat database baru dengan nama yhc_courses (case sensitive)
13. Pada database tersebut, import file di project yang sudah di clone <b>( yhc_courses.sql )</b>
14. Setelah itu, jalankan perintah migrasi untuk membuat tabel-tabel yang diperlukan di database:

<pre><code class="language-bash">php artisan migrate</code></pre>

15. Perintah ini akan menjalankan semua migrasi yang ditemukan di proyek Laravel.
16. Terakhir, Anda dapat menjalankan server pengembangan Laravel dengan perintah:

<pre><code class="language-bash">php artisan serve</code></pre>

Server pengembangan akan dijalankan dan Anda dapat mengakses aplikasi Laravel melalui browser dengan alamat http://localhost:8000 atau sesuai dengan yang ditampilkan di terminal.

<h2> Login Admin </h2>
<br>email : admin@gmail.com
<br>password : 12345678

<h2> Preview </h2>

<h4>
  Aplikasi ini menggunakan Laravel sebagai Backend Framework, Bootstrap 4 sebagai CSS Framework, dan MySQL sebagai Database<br>
</h4>
