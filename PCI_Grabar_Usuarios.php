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


 $usuario = $_POST["usuario"]; 
 $passsword = $_POST["passsword"];
 $nombrecompleto = $_POST["nombrecompleto"];
 $eemail = $_POST["eemail"];
 $Id_PCIcDepartamentos = $_POST["Id_PCIcDepartamentos"];
 $Administrador = $_POST["Administrador"];
 $Activo = $_POST["Activo"];
 $Id_PCIdUsuarios_Niveles = $_POST["Id_PCIdUsuarios_Niveles"];
 $Operacion = "Alta";
 $Id_PCIdUsuarios = $_SESSION["Id_PCIdUsuarios"];
 $IP_User =	$_SERVER['REMOTE_ADDR'];

// echo $usuario; 
// echo $passsword ;
// echo $nombrecompleto ;
// echo $eemail ;
// echo $Id_PCIcDepartamentos ;
// echo $Administrador ;
// echo $Activo ;
// echo $Id_PCIdUsuarios_Niveles ;





try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
$sql = "INSERT INTO pcidusuarios (Usuario, Passswword, Nombre_Usuario, email, Id_PCIcDepartamentos, Administrador, Activo, Id_PCIdUsuarios_Niveles, PCIdUsuarios, IP_User , Operacion )
	  VALUES ('$usuario', '$passsword', '$nombrecompleto', '$eemail', '$Id_PCIcDepartamentos', '$Administrador', '$Activo', '$Id_PCIdUsuarios_Niveles', $Id_PCIdUsuarios, '$IP_User', '$Operacion' )";


			 
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
//
//echo '<script language="javascript">alert("Alert Registro Guardado Correctamente ");</script>'; 

?>


</body>

</html>