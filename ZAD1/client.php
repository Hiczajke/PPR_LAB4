#!/usr/bin/php

<?php
	
	$port 	= 5555;
	$host 	= '127.0.0.1';
	$wsdl 	= 'http://' . $host . ':' . $port . '?wsdl';
	print($wsdl);
	print("\n");
	print("\n");
	
	$soap = new SoapClient( $wsdl, array('cache_wsdl' => WSDL_CACHE_NONE));
	
	$soap->__setLocation('http://' . $host . ':' . $port);
	
	$res = $soap->add(["a" => 71411, "b" => 17]);
	print_r($res);

?>
