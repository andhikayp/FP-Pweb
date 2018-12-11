# Instruksi Umum

1. Extract file **vendor.zip** dengan cara klik kanan->Extract Files menggunakan winRar.
2. Buka phpMyadmin lalu buat database baru. Kemudian import file **data.sql** ke dalam database yang tadi dibuat.
3. Buka file **.env**, lalu ubah DB_DATABASE menjadi Database kamu.
4. Gunakan hak akses user dengan **username=root** pada file .env

# Buat link dari htdocs menuju folder github

1. Buka CMD, kemudian pindah ke direktori **htdocs** xampp.
2. Buat link shortcut dengan mengetikkan perintah : `mklink /J "<path dimana htdocs berada>\<nama folder baru>" "<path dimana folder repository berada>"`

**Contoh**
`mklink /J "C:\xampp\htdocs\FP-Pweb" "D:\Github\FP"`

3. Jika sudah, coba akses **localhost/"nama folder baru"**

# PERLU DIPERHATIKAN!!!

1. Selalu lakukan **Commit and Push** saat selesai melakukan editing.
2. Selalu cek apakah ada perubahan **(Pull)** dari repository.
3. Aplikasi yang digunakan adalah **GitHub Desktop**
4. Informasikan kepada anggota lain jika akan melakukan editing, agar tidak terjadi conflict.

## Semangat
