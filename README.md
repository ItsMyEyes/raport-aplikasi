# RKKM

tutorial install backend application rkkm

## Installation
1. Pertama kalian harus download filenya [disini](https://github.com/ItsMyEyes/raport-aplikasi/archive/refs/heads/main.zip) atau kali juga bisa cloning menggunakan applikasi git [https://github.com/ItsMyEyes/raport-aplikasi.git](https://github.com/ItsMyEyes/raport-aplikasi.git)

2. Setelah sudah download kalian buka folder dengan command line contoh 
```cmd
$ cd C:\Users\MSI\Documents\raport-aplikasi
```

3. jika sudah kalian jangan lupa download beberapa defendensi seperti [composer](https://qwords.com/blog/cara-download-dan-install-composer/), [xampp](https://www.niagahoster.co.id/blog/cara-instal-xampp/)

4. jika sudah selesai didownload jangan lupa untuk di install, setelah kali boleh buka xampp application dan click start pada bagian apache dan mysql

5. jika sudah kali buka kembali command linenya atau cmd, dan ketikan
```
$ composer install
```

6. tunggu sampai selesai, ketika sudah selesai, ketik kembali
```
$ php artisan key:generate
```

7. jika database juga sudah di import, maka sudah bisa dijalankan dengan cara ketik pada command line 

```
$ php artisan serve
```
