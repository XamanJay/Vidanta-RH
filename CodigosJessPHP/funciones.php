<?php
	function conectasqlserver($database)
{
	$server= "10.14.250.142";
	$user="usuario";
	$pass="temp123!";
	$db=$database;
	$connectionInfo = array( "Database"=> $db, "UID"=>$user, "PWD"=> $pass, "CharacterSet" => "UTF-8", 'ReturnDatesAsStrings'=>true);
	$conectasql = sqlsrv_connect($server, $connectionInfo);
	if(!$conectasql)
	{
		die( print_r( sqlsrv_errors(), true));
 	}
 	
 	return $conectasql;
}

?>