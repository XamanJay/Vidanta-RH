<?php
	function conectasqlserver($database)
{
	$server= "localhost";
	$user="root";
	$pass="";
	$db=$database;
	$connectionInfo = array( "Database"=> $db, "UID"=>$user, "PWD"=> $pass, "CharacterSet" => "UTF-8", 'ReturnDatesAsStrings'=>true);
	$conectasql = sqlsrv_connect($server, $connectionInfo);
	//if(!$conectasql)
//	{
//		die( print_r( sqlsrv_errors(), true));
// 	}
// 	
// 	return $conectasql;
}

?>