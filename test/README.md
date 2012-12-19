SpeckOrder
============

Test suite for orders management module for the ecommerce platform SpeckCommerce

Running tests
-------------

Dependencies for tests can be installed via composer to SpeckOrder/vendor
or can be placed to vendor/ in one of the parent folders.  
For example, when SpeckOrder installed as module in typical application,
dependencies will be loaded from application's vendor folder.  

To use composer (from module's root folder):
```
$ wget -O composer.phar http://getcomposer.org/composer.phar
$ chmod u+x composer.phar
$ ./composer.phar install --dev
```
Note: composer.phar itself and installed dependencies in vendor/ folder are gitignored

Then run tests:
```
$ cd test
$ phpunit
```


To cleanup after tests and purge any uncommitted or gitignored files and directories:
```
$ git clean -xfd && git checkout -- .
```
Do not forget to commit your changes first or they will be lost!
