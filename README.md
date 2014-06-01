Browscap Parsing Class
==============

Introduction
--------------

Crossjoin\Browscap allows to check for browser settings based on the user agent string, using the data from Browscap 
(the [Browser Capabilities Project](browscap.org)). 

Although PHP has the native [`get_browser()`](http://php.net/get_browser) function to do this, this implementation offers some advantages:

- The PHP function requires to set the path of the browscap.ini file in the php.ini directive [`browscap`](http://www.php.net/manual/en/misc.configuration.php#ini.browscap), which is flagged as `PHP_INI_SYSTEM` (so it can only be set in php.ini or httpd.conf, which isn't allowed in many cases, e.g. in shared hosting environments).
- It's much faster than the PHP function (between 20-50 times, depending on the PHP version, the searched user agent and other factors)
- It includes automatic updates of the Browscap source
- All components are extendible - use your own parser, updater, formatter or cache functionality


Requirements
--------------
- PHP 5.3+ (it has been successfully tested with PHP 5.3.28 - PHP 5.6.0beta3, perhaps also older versions still work)
- PHP 5.5+ recommended (to be able to use generators, which reduces memory consumption a lot)
- For automatic updates: cURL extension or `allow_url_fopen` enabled in php.ini, 


Simple example
--------------
```
<?php
$browscap = new \Crossjoin\Browscap\Browscap();
$settings = $browscap->getBrowser()->getData();
```


Advanced example
--------------
```
<?php
// set an own cache directory (otherwise the system temp directory is used)
\Crossjoin\Browscap\Cache\File::setCacheDirectory(__DIR__ . DIRECTORY_SEPARATOR . 'tmp');

// disable automatic updates
$updater = new \Crossjoin\Browscap\Updater\None();
\Crossjoin\Browscap\Browscap::setUpdater($updater);

// set local updater that extends \Crossjoin\Browscap\Updater\AbstractUpdater or 
// \Crossjoin\Browscap\Updater\AbstractUpdaterRemote
$updater = new \Crossjoin\Browscap\Updater\Local();
$updater->setOption('LocalFile', __DIR__ . DIRECTORY_SEPARATOR . 'browscap.ini');
\Crossjoin\Browscap\Browscap::setUpdater($updater);

// set an own parser implementation that extends \Crossjoin\Browscap\Parser\AbstractParser 
// (also for other formats than INI)
//$parser = new \My\Browscap\Parser\Ini();
//\Crossjoin\Browscap\Browscap::setParser($parser);

// set an own formatter that extends \Crossjoin\Browscap\Formatter\AbstractFormatter
//$formatter = new \My\Browscap\Formatter\Extended();
//\Crossjoin\Browscap\Browscap::setFormatter($formatter);

$browscap = new \Crossjoin\Browscap\Browscap();
$settings = $browscap->getBrowser()->getData();
```


Background
--------------

I created Crossjoin\Browscap because I searched for a good Browscap parser class. 

First I worked with the [Browscap-PHP](https://github.com/browscap/browscap-php) class, but it required a lot of memory and wasn't really extendible. After contributing some optimizations to the project, I realized that I need to build the parser from scratch, to be able to further optimize it.

This is the result, published as a separate project as it's not compatible to Browscap-PHP:
- No more direct access to object properties
- New default format (to be a real replacement of PHP get_browser(): object instead of an array, lower-case keys by default
- Some missing features (see below)


Things to do...
--------------
- Update via fsockopen isn't possible (possible in [Browscap-PHP](https://github.com/browscap/browscap-php))
- Proxy cannot be set for the update (possible in [Browscap-PHP](https://github.com/browscap/browscap-php))


Issues and feature requests
---------------------------

Please report your issues and ask for new features on the GitHub Issue Tracker:
https://github.com/crossjoin/browscap/issues

Please report incorrectly identified User Agents and browser detect in the browscap.ini file to Browscap: 
https://github.com/browscap/browscap/issues