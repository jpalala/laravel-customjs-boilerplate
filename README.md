# laravel customjs boilerplate

## setup

`composer install && php artisan key:generate`

## notes

1. `config/services.php` -> define github as socialite provider and set the credentials (use .env values)

2. `app/providers/routeserviceprovider.php` -> define where default to redirect after login (ie dashboard)

3. add other fillable items in `user.php` model

4. Make `GithubAuthController.php` and add the routes to it in `routes/web.php`

5. Check public/index.php - how we check each beginning route if its part of our code.

6. Once redirected to  the authenticated route, load frontend code in it and you can add a custom <script> </script> to check for cookies etc..

7. TODO: figure out how sanctum checks csrf to be able to call our laravel API's
