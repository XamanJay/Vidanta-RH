<?php
	//include 'Includes\PCI_EncabezadoConecta.php';

session_start();
$servername = "localhost";
$dbname = "deseocar_pcividantarm"; 
$username = "deseocar_root";
$password = "**********";


          
   $Id_PCIcStatus = $_POST["Id_PCIcStatus"];
 //echo $Id_PCIcStatus; 

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// Lo que esta dentro del los signos de + ya esta probado que si funciona



$Conn = mysqli_connect($servername, $username, $password, $dbname);
// 
if (!$Conn) {
	  		die("Connection failed: " . mysqli_connect_error());
		    }

$cadenaSQL = "SELECT * FROM vista_pciddatospersonales_pcicstatus  WHERE Id_PCIcStatus = $Id_PCIcStatus";
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
			<td colspan="5" align="center"> <strong> REPORTE DE ESTATUS: <font color="#999999" size="5"><?php echo strtoupper($registro['PCIcStatus']); ?></font> </strong>
			</tr>      
        	<tr bgcolor="#1C83BD">
                <td  colspan="3">&nbsp;&nbsp;&nbsp; <strong>TOTAL DE REGISTROS : </strong>    <strong><font color="#00FF00" size="5">- <?php echo $ResultSetTotal; ?> -</font></strong></td>
                <td  colspan="2"><strong>FECHA: </strong><?php echo date("d/m/Y");?> &nbsp; <input type="button" value=":: Imprimir ::" onClick="javascript:window.print();" align="middle"></td>
            </tr>       
            <tr bgcolor="#1C83BD">
                <td align="center" >N&uacute;mero de<br> Colaborador</td>
                <td align="center" >Apellido Paterno</td>
                <td align="center" >Apellido Materno</td>
                <td align="center" >Nombre</td>
                <td align="center" >Estatus</td>                
                
            </tr>
            <?php
             
                 $cadenaSQL_PCIdDatosPersonales = "SELECT * FROM vista_pciddatospersonales_pcicstatus  WHERE Id_PCIcStatus = $Id_PCIcStatus";
				 $ResultSet_PCIdDatosPersonales = mysqli_query($Conn, $cadenaSQL_PCIdDatosPersonales);
				 while($row = mysqli_fetch_assoc($ResultSet_PCIdDatosPersonales))
				 {
             ?>
			<tr>
				<td><?php echo $row['NumeroColaborador'];?></td>
				<td><?php echo $row['ApellidoPaterno'];?></td>
				<td><?php echo $row['ApellidoMaterno'];?></td>                           
				<td><?php echo $row['Nombres']; ?></td>
				<td><?php echo $row['PCIcStatus']; ?></td>
				
			</tr>
			<?php  } ?>							
        
</table>



</body>
</html>