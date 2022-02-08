<?php  
 //include 'Includes\PCI_EncabezadoConecta.php';

session_start();
$servername = "localhost";
$dbname = "deseocar_pcividantarm"; 
$username = "deseocar_root";
$password = "**********";

 ?>
<html>
<body>
<!--El usuario guardado es  <?//php echo $_POST["usuario"]; ?><br>
El password capturado es : <?//php echo $_POST["passsword"]; ?>
-->
<?php


 $Id_PCIcNivelEstudios = $_POST["Id_PCIcNivelEstudios"]; 
 $Observaciones = $_POST["Observaciones"];
 $Operacion = "Alta";
 $Id_PCIdDatosPersonales = $_POST["Id_PCIdDatosPersonales"];// viene de un hidden
 $Id_PCIdUsuarios = $_SESSION["Id_PCIdUsuarios"];
 $IP_User =	$_SERVER['REMOTE_ADDR'];
 
  
 


//inicio
//session_start();
//require_once("include/conexion.php"); 
//$_SESSION["usuario"]= mysql_escape($_POST["usuario"]);

//		$_SESSION["pruebasesion"]= "1000"; 
//		
//		$sesionusuario = $_SESSION["pruebasesion"]; 
//		echo $sesionusuario ;
		
		
		
															//$Id_PCIdUsuarios = $_SESSION["Id_PCIdUsuarios"];
													//		echo $_SESSION["Id_PCIdUsuarios"];

//$correo=$_SESSION['usuario'];
//$jc_date= $_REQUEST["jc_date"];
//$dominio = $_SESSION["dominiom"];
//$hotel=$_SESSION["hotel"];

//echo $_SESSION['usuario'];


// echo $NumeroColaborador ;





try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
$sql = "INSERT INTO pcidnivelestudios (Id_PCIcNivelEstudios, Id_PCIdDatosPersonales, Observaciones, Id_PCIdUsuarios, IP_User, Operacion )
	                     VALUES ($Id_PCIcNivelEstudios, $Id_PCIdDatosPersonales, '$Observaciones', $Id_PCIdUsuarios , '$IP_User', '$Operacion')";


			 
    // use exec() because no results are returned
    
	$conn->exec($sql);

    echo "<BR><BR><BR><BR><BR><BR><BR><BR><HR>";
    echo "Registro Agregado Exitosamente";
	echo "<HR>";
	
	
	
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
/*//
//echo '<script language="javascript">alert("Alert Registro Guardado Correctamente ");</script>'; 
*/
?>


</body>

</html>