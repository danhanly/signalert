# Signalert 
__Customisable & Extensible Notifications - Providing Alerts Exactly Where You Need Them__

[![Build Status](https://img.shields.io/travis/danhanly/signalert.svg?style=flat-square)](https://travis-ci.org/danhanly/signalert)
[![Coverage Status](https://img.shields.io/coveralls/danhanly/signalert.svg?style=flat-square)](https://coveralls.io/github/danhanly/signalert)
[![Release](https://img.shields.io/github/release/danhanly/signalert.svg?style=flat-square)](https://github.com/danhanly/signalert/releases)
[![License](https://img.shields.io/github/license/danhanly/signalert.svg?style=flat-square)](http://choosealicense.com/licenses/gpl-2.0/)

Signalert is a PHP notifications implementation designed to allow you to communicate effectively from anywhere in your application's code to your users.

## Installing Signalert

Signalert is a composer-enabled package, so installing it is as simple as adding it to your composer.json file:

```json
"require": {
    "signalert/signalert": "dev-master"
},
```

Then run `composer update signalert/signalert` to see the package installed.

## How to use Signalert

Signalert makes it simple to store messages:

```php
$signalert = new Signalert();
$signalert->store('Notification Name', 'homepage');
```

Signalert makes it simple to render messages:

```php
$signalert = new Signalert();
$signalert->render('homepage', 'error');
```

Signalert even makes it simple to retrieve messages as an array:

```php
$signalert = new Signalert();
$signalert->fetch('homepage', 'error');
```

## Customising

By default, Signalert gives access to its SessionDriver to store messages in the default session, and also allows you to access to a simple [bootstrap](http://getbootstrap.com/) renderer classes.

You can customise any of these by writing your own classes, and specifying them within the configuration file `.signalert.yml` which should exist within your project root.

```yml
renderer: \Signalert\Renderer\BootstrapRenderer
driver: \Signalert\Storage\SessionDriver
```

Providing the full class name for each of these items will allow Signalert to understand and utilise them in its processes.