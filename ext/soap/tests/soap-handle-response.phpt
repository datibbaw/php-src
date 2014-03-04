--TEST--
SOAP Client: Test __handleResponse()
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--FILE--
<?php

$response = <<<EOS
<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://testuri.org" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" SOAP-ENV:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"><SOAP-ENV:Body><ns1:testResponse><return xsi:type="xsd:string">Hello World</return></ns1:testResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>
EOS;

$client = new SoapClient(null, [
	'location' => 'http://localhost/',
	'uri' => 'http://testuri.org',
]);

var_dump($client->__handleResponse($response, 'test'));

?>
--EXPECT--
string(11) "Hello World"
