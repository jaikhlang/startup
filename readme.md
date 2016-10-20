## StartUp 5.3

<img src="https://raw.githubusercontent.com/w00p/startup/3e7392c5c6428af443eb9a494d206f93ebc5f8b9/public/uploads/readme.png" alt="StartUp 5.3">

StartUp 5.3 is a Open Source StartUp Boilerplate built with Laravel 5.3. It is built with the awesome Laravel Framework. It includes roles & permissions,
user profile,admin backend and much more.

[![StyleCI](https://styleci.io/repos/67250440/shield)](https://styleci.io/repos/67250440)
[![MIT licensed](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/w00p/startup/blob/master/LICENSE)
[![GitHub issues](https://img.shields.io/github/issues/w00p/startup.svg)](https://github.com/w00p/startup/issues)
[![GitHub forks](https://img.shields.io/github/forks/w00p/startup.svg)](https://github.com/w00p/startup/network)
[![GitHub stars](https://img.shields.io/github/stars/w00p/startup.svg)](https://github.com/w00p/startup/stargazers)

## Features

* Laravel 5.3
* Register/Login/Logout/Password Reset
* Authentication/Users/Roles/Permissions
* Administrator Management
* Change/Create/Manage Users/Roles/Permissions
* Default Responsive Layout
* Frontend and Admin Controllers
* Bootstrap 3
* Font Awesome
* Upload Avatar
* Activity log in admin settings section.
* User e-mail activation.
* Backup SQL database and files from admin settings section.
* File Uploads from admin section.
* Authy 2-factor Authentication
* Language support
* Messages, send private messages with users.

## Requirements

Before you proceed make sure your server meets the following requirements:

- [Composer](https://getcomposer.org/)
- [PHP](https://php.net/) >= 7.0.x
- PDO compliant database (SQL, MySQL, PostgreSQL, SQLite)

## How to Install

1. Clone this repository: ```git clone https://github.com/w00p/startup.git ``` 
2. If you want to specify wich folder to clone to use: ```git clone https://github.com/w00p/startup.git my-folder```
3. ```composer install```
4. Create .env file (.env.example included, just copy that one to .env)
5. ```php artisan key:generate```
6. ```php artisan migrate --seed```
9. Thats it, visit your URL. Log in with one of the users below.

## Default Seeded Users

1. Admin role: admin@example.com / 12345678
2. Moderator role: moderator@example.com / 12345678
3. User role: user@example.com / 12345678

All new user registered is getting default User role.

## Packages used

* [spatie/laravel-permission](https://github.com/spatie/laravel-permission)
* [laravelcollective/html](https://laravelcollective.com/docs/5.3/html)
* [intervention/image](https://github.com/intervention/image)
* [spatie/laravel-activitylog](https://github.com/spatie/laravel-activitylog)
* [larapack/config-writer](https://github.com/larapack/config-writer)
* [spatie/db-dumper](https://github.com/spatie/db-dumper)
* [dflydev/dflydev-apache-mime-types](https://github.com/dflydev/dflydev-apache-mime-types)
* [srmklive/authy](https://github.com/srmklive/laravel-twofactor-authentication)
* [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)
* [cmgmyr/laravel-messenger](https://github.com/cmgmyr/laravel-messenger)
* [erusev/parsedown](https://github.com/erusev/parsedown) 

## Screenshots
[Click here for screenshots](https://github.com/w00p/startup/tree/master/public/uploads/screenshots)

## Changelog

Detailed changes for each release are documented in the [release notes](https://github.com/w00p/startup/blob/master/CHANGELOG).

## License

StartUp 5.3 is open-sourced software licensed under the [MIT license](https://github.com/w00p/startup/blob/master/LICENSE).
