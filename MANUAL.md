# Gulp
`gulp --app={app.folder.name}`

# Composer

curl -s http://getcomposer.org/installer | php
php -r "readfile('https://getcomposer.org/installer');" | php
php composer.phar dump-autoload -o
composer dump-autoload -o

Installing dependencies
---
composer install
composer install -o --no-dev
npm install request --save-dev
npm install ini --save-dev

Updating dependencies
---
composer update
composer update -o --no-dev
composer require khensolomonlethil/lethil
composer remove khensolomonlethil/lethil
composer create-project khensolomonlethil/lethil blog

composer update --lock
php composer.phar install --lock
php composer.phar update --lock

Directory
---
- zomi
    - vendor-dir
    - config-dir
    - public-dir
    - project-dir
    - development-dir
    - production-dir
    - resource-dir

Class
---
- App
    - Initiate
        - Request
        - Response
    - Request
    - Configuration
