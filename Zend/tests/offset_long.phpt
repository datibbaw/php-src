--TEST--
using different variables to access long offsets
--FILE--
<?php

$long = 1;

var_dump($long[1]);
var_dump($long[0.0836]);
var_dump($long[NULL]);
var_dump($long["run away"]);

var_dump($long[TRUE]);
var_dump($long[FALSE]);

$fp = fopen(__FILE__, "r");
var_dump($long[$fp]);

$obj = new stdClass;
var_dump($long[$obj]);

$arr = Array(1,2,3);
var_dump($long[$arr]);

echo "Done\n";
?>
--EXPECTF--	

Warning: Attempt to use integer as an array in %s on line %d
NULL

Warning: Attempt to use integer as an array in %s on line %d
NULL

Warning: Attempt to use integer as an array in %s on line %d
NULL

Warning: Attempt to use integer as an array in %s on line %d
NULL

Warning: Attempt to use integer as an array in %s on line %d
NULL

Warning: Attempt to use integer as an array in %s on line %d
NULL

Warning: Attempt to use integer as an array in %s on line %d
NULL

Warning: Attempt to use integer as an array in %s on line %d
NULL

Warning: Attempt to use integer as an array in %s on line %d
NULL
Done
