# FindMyIphone
Track your Apple devices. A PHP client for Apple's Find My iPhone service iCloud®.

Requirements
============
Requires PHP 5.5.0 or higher.


Installation
=============

The best way to install valerian/findmyiphone is using  [Composer](http://getcomposer.org/):

```sh
$ composer require valerian/findmyiphone
```

Getting Started
===============

Find all devices in iCloud
```php
$findMyIphone = new Valerian\FindMyIphome('icloud username', 'icloud password');
$devices = $findMyIphone->getDevices();
foreach ($devices as $device) {
    $location = $device->getLocation();
    if ($location) {
        $latitude = $location->getLatitude();
        $latitude = $location->getLongitude();
    }
}


```

Find device by name
```php
$findMyIphone = new Valerian\FindMyIphome('icloud username', 'icloud password');
$device = $findMyIphone->getDevice('deviceDisplayName');
$location = $device->getLocation();
if ($location) {
    $latitude = $location->getLatitude();
    $latitude = $location->getLongitude();
}

```