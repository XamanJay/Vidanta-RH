<?php
 //include 'Includes\PCI_EncabezadoConecta.php';

session_start();
$servername = "localhost";
$dbname = "deseocar_pcividantarm"; 
$username = "deseocar_root";
$password = "**********";



$Conn = mysqli_connect($servername, $username, $password, $dbname);
 //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);



 $Usuario = $_POST["Usuario"]; 
 $Passswword = $_POST["Passswword"];

// 



if (!$Conn) {
	  		die("Connection failed: " . mysqli_connect_error());
		    }
             // SELECT * FROM pcidusuarios WHERE Usuario = 'admin' AND Passswword = 'pci200' AND  Activo = 1
$cadenaSQL = "SELECT Id_PCIdUsuarios, PCIdUsuarios, Usuario FROM pcidusuarios WHERE Usuario = '$Usuario' AND Passswword = '$Passswword' AND  Activo = 1";
//echo $cadenaSQL; 

$ResultSet = mysqli_query($Conn, $cadenaSQL);

 


  /* 
   Lo valioso de este codigo es que se hace la coneccion correctamente y que verifica si por lo menos encontro un resultado en el Query
  
       echo "id: " . $row["Id_PCIcStatus"]. " - Name: " . $row["PCIcStatus"]. " " . $row["PCIcStatus"]. "<br>";  */

if (mysqli_num_rows($ResultSet) > 0) {



	
    while($row = mysqli_fetch_assoc($ResultSet))
	{

	// echo "ACCESO CONCEDIDO";
	
    $_SESSION["Id_PCIdUsuarios"] = $row["Id_PCIdUsuarios"];
	$_SESSION["Usuario"] = $row["Usuario"];
	
	$variablesesion = $_SESSION["Id_PCIdUsuarios"];
//	Se ven correctamente ambas variables de session
//	echo $_SESSION["Usuario"];
//	echo $variablesesion;

//$_SESSION["Id_PCIdUsuarios"]=  $row["Id_PCIdUsuarios"];
//$_SESSION["PCIdUsuarios"]= $row["PCIdUsuarios"];
	
	echo "<BR>";
		echo "<BR>";
			echo "<BR>";
				echo "<BR>";
					echo "<BR>";
						echo "<BR>";
							echo "<BR>";
								echo "<BR>";
									echo "<BR>";
										echo "<BR>";
											echo "<BR>";
												echo "<BR>";
												
												
    echo "<center><img src='ImagenesVidanta/LOGOLOCO03(1000x400_transparente).gif' width='100' height='100'></center>";												
    echo "<center><img src='images/loader.gif'/ </center>";
	  echo "<BR> <HR>";
	    echo "<center> Validando Usuario , Espere un momento por favor...</center>";

		  echo "<BR> <HR>";
		  
	echo "<script type='text/javascript'>
				setTimeout ('redireccionar()', 2000); //tiempo expresado en milisegundos
				function redireccionar(){
				window.location='index.php';
				} 
		</script>";

 
 
    }
	
	
} 

else 

{
	//    echo "SI EL USUARIO ---> NO ! TIENE PERMISOS  ";

			
			
	echo "<script type='text/javascript'>
		 alert('----- Usuario y/o Password :: No Validos :: Favor de Verificar -----');
		window.location='index.html';
				</script>";

	 

}

//ojo con esto cierras la coneccion --->    mysqli_close($Conn);
?>   