<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## CRUD User

The application contains two parts API and Fullstack view to manage the users.

### API

This API is covering the following endpoints:
- Search for users using name or email
- Get user data
- Create user
- Delete user
- Update user

### Frontend (Fullstack)

This is a small web application, using Livewire laravel package. This application is rendering
user information with the following:

- On load, it render all users in a table
- The Table contain all user’s information (name, email, etc.).
- The Table have actions buttons that allows you to delete or update a user.
- It have a create button to create users

### Up and Running

```
composer install
vendor/bin/sail up
vendor/bin/sail php artisan migrate

```

### Postman Export and Endpoints
Please check the `CRUD User.postman_collection.json` file for the postman endpoints.
You could also import the above file into the postman.