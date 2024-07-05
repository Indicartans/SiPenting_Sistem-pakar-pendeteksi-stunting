#DIAGNOSA TINGKAT STUNTING DENGAN METODE CERTAINTY FACTOR DAN FORWARD CHAINING#

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
