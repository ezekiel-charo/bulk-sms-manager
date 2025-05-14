# Bulk SMS Manager

A production-grade full-stack messaging app to simplify customer engagement via bulk SMS.

## Tech Stack

- Laravel
- InertiaJs
- VueJs
- Tailwind
- MySQL.

## Features

- Contact management, including importing/exporting contacts via csv.
- Sending SMS in bulk and tracking delivery history.
- AfricasTalking integration.

## Prerequisites

Ensure that you have [MySQL](https://www.mysql.com/), [Node & NPM](https://nodejs.org/en), [PHP](https://www.php.net/) and [Composer](https://getcomposer.org/) installed on your machine.

You can follow the instructions [here](https://laravel.com/docs/12.x/installation#installing-php) to install PHP and Composer.

## Environment setup

- Create a `.env` file and copy the contents of `.env.example` into it.
- Set the `APP_KEY` variable or generate a key using `php artisan key:generate
`
- Set your mysql db credentials:

```
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
- Run database migrations: `php artisan migrate`
 

## Running the project

- Run `npm install` command to install required npm packages.
- Run `npm run build` command to compile the frontend.
- Run `composer install` command to install required php packages.
- Run `composer run dev` command to start the project.
- Visit [localhost:8000](localhost:8000) to access the application.
