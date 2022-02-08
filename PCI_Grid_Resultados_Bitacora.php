<?php
//include 'Includes\PCI_EncabezadoConecta.php';

session_start();
$servername = "localhost";
$dbname = "deseocar_pcividantarm"; 
$username = "deseocar_root";
$password = "**********";


          
   
   // $NumeroColaborador = $_POST["NumeroColaborador"];
   
   $Id_PCIdUsuarios = $_POST["Id_PCIdUsuarios"];
//   echo $Id_PCIdUsuarios ;
//   echo "<---Primera";
   
 

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// Lo que esta dentro del los signos de + ya esta probado que si funciona



$Conn = mysqli_connect($servername, $username, $password, $dbname);
// 
if (!$Conn) {
	  		die("Connection failed: " . mysqli_connect_error());
		    }


$cadenaSQL = "SELECT * FROM vista_bitacora_tmp_pcididiomas_pciddatospersonales_pcidusuarios  WHERE Id_PCIdUsuarios = $Id_PCIdUsuarios";

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
   
	

      
	    <table border="0" cellpadding="2" cellspacing="2"  align="center" >
		

		    <tr bgcolor="#1C83BD">
			<td colspan="7" align="center"> <strong> B I T A C O R A : <font color="#999999" size="5"><?php // echo strtoupper($registro['PCIcStatus']); ?></font> </strong>
			</tr>      
        	<tr bgcolor="#1C83BD">
                <td  colspan="3">&nbsp;&nbsp;&nbsp; <strong>TOTAL DE REGISTROS : </strong>    <strong><font color="#00FF00" size="5">- <?php echo $ResultSetTotal; ?> -</font></strong></td>
                <td  colspan="4"><strong>FECHA: </strong><?php echo date("d/m/Y");?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="button" value=":: Imprimir ::" onClick="javascript:window.print();" align="middle"></td>
            </tr>       
            <tr bgcolor="#1C83BD" align="center">
                <td align="center" >Usuario <br> Responsable</td>
                <td align="center" >Direcci&oacute;n IP <br> del dispositivo</td>
                <td align="center" >Fecha y Hora del movimiento</td>
                <td align="center" >Tipo de Operaci&oacute;n</td>
                <td align="center" >Tabla Afectada</td>                
				<td align="center" >Identificador Afectado</td>                
				<td align="center" >N&uacute;mero del colaborador</td>                
                
            </tr>
<?php
if ($Id_PCIdUsuarios == "0"){ 
//echo "$Id_PCIdUsuarios" . "<--- igual a cero" ;
$cadenaSQL_PCIdDatosPersonales = "SELECT * FROM vista_bitacora_tmp_pcididiomas_pciddatospersonales_pcidusuarios ";
} 
else{
//echo "$Id_PCIdUsuarios" . "<--- Mayor a cero" ;
$cadenaSQL_PCIdDatosPersonales = "SELECT * FROM vista_bitacora_tmp_pcididiomas_pciddatospersonales_pcidusuarios  WHERE Id_PCIdUsuarios = $Id_PCIdUsuarios ";
}


$ResultSet_PCIdDatosPersonales = mysqli_query($Conn, $cadenaSQL_PCIdDatosPersonales);
while($row = mysqli_fetch_assoc($ResultSet_PCIdDatosPersonales))
{
?>
			<tr align="center">
				<td><?php echo $row['Usuario'];?></td>
				<td><?php echo $row['IP_User'];?></td>
				<td><?php echo $row['FechayHora'];?></td>                           
				<td><?php echo $row['Operacion']; ?></td>
				<td><?php echo "PCIdIdiomas"; ?></td>
				<td><?php echo $row['Id_PCIdIdiomas']; ?></td>
				<td><?php echo $row['NumeroColaborador']; ?></td>
				
			</tr>
			<?php  } ?>							
        
</table>



</body>
</html>