#!/usr/bin/php

<?php
	#===================================================================
	$port 	= 50888;
	$host 	= '127.0.0.1';
	$wsdl 	= 'http://' . $host . ':' . $port . '?wsdl';
// 	$wsdl2 = 'http://127.0.0.1:50888/?wsdl';
	print($wsdl);
    print("\n");
    print("\n");
	#-------------------------------------------------------------------
	$soap = new SoapClient( $wsdl, array('proxy_host' => "127.0.0.1", 'proxy_port' => $port) );
	
 	$res  = $soap->abc(array(71411,17));
	
	#print_r( $soap->__getFunctions());
 	print_r( $res);
	#===================================================================
?>
