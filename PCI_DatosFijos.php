<?php 
//include 'Includes\PCI_EncabezadoConecta.php';

session_start();
$servername = "localhost";
$dbname = "deseocar_pcividantarm"; 
$username = "deseocar_root";
$password = "**********";

$Id_PCIdDatosPersonales = trim($_GET['Id_PCIdDatosPersonales']);
//echo $Id_PCIdDatosPersonales;
$Conn = mysqli_connect($servername, $username, $password, $dbname);
$cadenaSQL = "SELECT * FROM vista_pciddatospersonales_pcicstatus  WHERE Id_PCIdDatosPersonales =  $Id_PCIdDatosPersonales";
$ResultSet = mysqli_query($Conn, $cadenaSQL);
$registro = mysqli_fetch_assoc($ResultSet);

?>
<HTML><HEAD><TITLE>Datos Fijos</TITLE></HEAD><BODY topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" >
											<TABLE width="800"  border="0" align="center"   >
																						
											<TR>
											
											<TD width="159"  rowspan="6">
											<img src="Mujer01.PNG" width="100" height="100">	</TD> 
											
											<TD width="35"  rowspan="6">&nbsp;&nbsp;</TD> 
											</TR>
											
											
											<TR>
											<TD bgcolor="#1C83BD"  width="216" ><B>Nombre : </B>	</TD>
											<TD width="372" > <?php  echo strtoupper( $registro['Nombres']." " .$registro['ApellidoPaterno'] ." ". $registro['ApellidoMaterno']);?> </TD>
											</TR>
											
											<TR>
											<TD bgcolor="#1C83BD" >
											<B>N&uacute;mero de Colaborador : </B>											</TD>
											
											<TD ><?php  echo $registro['NumeroColaborador']; ?>  </TD>
											</TR>
											
											
											<TR>
											<TD bgcolor="#1C83BD">
											<B>Puesto Actual : </B>
											</TD>
											<TD>&nbsp;    </TD>
											</TR>
											
											
											<TR>
											<TD bgcolor="#1C83BD">
											<B>Estatus : </B>
											</TD>
											<TD ><?php echo strtoupper( $registro['PCIcStatus']); ?>     </TD>
											</TR>
											
											</TABLE>
											




</BODY></HTML>


