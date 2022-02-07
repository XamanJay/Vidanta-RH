<?php

//include 'Includes\PCI_EncabezadoConecta.php';

session_start();
$servername = "localhost";
$dbname = "deseocar_pcividantarm"; 
$username = "deseocar_root";
$password = "**********";

	
$Id_PCIdDatosPersonales = trim($_GET['Id_PCIdDatosPersonales']);
          


// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// Lo que esta dentro del los signos de + ya esta probado que si funciona



$Conn = mysqli_connect($servername, $username, $password, $dbname);
// 
if (!$Conn) {
	  		die("Connection failed: " . mysqli_connect_error());
		    }

$cadenaSQL = "SELECT * FROM vista_pcidnivelestudios_pcicnivelestudios  WHERE Id_PCIdDatosPersonales =  $Id_PCIdDatosPersonales";

$ResultSet = mysqli_query($Conn, $cadenaSQL);

$ResultSetTotal = mysqli_num_rows($ResultSet);

$registro = mysqli_fetch_assoc($ResultSet);




if (mysqli_num_rows($ResultSet) > 0) {

    while($row = mysqli_fetch_assoc($ResultSet))
	{
  /* 
   Lo valioso de este codigo es que se hace la coneccion correctamente y que verifica si por lo menos encontro un resultado en el Query
  
       echo "id: " . $row["Id_PCIcStatus"]. " - Name: " . $row["PCIcStatus"]. " " . $row["PCIcStatus"]. "<br>";  */
    }
	
	
} 

else 

{
    echo "0 Resultados";
}

//ojo con esto cierras la coneccion --->    mysqli_close($Conn);

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



	
?>

<html>
<head>
	<title></title>


</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" background="ImagenesVidanta/LOGOLOCO03(1000x400)(SinFondo_10opacidad).png">
  <HR> 
	

      
	    <table width="727" border="1"  align="center" cellpadding="2" cellspacing="2" >
		

		    <tr bgcolor="#1C83BD">
			<td colspan="4" align="center"> <strong> RESULTADO DE BUSQUEDA </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="PCI_Alta_NivelEstudios.php?Id_PCIdDatosPersonales=<?php echo $Id_PCIdDatosPersonales;?>" >AGREGAR REGISTRO</a>
			</tr>      
            <tr bgcolor="#1C83BD">
			    <td align="center" >Acci&oacute;n</td>
                <td align="center" >Nivel de Estudios</td>
				<td align="center" >Observaciones</td>
                <td align="center" >Fecha Captura</td>
                                
                
            </tr>
            <?php
            
                 $cadenaSQL_Vista = "SELECT * FROM vista_pcidnivelestudios_pcicnivelestudios  WHERE Id_PCIdDatosPersonales =  $Id_PCIdDatosPersonales";
				 


				 $ResultSet_Vista = mysqli_query($Conn, $cadenaSQL_Vista);
				 while($registro_Vista = mysqli_fetch_assoc($ResultSet_Vista))
				 {
             ?>
			<tr>
			    <td align="center">&nbsp;&nbsp;<img src="images/editar.png" title="Editar" height="15px" width="15px"><a target="ContenedorPrincipal" href="KontenedorEstructural.php?Id_PCIdDatosPersonales=<?php echo $registro_Vista['Id_PCIdDatosPersonales']; ?>">&nbsp;Modificar&nbsp;</a></td>
				<td align="center"><?php echo $registro_Vista['PCIcNivelEstudios'];?></td> 
				<td align="center"><?php echo $registro_Vista['Observaciones']; ?></td>
				<td align="center"><?php echo $registro_Vista['FechayHora'];?></td>
				
				
			</tr>
			<?php  } ?>							
        
</table>



</body>
</html>
