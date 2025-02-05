# laravel_blog_application

A clean Laravel Blog Application built from scratch using only core Laravel features, with a sleek design powered by Bootstrap community templates.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Project Description

A Laravel blog application that allows users to manage their profiles and participate in content creation. The application includes the following features:

- **Profile Management**: Create, edit, and delete profiles.
- **Author Role Request System**:
  - Users can request to become authors by sending a request to the admin.
  - The admin reviews and decides whether to approve or reject the request.
- Responsive and simple interface built using Bootstrap templates.

## Features

- Create, edit, and delete profiles.
- Role management (user, admin, author).
- Admin dashboard to manage users and requests.

## Technologies Used

- Laravel (PHP framework)
- MySQL (database)
- Bootstrap (UI framework) using existing open-source templates provided by the Bootstrap community.

## Database Configuration 

Open `.env` and set your database credentials:

```bash
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=your_database_name  
DB_USERNAME=your_database_user  
DB_PASSWORD=your_database_password
