<?php  
 //include 'Includes\PCI_EncabezadoConecta.php';

session_start();
$servername = "localhost";
$dbname = "deseocar_pcividantarm"; 
$username = "deseocar_root";
$password = "**********";

 
  ?>
<html>

<head>
<TITLE>..: SAPCII :.. Sistema de Administraci&oacute;n del Plan de Carrera Interno e Indicadores. Vidanta </TITLE>
<meta name="description" content="Discover your happiness through the extraordinary world of Vidanta. Vidanta is a collection of luxury resorts, located in seven stunning destinations along the most beautiful beaches in Mexico.">
<meta name="keywords" content="Vidanta, vidanta, VIDANTA">
 <link rel="shortcut icon" href="images/ico/favicon.ico">
 </head>
 <body>
<!--El usuario guardado es  <?//php echo $_POST["usuario"]; ?><br>
El password capturado es : <?//php echo $_POST["passsword"]; ?>
-->
<?php


 $ApellidoPaterno = $_POST["ApellidoPaterno"]; 
 $ApellidoMaterno = $_POST["ApellidoMaterno"];
 $Nombres = $_POST["Nombres"];
 $NumeroColaborador = $_POST["NumeroColaborador"];
 $Id_PCIcPuestos = $_POST["Id_PCIcPuestos"];
 $Id_PCIcStatus = $_POST["Id_PCIcStatus"];
 $Operacion = "Alta";
 $Id_PCIdUsuarios = $_SESSION["Id_PCIdUsuarios"];
 $IP_User =	$_SERVER['REMOTE_ADDR'];

// echo $ApellidoPaterno; 
// echo $ApellidoMaterno ;
// echo $Nombre ;
// echo $NumeroColaborador ;





try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
$sql = "INSERT INTO pciddatospersonales (ApellidoPaterno, ApellidoMaterno, Nombres, NumeroColaborador, Id_PCIcPuestos, Id_PCIcStatus, Id_PCIdUsuarios, IP_User , Operacion )
	                             VALUES ('$ApellidoPaterno', '$ApellidoMaterno', '$Nombres', $NumeroColaborador, $Id_PCIcPuestos, $Id_PCIcStatus, $Id_PCIdUsuarios, '$IP_User', '$Operacion')";


			 
    // use exec() because no results are returned
    
	$conn->exec($sql);

    echo "<BR><BR><BR><BR><BR><BR><BR><BR><HR>";
    echo "Registro Agregado Exitosamente";
	echo "<BR><HR>";
	echo "<center><a href='PCI_Contenedor_Busqueda_No_Colaborador.php' target='ContenedorPrincipal' > Continuar Captura... </a>";
    echo "<img src='images/load-indicator.gif'/> </center>";
	echo "<BR><HR>";
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