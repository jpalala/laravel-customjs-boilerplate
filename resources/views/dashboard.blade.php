@php
  //set a cookie
  $cookie_value = "John Doe";
  setcookie("user", $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
  $subtitle = 'Dashboard';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Svelte + Laravel: 
          @php 
              echo $subtitle
          @endphp
        </title>
        <style>
            body {
                font-family: sans-serif;
            }
        </style>
       <script> 
         var page = 'dashboard';
         console.log(document.cookie);
        </script>
        <script type="module" crossorigin src="/assets/index.09535909.js"></script>
        <link rel="stylesheet" href="/assets/index.2362315a.css">
    </head>
    <body class="antialiased">
            <div id="app"></div>
    </body>
  
</html> 
