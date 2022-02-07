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
// 
if (!$Conn) {
	  		die("Connection failed: " . mysqli_connect_error());
		    }

$cadenaSQL = "SELECT Id_PCIcStatus, PCIcStatus FROM  pcicstatus WHERE Activo = 1";
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
<TITLE>Alta Nivel de Estudios</TITLE>
</HEAD>
<BODY topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" background="ImagenesVidanta/LOGOLOCO03(1000x400)(SinFondo_10opacidad).png" >
<BR>

											<TABLE align="center" border="0"  >
											<FORM action="PCI_Grabar_Alta_NivelEstudios.php" NAME= "FormAltas" method="post" >
											<TR>
											<TD align="center" colspan="2"><B> ALTA NIVEL DE ESTUDIOS </B></TD>
											</TR>
											
											
											<TR>
											<TD>
											<B>Nivel </B>
											</TD>
											<TD>
											
											 <select name="Id_PCIcNivelEstudios">
											 <option value=0 selected>-- Seleccionar Opcion --</option>
                                         <?php
												$cadenaSQL_Id_PCIcNivelEstudios = "SELECT Id_PCIcNivelEstudios, PCIcNivelEstudios FROM pcicnivelestudios WHERE Activo = 1";
												$ResultSet_Id_PCIcNivelEstudios = mysqli_query($Conn, $cadenaSQL_Id_PCIcNivelEstudios);
												while($row = mysqli_fetch_assoc($ResultSet_Id_PCIcNivelEstudios))
		      									{ 
                                         ?>                                          
                                          <option value=<?php echo $row["Id_PCIcNivelEstudios"]; ?> >   <?php echo $row["PCIcNivelEstudios"];  ?>  </option>                                          
                                         <?php  }   ?>                                                                                                                             
                                       </select>
											
											 </TD>
											</TR>
											
											<TR>
											<TD>
											<B>Observaciones</B>
											</TD>
											<TD>   <TEXTAREA NAME='Observaciones' SIZE=10  style="text-transform: uppercase" ROWS=5 COLS=47> </TEXTAREA>   </TD>
											</TR>
											
											
											
											
											
											
											<TR>
											<TD>
											
											</TD>
											<TD> 
											<p ALIGN="center"> &nbsp;
											 
											  <INPUT TYPE="Hidden" NAME='Id_PCIdDatosPersonales' Value = '<?php echo $Id_PCIdDatosPersonales; ?>'>
											  <INPUT TYPE="button" VALUE="Enviar" NAME="B1" onClick="ValidaCampos()">&nbsp;&nbsp;&nbsp; 
											  <INPUT TYPE="reset" VALUE="Restablecer" NAME="B2"> &nbsp;&nbsp;&nbsp; 
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
  
  
  
  
 
    if(jvi_textoynumero_correcto.test(FormAltas.Observaciones.value)) {
       alert('Ha escrito un caracter no valido en el campo Observaciones, verifique por favor.');
	    FormAltas.Observaciones.focus();
       return false;   
    }
  
  
   /*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=Jaissiel VI <>}}}}}}*>=-=-=-=-=-=-=-=-=-=-=-=-*/
   
   	  
  
  	 
FormAltas.B1.disabled = true;  
document.FormAltas.submit();	  
   /*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=Jaissiel VI <>}}}}}}*>=-=-=-=-=-=-=-=-=-=-=-=-*/

}

</script>

