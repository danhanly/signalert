# Panday 
__Customisable & Extensible Notifications - Providing Alerts Exactly Where You Need Them__

[![Build Status](https://img.shields.io/travis/danhanly/panday.svg?style=flat-square)](https://travis-ci.org/danhanly/panday)
[![Coverage Status](https://img.shields.io/coveralls/danhanly/panday.svg?style=flat-square)](https://coveralls.io/github/danhanly/panday)
![Release](https://img.shields.io/github/release/danhanly/panday.svg?style=flat-square)
[![License](https://img.shields.io/github/license/danhanly/panday.svg?style=flat-square)](http://choosealicense.com/licenses/gpl-2.0/)

Panday makes it simple to store messages:

```php
$panday = new Panday();
$panday->store('Notification Name', 'homepage');
```

Panday makes it simple to render messages:

```php
$panday = new Panday();
$panday->render('homepage', 'error');
```

## Customising

By default, panday gives access to its SessionDriver to store messages in the default session, and also allows you to access to a simple [bootstrap](http://getbootstrap.com/) renderer classes.

You can customise any of these by writing your own classes, and specifying them within the configuration file `.panday.yml` which should exist within your project root.

```yml
renderer: \Panday\Renderer\BootstrapRenderer
driver: \Panday\Storage\SessionDriver
```

Providing the full class name for each of these items will allow Panday to understand and utilise them in its processes.