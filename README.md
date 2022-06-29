# laravel customjs boilerplate

## setup

`composer install && php artisan key:generate`

## notes

1. `config/services.php` -> define github as socialite provider and set the credentials (use .env values)

2. `app/providers/routeserviceprovider.php` -> define where default to redirect after login (ie dashboard)

3. add other fillable items in `user.php` model which will be automatically set once user is logged in (ie email and github_id etc)

4. Make `GithubAuthController.php` and add the routes to it in `routes/web.php`

5. Check public/index.php - how we check each beginning route if its part of our code.

6. Once redirected to  the authenticated route, load frontend code in it and you can add a custom <script> </script> to check for cookies etc..



### setting up sanctum

1. `composer require laravel/sanctum`
2. `php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"` then `php artisan migrate`
3. Follow [instructions](https://laravel.com/docs/9.x/sanctum) to update the `app\Http\Kernel.php` 
    ```
    'api' => [
        \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    ```  
4. Make api call from your javascript:

//calling this route will set laravel's cookie then you can start making requests...
```js
axios.get(baseUrl + '/sanctum/csrf-cookie', ).then(() => {
  //make a request to get /github_id from the database
  axios.post(baseUrl + '/api/github_id').then(); //etc...
});

//or just check for the XSRF-TOKEN cookie of laravel   
if (cookie.includes("XSRF-TOKEN")) {
  axios.post(baseUrl + '/api/github_id', {
    email: "joe@mentorsdojo.com",
  }).then((res) => {
    console.log(res);
    authorized = true;
  });
} else {
  console.error('No XSRF Token!');
}
```

## dev notes

When new routes are created and not showing:

```
php artisan route:cache
```

When views aren't updating:

```
php artisan view:clear 
```

## Loading Svelte scripts into your template 

Apparently, SvelteJS's target element needs to be loaded so I put the call tto the asset stack inside the `<body>` element.

Here is an alternative:
```
   document.addEventListener('DOMContentLoaded', () => { 
   // do something to load whatever is in app.js
  });
```

## TODO

- [x] setup sanctum
- [x] be able to load a route that is protected by sanctum 
