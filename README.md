# Notifly 
__Customisable & Extensible Notifications - Providing Alerts Exactly Where You Need Them__

[![Build Status](https://img.shields.io/travis/danhanly/notifly.svg?style=flat-square)](https://travis-ci.org/danhanly/notifly)
[![Coverage Status](https://img.shields.io/coveralls/danhanly/notifly.svg?style=flat-square)](https://coveralls.io/github/danhanly/notifly)
![Release](https://img.shields.io/github/release/danhanly/notifly.svg?style=flat-square)
[![License](https://img.shields.io/github/license/danhanly/notifly.svg?style=flat-square)](http://choosealicense.com/licenses/gpl-2.0/)

Notifly makes it simple to store messages:

```php
$notifly = new Notifly();
$notifly->store('Notification Name', 'homepage');
```

Notifly makes it simple to render messages:

```php
$notifly = new Notifly();
$notifly->render('homepage', 'error');
```

## Customising

By default, notifly gives access to its SessionDriver to store messages in the default session, and also allows you to access to a simple [bootstrap](http://getbootstrap.com/) renderer classes.

You can customise any of these by writing your own classes, and specifying them within the configuration file `.notifly.yml` which should exist within your project root.

```yml
renderer: \Notifly\Renderer\BootstrapRenderer
driver: \Notifly\Storage\SessionDriver
```

Providing the full class name for each of these items will allow Notifly to understand and utilise them in its processes.