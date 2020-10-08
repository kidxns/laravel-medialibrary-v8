# LARAVEL MEDIALIBRARY V8 - Associate files with Eloquent models.

This package can associate all sorts of files with Eloquent models. It provides a simple, fluent API to work with..

## Installation prerequisites

-   The MediaLibrary package requires PHP 7.4+ and Laravel 6+.

-   This package uses json columns. MySQL 5.7 or higher is required.

-   The exif extension is required (on most systems it will be installed by default). To create derived images GD needs to be installed on your server. If you want to create PDF or SVG thumbnails Imagick and Ghostscript are also required. For the creation of thumbnails of video files ffmpeg should be installed on your system.

-   If you're running into problems with Ghostscript and/or PDF to image generation have a look at issues regarding Ghostscript.

## Libraries is using in the project

-   jQuery.Ajax
-   Bootstrap
-   Laravel MediaLibrary

## How to settup the project you clone

-   `cd laravel-media;ibrary-v8`
-   `composer install`
-   `coppy (window) cp (macos) .env.example .env`
-   `php artisan key:generate`

## How to run

-   Create new a database on localhost
-   Open .env file on the project to settup environment configuration

    -   DB_DATABASE= [database name]
    -   DB_USERNAME= [database user name]
    -   DB_PASSWORD= [database password]

-   Migrate the database
    `php artisan migrate`

## Laravel Media Library Documentation

[Here] (https://spatie.be/docs/laravel-medialibrary/v8/introduction)

## Laravel Documentation

[Here]
(https://laravel.com/docs/8.x)

## License

Laravel Passport is open-sourced software licensed under the MIT license.
