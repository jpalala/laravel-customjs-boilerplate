<?php
// <!-- file: public/index.php (default laravel public/index.php file) -->
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));


$parsed_url = parse_url($_SERVER['REQUEST_URI']);
$path = $parsed_url['path'];
$paths = explode('/', ltrim($parsed_url['path'], '/'));
$first_path = substr($paths[0], 0, 3); // /api ba?
$is_callback = substr($paths[0], 0, 8) == 'callback'; // /callback ba?

// only run laravel-related code if it is `/api` related or the front page (views/welcome.blade.php = first page)
// otherwise if its not an api page or the front page, the matched route view should not be served
if($first_path == 'api' || empty($first_path)) 
{

  /*
  |--------------------------------------------------------------------------
  | Check If The Application Is Under Maintenance
  |--------------------------------------------------------------------------
  |
  | If the application is in maintenance / demo mode via the "down" command
  | we will load this file so that any pre-rendered content can be shown
  | instead of starting the framework, which could cause an exception.
  |
  */

  if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
      require $maintenance;
  }

  /*
  |--------------------------------------------------------------------------
  | Register The Auto Loader
  |--------------------------------------------------------------------------
  |
  | Composer provides a convenient, automatically generated class loader for
  | this application. We just need to utilize it! We'll simply require it
  | into the script here so we don't need to manually load our classes.
  |
  */

  require __DIR__.'/../vendor/autoload.php';

  /*
  |--------------------------------------------------------------------------
  | Run The Application
  |--------------------------------------------------------------------------
  |
  | Once we have the application, we can handle the incoming request using
  | the application's HTTP kernel. Then, we will send the response back
  | to this client's browser, allowing them to enjoy our application.
  |
  */

  $app = require_once __DIR__.'/../bootstrap/app.php';

  $kernel = $app->make(Kernel::class);

  $response = $kernel->handle(
      $request = Request::capture()
  )->send();

  $kernel->terminate($request, $response);
} elseif ($is_callback) {
	print_r($_REQUEST);
   //var_dump($_REQUEST['code']);
}
	else {
		echo "Does not exist!";
		exit;
	}

 // die('invalid route!');

