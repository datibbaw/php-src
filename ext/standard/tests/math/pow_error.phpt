--TEST--
Test pow() - no params test pow()
--INI--
precision=14
--FILE--
<?php
pow();
?>
--EXPECTF--
Parse error: syntax error, unexpected ')' in %s on line 2

