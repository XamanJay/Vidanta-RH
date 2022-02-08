<?php
	//include 'Includes\PCI_EncabezadoConecta.php';

session_start();
$servername = "localhost";
$dbname = "deseocar_pcividantarm"; 
$username = "deseocar_root";
$password = "**********";


          
//   $Id_PCIcStatus = $_POST["Id_PCIcStatus"];
 //echo $Id_PCIcStatus; 


$Conn = mysqli_connect($servername, $username, $password, $dbname);
 
if (!$Conn) {
	  		die("Connection failed: " . mysqli_connect_error());
		    }

//$cadenaSQL = "SELECT * FROM vista_pciddatospersonales_pcicstatus  WHERE Id_PCIcStatus = $Id_PCIcStatus";

$cadenaSQL = "SELECT * FROM vista_pciddatospersonales_pcicstatus ";
$ResultSet = mysqli_query($Conn, $cadenaSQL);
$ResultSetTotal = mysqli_num_rows($ResultSet);
$registro = mysqli_fetch_assoc($ResultSet);


$cadenaSQL_Tot_Solicitud = "SELECT NumeroColaborador FROM vista_pciddatospersonales_pcicstatus Where Id_PCIcStatus = 2  ";
$ResultSet_Tot_Solicitud = mysqli_query($Conn, $cadenaSQL_Tot_Solicitud);
$Tot_Solicitud = mysqli_num_rows($ResultSet_Tot_Solicitud);


$cadenaSQL_Tot_Practicando = "SELECT NumeroColaborador FROM vista_pciddatospersonales_pcicstatus Where Id_PCIcStatus = 3  ";
$ResultSet_Tot_Practicando = mysqli_query($Conn, $cadenaSQL_Tot_Practicando);
$Tot_Practicando = mysqli_num_rows($ResultSet_Tot_Practicando);

$cadenaSQL_Tot_Suspendido = "SELECT NumeroColaborador FROM vista_pciddatospersonales_pcicstatus Where Id_PCIcStatus = 4  ";
$ResultSet_Tot_Suspendido = mysqli_query($Conn, $cadenaSQL_Tot_Suspendido);
$Tot_Suspendido = mysqli_num_rows($ResultSet_Tot_Suspendido);

$cadenaSQL_Tot_Cancelado = "SELECT NumeroColaborador FROM vista_pciddatospersonales_pcicstatus Where Id_PCIcStatus = 5  ";
$ResultSet_Tot_Cancelado = mysqli_query($Conn, $cadenaSQL_Tot_Cancelado);
$Tot_Cancelado = mysqli_num_rows($ResultSet_Tot_Cancelado);

$cadenaSQL_Tot_Promovido = "SELECT NumeroColaborador FROM vista_pciddatospersonales_pcicstatus Where Id_PCIcStatus = 6  ";
$ResultSet_Tot_Promovido = mysqli_query($Conn, $cadenaSQL_Tot_Promovido);
$Tot_Promovido = mysqli_num_rows($ResultSet_Tot_Promovido);

$cadenaSQL_Tot_Finalizado = "SELECT NumeroColaborador FROM vista_pciddatospersonales_pcicstatus Where Id_PCIcStatus = 7  ";
$ResultSet_Tot_Finalizado = mysqli_query($Conn, $cadenaSQL_Tot_Finalizado);
$Tot_Finalizado = mysqli_num_rows($ResultSet_Tot_Finalizado);


	
?>

<html>
<head>
<TITLE>..: SAPCII :.. Sistema de Administraci&oacute;n del Plan de Carrera Interno e Indicadores. Vidanta </TITLE>
<meta name="description" content="Discover your happiness through the extraordinary world of Vidanta. Vidanta is a collection of luxury resorts, located in seven stunning destinations along the most beautiful beaches in Mexico.">
<meta name="keywords" content="Vidanta, vidanta, VIDANTA">
<link rel="shortcut icon" href="images/ico/favicon.ico">


</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" background="ImagenesVidanta/LOGOLOCO03(1000x400)(SinFondo_10opacidad).png">
   
	
	<table border="0" cellpadding="2" cellspacing="2"  align="center" >
	
	<tr bgcolor="#1C83BD">
			<td colspan="5" align="center"> <strong><font color="#ffffff" size="5"> GRAFICA DE INDICADORES: </font> <font color="#999999" size="5"><?php // echo strtoupper($registro['PCIcStatus']); ?></font> </strong>
	</tr>      
	<tr bgcolor="#1C83BD">
		<td  colspan="3">&nbsp;&nbsp;&nbsp; <strong><font color="#ffffff" size="5">GRAN TOTAL : </font></strong>    <strong><font color="#00FF00" size="5">- <?php echo $ResultSetTotal; ?> -</font></strong></td>
		<td  colspan="2"><strong>FECHA: </strong><?php echo date("d/m/Y");?> &nbsp; <input type="button" value=":: Imprimir ::" onClick="javascript:window.print();" align="middle"></td>
	</tr> 
	
	</TABLE>
	
	<BR>
	
	<HR>
	
	
	<table border="0" cellpadding="2" cellspacing="2"  align="left" >
	
	 <TR>
	 <TH  bgcolor="#1C83BD"><strong><font color="#ffffff" size="4"> S T A T U S  <?php echo "---". date("d/m/Y")  //."---". date("H:i");  ?></font></strong>	 </TH>
	 <TH  bgcolor="#1C83BD"><strong><font color="#ffffff" size="4">TOTAL </font></strong>	 </TH>
	 <TH > 	 </TH>
	 <TH > </TH>
	 </TR>
	
	 <TR>
	 <TD  bgcolor="#1C83BD"><strong><font color="#ffffff" size="4">Solicitud en Proceso: </font></strong>	 </TD>
	 <TD  bgcolor="#1C83BD"><strong><font color="#ffffff" size="4"> <?php echo $Tot_Solicitud;   ?></font></strong>	 </TD>
	 <TD > <img src="images/BarraVerde.png" height="25" width="<?php echo $Tot_Solicitud;   ?>" >	 </TD>
	 <TD > </TD>
	 </TR>
	 
	  <TR>
	 <TD bgcolor="#1C83BD"><strong><font color="#ffffff" size="4">Practicando: </font></strong></TD>
	 <TD  bgcolor="#1C83BD"><strong><font color="#ffffff" size="4"><?php echo $Tot_Practicando;   ?></font></strong>	 </TD>
	 <TD > <img src="images/BarraVerde.png" height="25" width="<?php echo $Tot_Practicando;   ?>" >	 </TD>
	 <TD > </TD>
	 </TR>
	 
	  <TR>
	 <TD bgcolor="#1C83BD"><strong><font color="#ffffff" size="4"> Suspendido:</font></strong> </TD>
	 <TD  bgcolor="#1C83BD"><strong><font color="#ffffff" size="4"><?php echo $Tot_Suspendido;   ?></font></strong>	 </TD>
	 <TD > <img src="images/BarraVerde.png" height="25" width="<?php echo $Tot_Suspendido;   ?>" >	 </TD>
	 <TD > </TD>
	 </TR>
	 
	  <TR>
	 <TD bgcolor="#1C83BD"><strong><font color="#ffffff" size="4"> Cancelado:	</font></strong> </TD>
	 <TD  bgcolor="#1C83BD"><strong><font color="#ffffff" size="4"><?php echo $Tot_Cancelado;   ?></font></strong>	 </TD>
	 <TD > <img src="images/BarraVerde.png" height="25" width="<?php echo $Tot_Cancelado;   ?>" >	 </TD>
	 <TD > </TD>
	 </TR>
	 
	  <TR>
	 <TD bgcolor="#1C83BD"><strong><font color="#ffffff" size="4"> Promovido:	</font></strong> </TD>
	 <TD  bgcolor="#1C83BD"><strong><font color="#ffffff" size="4"><?php echo $Tot_Promovido;   ?></font></strong>	 </TD>
	 <TD > <img src="images/BarraVerde.png" height="25" width="<?php echo $Tot_Promovido;   ?>" >	 </TD>
	 <TD > </TD>
	 </TR>
	 
	  <TR>
	 <TD bgcolor="#1C83BD"><strong><font color="#ffffff" size="4"> Finalizado:	</font></strong> </TD>
	 <TD  bgcolor="#1C83BD"><strong><font color="#ffffff" size="4"><?php echo $Tot_Finalizado;   ?></font></strong>	 </TD>
	 <TD > <img src="images/BarraVerde.png" height="25" width="<?php echo $Tot_Finalizado;   ?>" >	 </TD>
	 <TD > </TD>
	 </TR>
	 
	 
	
	
	</table>

      



</body>
</html>