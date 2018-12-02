## MiniAspire - Laravel Project

The project focuses on creating a mini version of Aspire so that the candidate can think about the systems and architecture the real project would have.

The task is defined below:

 - Build a simple API that allows to handle user loans.
 - Necessary entities will have to be (but not limited to): users, loans, and repayments.
 - The API should allow simple use cases, which include (but are not limited to): creating a new user, creating a new loan for a user, with different attributes (e.g. duration, repayment frequency, interest rate, arrangement fee, etc.), and allowing a user to make repayments for the loan.
 - The app logic should figure out and not allow obvious errors. For example a user cannot make a repayment for a loan that’s already been repaid.

## Installation Instructions

- Run `composer install`
- Run `cp .env.example .env`
- Run `php artisan key:generate`
- Run `php artisan migrate`
- Run `php artisan passport:install`

## API Documentation

- [Postman Collection](https://www.getpostman.com/collections/1865a4ef920033776cef)

## Third-party Packages Used

- [Laravel Passport](https://laravel.com/docs/passport)
- [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper)
- [Laravel Debug Bar](https://github.com/barryvdh/laravel-debugbar)

## TODO

- Rewrite codebase following Service-Repository Pattern
