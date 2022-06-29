<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>


    @stack('scripts')
<!-- 

Svelte can only load inside the target element (in my case, <body>) 
AFTER the DOM Loadd so I put the call to the 'scripts' stack inside here.

 pushing the js script INSIDE <body> works

-->
  </body>
</html>
