## :rocket: Laravel-Sistem-Informasi-Inventory By Muh Syauqy

## WHAT IS LARAVEL-MARKETINGFUNNEL?
Laravel-MarketingFunell was made to Controller Viewers, Like, Comment

## System Requirement
- PHP Version 7.4.1 or Above
- Composer
- Git

## Installation
1. Open the terminal, navigate to your directory (htdocs or public_html).
```bash
git clone https://github.com/SyauqyAfif/Laravel8-Sistem-Marketing-Funnel.git
cd Laravel8-Sistem-Marketing-Funnel
composer install / composer update
copy .env.example .env
```

2. Setting the database configuration, open .env file at project root directory
```
DB_DATABASE=**your_db_name**
DB_USERNAME=**your_db_user**
DB_PASSWORD=**password**
```

3. Install Project
```bash
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

You will get the administrator credential and url access like example bellow:
```bash
::Administrator Credential::
URL Login: http://localhost:8000
``
Admin
Email: admin@gmail.com
Password: admin
``
Gudang
Email: staff@gmail.com
Password: staff
