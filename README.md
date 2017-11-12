Lethil PHP Application
=====================
A very minimum requirement and aim to provided as light as possible Application using **letid** PHP framework!

[downloadComposer]: http://getcomposer.org/download/
[installerComposer]: https://getcomposer.org/installer
[packageComposer]: https://packagist.org
[getComposer]: https://getcomposer.org
[packagist]: https://packagist.org
[letIdComposer]: https://github.com/letid/composer.git
[letIdComposerDownload]: https://github.com/letid/composer.git


## Gulp for SCSS and Javascript
`gulp --app=???`

## Composer installation
The preferred way to install this extension is through [composer][downloadComposer]. Require *letid/framework*--- by doing one of the following

### Composer available
If [Composer][getComposer] available just [download][letIdComposerDownload] the [letId composer][letIdComposer] and run `composer update`

### Composer not available

[Install][installerComposer] composer using PHP...
more information about [installer][downloadComposer] and [packages][packageComposer]...
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
```

Setup composer by executing `composer-setup.php`
```
php composer-setup.php --filename=composer
```

Delete `composer-setup.php` because we don't need anymore..
```
php -r "unlink('composer-setup.php');"
```

Now, generate autoload and update packages...
```
php composer update
php composer.phar update
composer update
```

If autoload dump/update require?
```
php composer dump-autoload -o
php composer.phar dump-autoload -o
composer dump-autoload -o
```

require framework using cli

```
php composer require --prefer-dist letid/framework
php composer.phar require --prefer-dist letid/framework
composer require --prefer-dist letid/framework

```
or add require section in your composer.json.
```
"letid/framework": "dev-master"
"letid/framework": "~1.0.0"
```

## Other
For [License](LICENSE) information.


# Nodejs
```
npm install npm -g
npm update npm -g
```
### Update package.json
```
npm update --save-dev
npm install --only=dev
npm update g
npm update fs-extra -g
npm update graceful-fs -g
npm update graceful-fs
npm i fs-extra@latest -g
```
