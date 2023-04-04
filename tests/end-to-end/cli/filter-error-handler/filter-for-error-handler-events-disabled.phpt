--TEST--
phpunit --configuration ../../_files/filter-error-handler/filter-disabled.xml
--FILE--
<?php declare(strict_types=1);
$_SERVER['argv'][] = '--do-not-cache-result';
$_SERVER['argv'][] = '--configuration';
$_SERVER['argv'][] = __DIR__ . '/../../_files/filter-error-handler/filter-disabled.xml';
$_SERVER['argv'][] = '--display-deprecations';
$_SERVER['argv'][] = '--display-notices';
$_SERVER['argv'][] = '--display-warnings';

require_once __DIR__ . '/../../../bootstrap.php';

(new PHPUnit\TextUI\Application)->run($_SERVER['argv']);
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

Runtime: %s
Configuration: %s/filter-disabled.xml

W                                                                   1 / 1 (100%)

Time: %s, Memory: %s

There was 1 deprecation:

1) PHPUnit\TestFixture\FilterErrorHandler\SourceClassTest::testSomething
* deprecation
  %s/src/SourceClass.php:21

* deprecation
  %s/vendor/VendorClass.php:8

%s/tests/SourceClassTest.php:16

--

There was 1 notice:

1) PHPUnit\TestFixture\FilterErrorHandler\SourceClassTest::testSomething
* notice
  %s/src/SourceClass.php:22

* notice
  %s/vendor/VendorClass.php:9

%s/tests/SourceClassTest.php:16

--

There was 1 warning:

1) PHPUnit\TestFixture\FilterErrorHandler\SourceClassTest::testSomething
* warning
  %s/src/SourceClass.php:23

* warning
  %s/vendor/VendorClass.php:10

%s/tests/SourceClassTest.php:16

OK, but some tests have issues!
Tests: 1, Assertions: 1, Warnings: 1, Deprecations: 1, Notices: 1.
