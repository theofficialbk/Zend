@echo off
REM PHP_CodeSniffer tokenises PHP code and detects violations of a
REM defined set of coding standards.
REM 
REM PHP version 5
REM 
REM @category  PHP
REM @package   PHP_CodeSniffer
REM @author    Greg Sherwood <gsherwood@squiz.net>
REM @author    Marc McIntyre <mmcintyre@squiz.net>
REM @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
REM @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
REM @link      http://pear.php.net/package/PHP_CodeSniffer
set phpbin="C:\wamp\bin\php\php5.5.12\php.exe" (This is the php.exe path)
set location="C:\wamp\www\Zend\CS\PHP_CodeSniffer-2.0.0RC3\scripts"
"%phpbin%" -d auto_append_file="" -d auto_prepend_file="" -d include_path="'%phpbin%'" -f "%location%\phpcs" -- %*
