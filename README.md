<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# LaraEstate

## About this app
**The app is about buying and selling real estates.**

This web application was created in:\
**VILT** stack - Vue.js, Inertia.js, Laravel and Tailwind

_**Disclaimer: This application made for learning purposes only.**_

## Features
**You can expect features like:**

- Single-Page Application (SPA)
- Realtors can post list real estates for sale with the listing asking price and pictures.
- Realtors can delete and restore listings.
- Visitors can filter on the properties of the real estate.
- Visitors can calculate their mortgage and, of course, they can make offers.
- Users must register to post real estates and make offers.
- Offer notifications in-app and via email.
- Realtors can delete and restore listings.

## Installation guide
1. Open a terminal  
2. Clone this repository
```
git clone https://github.com/nfcrazyhun/laraestate.git
```
3. `cd` into it
4. Install dependencies
```
composer install
```
5. Copy then rename .env.example to .env
```
copy .env.example .env
```
6. Generate application key
```
php artisan key:generate
```
7. Create symbolic links
```
php artisan storage:link
```
8. Create a database
    1. Name: `laraestate`
    2. (collation: utf8mb4_unicode_ci)
    > Update the database credentials in the .env file.
9. Set up database tables (with demo data)
```
php artisan migrate:refresh --seed
```
10. Set up VirtualHost for the project (recommended: http://laraestate.test )
    > Be sure to update the **APP_URL** line in the .env file according to your VirtualHost.
11. (Optional) Build frontend assets
```
npm install
npm run build
```


## Note
The project was created using the following software versions:
- PHP 8.2.5
- Vue.js 3.2.39
- Inertia.js 0.11.0
- Laravel Framework 10.8.0
- Tailwind CSS 3.1.8
- node 18.14.2
- npm 9.5.0

## Screenshots
- WIP
