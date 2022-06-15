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
echo "\n include_once(__DIR__ . '../relative/path/public/index.phtml');" >> $WELCOME_FILE

