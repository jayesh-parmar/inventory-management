<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Documentation
- in this project we are use admin panel for admin so admin can login and logout  and 
- admin can add company brand name and edit brand name
.

## Important notes for developers
- We are using OCI High availability MySQL instance in production. It requires that all the tables in the database must have primary keys.

## Technical
- The information about the development process and reference details are recorded in <a href="https://github.com/jayesh-parmar/inventory-management/compare/Technical.md?expand=1" >this file</a>

## Requirements
- laravel 10
- PHP 8.2
- npm 
- composer 


##  Laravel + Tailwind Css Admin Project with 
- login user 
- logout user
- add and update brands
  
## Installation
- git clone https://github.com/jayesh-parmar/inventory-management.git
- Create .env file from the example file:
- `php -r "file_exists('.env') || copy('.env.example', '.env');"`
- open .env and update DB_DATABASE (database details)
- Install the dependencies : `composer install`
- NPM : `npm install`
- `npm run dev` and start developing...
- Generate Key : `php artisan key:generate`
- DB migrate and Seeding : `php artisan migrate:fresh --seed`
- run : `php artisan serve`

## For Login
- #### Admin
- email: admin@gmail.com
- password : admin123

