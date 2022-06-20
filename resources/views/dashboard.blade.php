@php
    $title = "Dashboard";
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ $authToken ?? csrf_token() }}">

        <title>Svelte + Laravel:{{ $title ?? '' }}
        </title>
        </title>
        <style>
            body {
                font-family: sans-serif;
            }
        </style>
       <script>
         var page = 'dashboard';
        </script>
        <script type="module" crossorigin src="/assets/index.09535909.js"></script>
        <link rel="stylesheet" href="/assets/index.2362315a.css">
    </head>
    <body class="antialiased">
            <div id="app"></div>
    </body>
</html>
