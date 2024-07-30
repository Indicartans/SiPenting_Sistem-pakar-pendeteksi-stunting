# Diagnosa Tingkat Stunting dengan Metode Certainty Factor dan Forward Chaining
SiPenting (Sistem Pendeteksi Stunting) adalah sebuah aplikasi yang menggunakan metode Certainty Factor dan Forward Chaining untuk mendiagnosa tingkat stunting pada anak. Aplikasi ini dirancang untuk membantu dalam mengidentifikasi gejala dan tingkat stunting berdasarkan data yang diberikan pengguna. Dengan antarmuka yang user-friendly, pengguna dapat mengisi form diagnosa dan mendapatkan hasil diagnosa yang akurat serta saran yang relevan. Sistem ini juga dilengkapi dengan fitur-fitur seperti dashboard, manajemen gejala, dan gangguan stunting, yang semuanya dapat diakses melalui platform web.

## Menjalankan Program

1. **Salin file Copy.env menjadi .env dan lakukan pengaturan**
    ```bash
    cp .env.example .env
    ```

2. **Generate key aplikasi**
    ```bash
    php artisan key:generate
    ```

3. **Instal dependensi npm**
    ```bash
    npm install
    ```

4. **Instal dependensi composer**
    ```bash
    composer install
    ```

5. **Migrasi dan seed database**
    ```bash
    php artisan migrate:fresh --seed
    ```

6. **Jalankan server aplikasi**
    ```bash
    php artisan serve
    ```

## Login

- **Email:** admin@example.com
- **Password:** password
