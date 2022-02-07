<?php

$Id_PCIdDatosPersonales = trim($_GET['Id_PCIdDatosPersonales']);
//echo $Id_PCIdDatosPersonales;

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

$cadenaSQL = "SELECT Id_PCIcStatus, PCIcStatus FROM pcicstatus WHERE Activo = 1";
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
<BODY topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" background="ImagenesVidanta/LOGOLOCO03(1000x400)(SinFondo_10opacidad).png" >
<BR>

											<TABLE align="center" border="0"  >
											<FORM action="PCI_Grabar_Alta_Idiomas.php" NAME= "FormAltas" method="post" >
											<TR>
											<TD align="center" colspan="2"><B> ALTA IDIOMAS </B></TD>
											</TR>
											
											
											<TR>
											<TD>
											<B>Idioma </B>
											</TD>
											<TD>
											
											 <select name="Id_PCIcIdiomas">
											 <option value=0 selected>-- Seleccionar Opcion --</option>
                                         <?php
												$cadenaSQL_Id_PCIcIdiomas = "SELECT Id_PCIcIdiomas, PCIcIdiomas FROM pcicidiomas WHERE Activo = 1";
												$ResultSet_Id_PCIcIdiomas = mysqli_query($Conn, $cadenaSQL_Id_PCIcIdiomas);
												while($row = mysqli_fetch_assoc($ResultSet_Id_PCIcIdiomas))
		      									{ 
                                         ?>                                          
                                          <option value=<?php echo $row["Id_PCIcIdiomas"]; ?> >   <?php echo $row["PCIcIdiomas"];  ?>  </option>                                          
                                         <?php  }   ?>                                                                                                                             
                                       </select>
											
											 </TD>
											</TR>
											
											<TR>
											<TD>
											<B>Habla</B>											</TD>
											<TD> <Input type="text" name="Habla"  style="text-transform: uppercase" SIZE=10 MAXLENGTH=3 >%  </TD>
											
											
											
											
											</TR>
											
											<TR>
											<TD>
											<B>Lee</B>
											</TD>
											<TD > <input type="text" name="Lee" style="text-transform: uppercase" SIZE=10 MAXLENGTH=3>%  </TD>
											</TR>
											
											<TR>
											<TD>
											<B>Escribe</B> 
											</TD>
											<TD > <input type="text" name="Escribe" style="text-transform: uppercase" SIZE=10 MAXLENGTH=3  />%   </TD>
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
  
  
  if (FormAltas.Habla.value  == "")
  {
       alert("El campo de Habla esta vacío, verifique por favor");
	   FormAltas.Habla.focus();
       return false;
  }
  
  if(jvi_numero_correcto.test(FormAltas.Habla.value)) {
       alert('Ha escrito un caracter no valido en el campo Habla, verifique por favor.');
	   FormAltas.Habla.focus();
       return false;    
    }
  
  
  
  
  
  
   if (FormAltas.Lee.value  == "")
  {
       alert("El campo de Lee esta vacío, verifique por favor");
	   FormAltas.Lee.focus();
       return false;
  } 
   if(jvi_numero_correcto.test(FormAltas.Lee.value)) {
       alert('Ha escrito un caracter no valido en el campo Lee, verifique por favor.');
	   FormAltas.Lee.focus();
       return false;    
    }
  
  
  
  
  
  
  if (FormAltas.Escribe.value  == "")
  {
       alert("El campo de Escribe esta vacío, verifique por favor");
	    FormAltas.Escribe.focus();
       return false;
  }
   if(jvi_numero_correcto.test(FormAltas.Escribe.value)) {
       alert('Ha escrito un caracter no valido en el campo Escribe, verifique por favor.');
	    FormAltas.Escribe.focus();
       return false;   
    }
  
  
  
  
  
 
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
