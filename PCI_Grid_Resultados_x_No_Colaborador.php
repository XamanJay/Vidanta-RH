<?php
	
//include 'Includes\PCI_EncabezadoConecta.php';

session_start();
$servername = "localhost";
$dbname = "deseocar_pcividantarm"; 
$username = "deseocar_root";
$password = "**********";

          
   $NumeroColaborador = $_POST["NumeroColaborador"];
 //echo $Id_PCIcStatus; 

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// Lo que esta dentro del los signos de + ya esta probado que si funciona



$Conn = mysqli_connect($servername, $username, $password, $dbname);
// 
if (!$Conn) {
	  		die("Connection failed: " . mysqli_connect_error());
		    }

$cadenaSQL = "SELECT * FROM vista_pciddatospersonales_pcicstatus  WHERE NumeroColaborador LIKE  '%$NumeroColaborador%'";

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
<body>
   
	

      
	    <table width="727" border="1"  align="center" cellpadding="2" cellspacing="2" >
		

		    <tr bgcolor="#1C83BD">
			<td colspan="4" align="center"> <strong> RESULTADO DE BUSQUEDA </strong>
			</tr>      
            <tr bgcolor="#1C83BD">
			    <td align="center" >Acci&oacute;n</td>
                <td align="center" >N&uacute;mero de<br> Colaborador</td>
				<td align="center" >Estatus</td>
                <td align="center" >Nombre Completo</td>
                                
                
            </tr>
            <?php
            
                 $cadenaSQL_PCIdDatosPersonales = "SELECT * FROM vista_pciddatospersonales_pcicstatus  WHERE NumeroColaborador LIKE  '%$NumeroColaborador%'";

				 $ResultSet_PCIdDatosPersonales = mysqli_query($Conn, $cadenaSQL_PCIdDatosPersonales);
				 while($row = mysqli_fetch_assoc($ResultSet_PCIdDatosPersonales))
				 {
             ?>
			<tr>
			    <td align="center">&nbsp;&nbsp;<img src="images/ico/favicon.ico" title="Editar" height="15px" width="15px"><a target="ContenedorPrincipal" href="KontenedorEstructural.php?Id_PCIdDatosPersonales=<?php echo $row['Id_PCIdDatosPersonales']; ?>">&nbsp;Detalle&nbsp;</a></td>
				<td align="center"><?php echo $row['NumeroColaborador'];?></td> 
				<td align="center"><?php echo $row['PCIcStatus']; ?></td>
				<td align="center"><?php echo $row['Nombres']." " .$row['ApellidoPaterno'] ." ". $row['ApellidoMaterno'];?></td>
				
				 
			</tr>
			<?php  } ?>							
        
</table>



</body>
</html>