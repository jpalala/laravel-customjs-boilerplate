#!/usr/bin/env bash 

# alternative -> use mix: https://github.com/wewowweb/laravel-mix-svelte

WELCOME_FILE = "resources/views/welcome.blade.php"
FRONTEND_FILE = "index.phtml"

# assumes we deployed the frontend code to dist folder
cp dist/index.html "public/$FRONTEND_FILE"

# create public folders for css and js:
mkdir public/css && cp -Rf dist/css/* public/css
mkdir public/js && cp -Rf dist/js/* public/js

# do a git clean
git clean -f

# append / include code in welcome file
# don't git commit the welcome file! 
# so on every git pull you can re-run this file without being appended again
# Only uncomment the following line if you don't have the code above in your welcome file (the first view page for the laravel page)
# echo "@php \n include_once(__DIR__ . '../relative/path/public/index.phtml'); \n @endphp" >> $WELCOME_FILE
