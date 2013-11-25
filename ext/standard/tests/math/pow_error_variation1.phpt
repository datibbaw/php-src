--TEST--
Test pow() - single param test pow()
--INI--
precision=14
--FILE--
<?php
pow(36);
?>
--EXPECTF--
Parse error: syntax error, unexpected ')' in %s on line 2

