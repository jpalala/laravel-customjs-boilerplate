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



### setting up sanctum

1. `composer require laravel/sanctum`
2. `php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"` then `php artisan migrate`
3. Follow [instructions](https://laravel.com/docs/9.x/sanctum) to update the `app\Http\Kernel.php` 

## dev notes

When new routes are created and not showing:

```
php artisan route:cache
```

When views aren't updating:

```
php artisan view:clear 
```


## TODO

- [] setup sanctum
- [] setup tasks model and be able to get tasks once authenticated
