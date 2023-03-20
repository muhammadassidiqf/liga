# Introduction
Ini merupakan aplikasi sederhana Klasemen Sepak Bola, aplikasi ini dibangun menggunakan bahasa PHP dengan bantuan framework Laravel 9 dan di dukung database MySQL.\
Pertama clone aplikasi ini menggunakan command dibawah ini
```bash
# Download this project
git clone https://github.com/muhammadassidiqf/liga.git
```
# Instalasi
1. Pertama running command dibawah ini untuk generate dependencies di dalam folder vendor.
```bash
# Masuk
cd liga-bola
# Run
composer install
```
2. Download liga.sql yang terdapat di dalam folder liga-bola yang sudah di clone sebelumnya, lalu masukkan database liga.sql ke dalam database local.
3. Ubah .env.example menjadi .env lalu ubah konfigurasi database seperti dibawah ini:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=liga
DB_USERNAME=root
DB_PASSWORD=
```
4. Lalu running command dibawah ini
```bash
# Run
php artisan key:generate
```
5. Instalasi Selesai.