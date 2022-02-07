<?php

//include 'Includes\PCI_EncabezadoConecta.php';

session_start();
$servername = "localhost";
$dbname = "deseocar_pcividantarm"; 
$username = "deseocar_root";
$password = "**********";



$Conn = mysqli_connect($servername, $username, $password, $dbname);
// 
if (!$Conn) {
	  		die("Connection failed: " . mysqli_connect_error());
		    }

$cadenaSQL = "SELECT Id_PCIcStatus, PCIcStatus FROM PCIcStatus WHERE Activo = 1";
$ResultSet = mysqli_query($Conn, $cadenaSQL);


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
    echo "0 results";
}

//ojo con esto cierras la coneccion --->    mysqli_close($Conn);
?>   


<HTML><HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<TITLE>Alta Express de nuevo registro de PCI</TITLE>
</HEAD>
<BODY topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" >
<BR>

											<TABLE align="center" border="0"  >
											<FORM target="Cuerpazo_uno" action="PCI_Grid_Resultados_x_Estatus.php" NAME= "FormAltas" method="post" >
											<TR>
											<TD align="center" colspan="4"><B> CONSULTA POR &quot; STATUS &quot; </B></TD>
											</TR>
											
											
											<TR>
											<TD align="center" colspan="4">
											
											</TD>
											</TR>
											
											<TR>
											<TD>
											<B>Status:&nbsp;&nbsp;</B>
											</TD>
											<TD> 
											
											
											<select name="Id_PCIcStatus">
                                          <option value=0 selected>-- Seleccionar Opcion --</option>
                                         <?php
												$cadenaSQL_Id_PCIcStatus = "SELECT Id_PCIcStatus, PCIcStatus FROM pcicstatus WHERE Activo = 1";
												$ResultSet_Id_PCIcStatus = mysqli_query($Conn, $cadenaSQL_Id_PCIcStatus);
												while($row = mysqli_fetch_assoc($ResultSet_Id_PCIcStatus))
		      									{ 
                                         ?>                                          
                                          <option value=<?php echo $row["Id_PCIcStatus"]; ?> >   <?php echo $row["PCIcStatus"];  ?>  </option>                                          
                                         <?php  }   ?>                                                                                                                             
                                       </select>
										
											  </TD>
											</TR>
											
											<TR>
											<TD> &nbsp;&nbsp;</TD>
											<TD> </TD>
											</TR>
											
											
											
											
											
											<TR>
											<TD>
											
											</TD>
											<TD> 
											<p ALIGN="center"> &nbsp;
											  <INPUT TYPE="button" VALUE=" :: F I L T R A R :: " NAME="B1" onClick="ValidaCampos()">&nbsp;&nbsp;&nbsp; 
											  <INPUT TYPE="reset" VALUE=" :: LIMPIAR ::" NAME="B2"> &nbsp;&nbsp;&nbsp; 
											  </p>
											
										
											 </TD>
											</TR>
											
											</FORM>
											</TABLE>
											




</BODY></HTML>




<script Language="JavaScript"> 
function ValidaCampos()
{
  
     /*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=Jaissiel VI <>}}}}}}*>=-=-=-=-=-=-=-=-=-=-=-=-*/

        var jvi_texto_correcto = /[\d\'\"\(\)\%\$\!\#\&\<\>\+\*\=\?\¿\¡\[\]\{\}\/\@]/
		var jvi_numero_correcto = /[\D\'\"\(\)\%\$\!\#\&\<\>\+\*\=\?\¿\¡\[\]\{\}\/\@]/
		var jvi_textoynumero_correcto = /[\'\"\(\)\%\$\!\#\&\<\>\+\*\=\?\¿\¡\[\]\{\}\/\@]/
  
  
   
   
   /*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=Jaissiel VI <>}}}}}}*>=-=-=-=-=-=-=-=-=-=-=-=-*/
   
   		

       
  
  
  
  
  	 
// FormAltas.B1.disabled = true;  
document.FormAltas.submit();	  
   /*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=Jaissiel VI <>}}}}}}*>=-=-=-=-=-=-=-=-=-=-=-=-*/

}

</script>
