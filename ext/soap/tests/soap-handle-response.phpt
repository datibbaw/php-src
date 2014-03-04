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

$response = <<<EOS
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SOAP-ENV:Fault><faultcode>SOAP-ENV:Server</faultcode><faultstring>WSDL generation is not supported yet</faultstring></SOAP-ENV:Fault></SOAP-ENV:Body></SOAP-ENV:Envelope>
EOS;

try {
	var_dump($client->__handleResponse($response, 'test'));
} catch (\SoapFault $f) {
	echo $f->faultcode, ' ', $f->faultstring, PHP_EOL;
}

?>
--EXPECT--
string(11) "Hello World"
SOAP-ENV:Server WSDL generation is not supported yet
