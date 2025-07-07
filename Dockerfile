# Gunakan base image resmi PHP 8.1 dengan server Apache
FROM php:8.1-apache

# Set direktori kerja di dalam container
WORKDIR /var/www/html

# Salin semua file dari folder proyek lokal ke direktori kerja di container
COPY . /var/www/html/

# Apache secara default berjalan sebagai user `www-data`.
# Kita perlu memastikan folder `data` bisa ditulisi oleh Apache
# untuk menyimpan kiriman dari pengguna.
RUN chown -R www-data:www-data /var/www/html/data

# Port 80 sudah diekspos oleh base image php:apache, jadi tidak perlu EXPOSE 80 lagi.