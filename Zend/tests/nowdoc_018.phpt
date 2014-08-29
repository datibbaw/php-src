--TEST--
Loosened restrictions on Heredoc syntax
--FILE--
<?php

$strings = [<<<'EOS'
a
EOS, <<<'EOS'
b
EOS];

class Test
{
	const A = <<<'EOS'
ab
EOS . <<<'EOS'
cd
EOS;
}

var_dump($strings);
var_dump(Test::A);
var_dump(eval("return <<<'EOS'\nfoo\nEOS;"));
?>
--EXPECT--
array(2) {
  [0]=>
  string(1) "a"
  [1]=>
  string(1) "b"
}
string(4) "abcd"
string(3) "foo"
