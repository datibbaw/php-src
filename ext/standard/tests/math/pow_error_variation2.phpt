--TEST--
Test pow() - too many params test pow()
--INI--
precision=14
--FILE--
<?php
pow(36, 4, true);
?>
--EXPECTF--
Parse error: syntax error, unexpected ',' in %s on line 2

