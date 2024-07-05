# Sistem Pakar Diagnosa Tingkat Stunting Mahasiswa Tingkat Akhir

<h2>DIAGNOSA TINGKAT STUNTING DENGAN METODE CERTAINTY FACTOR DAN FORWARD CHAINING</h2>

## Berikut tampilan sistem yang dibuat.

- Home
    <img src="https://user-images.githubusercontent.com/55641225/210590987-d726e463-4047-4bf9-aacc-30a2621b9d5d.png" alt="home" srcset="" />

- Dashboard
    <img src="https://user-images.githubusercontent.com/55641225/210591006-173cd002-1844-454c-89c0-bb9bc4ad5a58.png" alt="dashboard" srcset="" />

- Gejala
    <img src="https://user-images.githubusercontent.com/55641225/210591008-261206fc-27f1-4997-8970-3d93961a37d3.png" alt="gejala" srcset="" />

- Gangguan Stunting
    <img src="https://user-images.githubusercontent.com/55641225/210591019-46baab91-d130-4b61-a0d3-fc5128ae8690.png" alt="stunting" srcset="" />

- Form Diagnosa
    <img src="https://user-images.githubusercontent.com/55641225/210591073-95efadbc-d1c3-43ae-a37a-cf28ae7249ee.png" alt="form-diagnosa" />

- Hasil Diagnosa
    <img src="https://user-images.githubusercontent.com/55641225/210591083-5026f305-d148-4e5e-8fd8-272819ff165b.png" alt="hasil-diagnosa" />
    <img src="https://user-images.githubusercontent.com/55641225/210591088-3a2380eb-3fb5-4f48-9e9c-5487e9afc1e4.png" alt="hasil-diagnosa2" />

<ol>
    <li>Alfi Atqia R.</li>
    <li>Canggih Wahyu R.</li>
    <li>Andrian</li>
</ol>

## Menjalankan Program

1. **Salin file .env.example menjadi .env dan lakukan pengaturan**
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
