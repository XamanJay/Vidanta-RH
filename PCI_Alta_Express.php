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
<TITLE>..: SAPCII :.. Sistema de Administraci&oacute;n del Plan de Carrera Interno e Indicadores. Vidanta </TITLE>
<meta name="description" content="Discover your happiness through the extraordinary world of Vidanta. Vidanta is a collection of luxury resorts, located in seven stunning destinations along the most beautiful beaches in Mexico.">
<meta name="keywords" content="Vidanta, vidanta, VIDANTA">
 <link rel="shortcut icon" href="images/ico/favicon.ico"></HEAD>
<BODY topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" >
<BR>

											<TABLE align="center" border="0"  >
											<FORM action="PCI_Grabar_Alta_Express.php" NAME= "FormAltas" method="post" >
											<TR>
											<TD align="center" colspan="4"><B> ALTA EXPRESS PCI </B></TD>
											</TR>
											
											
											<TR>
											<TD align="center" colspan="4">
											
										
											
											
											
											
											</TD>
											</TR>
											
											<TR>
											<TD>
											<B>Apellido Paterno</B>
											</TD>
											<TD> <Input type="text" name="ApellidoPaterno"  style="text-transform: uppercase" SIZE=50 MAXLENGTH=100 >  </TD>
											
											<TD>
											
											</TD>
											<TD>
											     
											</TD>
											
											
											</TR>
											
											<TR>
											<TD>
											<B>Apellido Materno</B>
											</TD>
											<TD colspan="2"> <input type="text" name="ApellidoMaterno" style="text-transform: uppercase" SIZE=50 MAXLENGTH=100>   </TD>
											</TR>
											
											<TR>
											<TD>
											<B>Nombre(s)</B> 
											</TD>
											<TD colspan="2"> <input type="text" name="Nombres" style="text-transform: uppercase" SIZE=50 MAXLENGTH=100  />   </TD>
											</TR>
											<TR>
											<TD>
											<B>N&uacute;mero de Colaborador</B>
											</TD>
											<TD>  <input type="text" name="NumeroColaborador" size="10"  />   </TD>
											</TR>
											
											<TR>
											<TD>
											<B>Puesto Solicitado </B>
											</TD>
											<TD>
											
											 <select name="Id_PCIcPuestos">
											 <option value=0 selected>-- Seleccionar Opcion --</option>
                                         <?php
												$cadenaSQL_Id_PCIcPuestos = "SELECT Id_PCIcPuestos, PCIcPuestos FROM pcicpuestos WHERE Activo = 1";
												$ResultSet_Id_PCIcPuestos = mysqli_query($Conn, $cadenaSQL_Id_PCIcPuestos);
												while($row = mysqli_fetch_assoc($ResultSet_Id_PCIcPuestos))
		      									{ 
                                         ?>                                          
                                          <option value=<?php echo $row["Id_PCIcPuestos"]; ?> >   <?php echo $row["PCIcPuestos"];  ?>  </option>                                          
                                         <?php  }   ?>                                                                                                                             
                                       </select>
											
											 </TD>
											</TR>
											<TR>
											<TD>
											<B>Estatus</B>
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
											<TD>
											
											</TD>
											<TD> 
											<p ALIGN="center"> &nbsp;
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
  
  
  if (FormAltas.ApellidoPaterno.value  == "")
  {
       alert("El campo de Apellido Paterno esta vacío, verifique por favor");
	   FormAltas.ApellidoPaterno.focus();
       return false;
  }
  
  if(jvi_texto_correcto.test(FormAltas.ApellidoPaterno.value)) {
       alert('Ha escrito un caracter no valido en el campo Apellido paterno, verifique por favor.');
	   FormAltas.ApellidoPaterno.focus();
       return false;    
    }
  
  
  
  
  
  
   if (FormAltas.ApellidoMaterno.value  == "")
  {
       alert("El campo de Apellido Materno esta vacío, verifique por favor");
	   FormAltas.ApellidoMaterno.focus();
       return false;
  } 
   if(jvi_texto_correcto.test(FormAltas.ApellidoMaterno.value)) {
       alert('Ha escrito un caracter no valido en el campo Apellido materno, verifique por favor.');
	   FormAltas.ApellidoMaterno.focus();
       return false;    
    }
  
  
  
  
  
  
  if (FormAltas.Nombres.value  == "")
  {
       alert("El campo de Nombre esta vacío, verifique por favor");
	    FormAltas.Nombres.focus();
       return false;
  }
   if(jvi_texto_correcto.test(FormAltas.Nombres.value)) {
       alert('Ha escrito un caracter no valido en el campo Nombre, verifique por favor.');
	    FormAltas.Nombres.focus();
       return false;   
    }
  
  
  
  
  
  if (FormAltas.NumeroColaborador.value  == "")
  {
       alert("El campo de Número de Colaborador esta vacío, verifique por favor");
	    FormAltas.NumeroColaborador.focus();
       return false;
  }
    if(jvi_numero_correcto.test(FormAltas.NumeroColaborador.value)) {
       alert('Ha escrito un caracter no valido en el campo Número de colaborador, verifique por favor.');
	    FormAltas.NumeroColaborador.focus();
       return false;   
    }
  
  
   /*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=Jaissiel VI <>}}}}}}*>=-=-=-=-=-=-=-=-=-=-=-=-*/
   
   		

     
	
	
	
	
	

   
 
   
   
   
   
   
   
   
    /*if(jvi_texto_correcto.test(FormAltas.Ciudad.value)) {
       alert('Ha escrito un caracter no valido en el campo Ciudad, verifique por favor.');
	    FormAltas.Ciudad.focus();
       return false;   
    }*/
	
	 /*if(jvi_texto_correcto.test(FormAltas.MunicipiooDel.value)) {
       alert('Ha escrito un caracter no valido en el campo Municipio o Del., verifique por favor.');
	    FormAltas.MunicipiooDel.focus();
       return false;   
    }*/
   
    /*if(jvi_texto_correcto.test(FormAltas.Nacionalidad.value)) {
       alert('Ha escrito un caracter no valido en el campo Nacionalidad, verifique por favor.');
	    FormAltas.Nacionalidad.focus();
       return false;   
    }*/
   
    
	
	/*if(jvi_textoynumero_correcto.test(FormAltas.CURP.value)) {
       alert('Ha escrito un caracter no valido en el campo CURP, verifique por favor.');
	    FormAltas.CURP.focus();
       return false;   
    }*/
   
   
  
   
   
    /*if(jvi_textoynumero_correcto.test(FormAltas.ClaveElector.value)) {
       alert('Ha escrito un caracter no valido en el campo Clave de elector , verifique por favor.');
	    FormAltas.ClaveElector.focus();
       return false;   
    }*/

   /*if(jvi_textoynumero_correcto.test(FormAltas.Licencia.value)) {
       alert('Ha escrito un caracter no valido en el campo Licencia, verifique por favor.');
	    FormAltas.Licencia.focus();
       return false;   
    }*/

   /*if(jvi_textoynumero_correcto.test(FormAltas.NoFiliacion.value)) {
       alert('Ha escrito un caracter no valido en el campo No. de filiacion, verifique por favor.');
	    FormAltas.NoFiliacion.focus();
       return false;   
    }*/

    /*if(jvi_texto_correcto.test(FormAltas.DependenciaFiliacion.value)) {
       alert('Ha escrito un caracter no valido en el campo Dependencia, verifique por favor.');
	    FormAltas.DependenciaFiliacion.focus();
       return false;   
    }*/

   
   /*if(jvi_textoynumero_correcto.test(FormAltas.CARdDatosPersonales.value)) {
       alert('Ha escrito un caracter no valido en el campo Observaciones, verifique por favor.');
	    FormAltas.CARdDatosPersonales.focus();
       return false;   
    }*/
   
   
   
   
   
   
   
   
   
 
   
   
/*  if (FormAltas.Fecha_IngresoPGR.value != "")
  {
	  if (!esFecha(FormAltas.Fecha_IngresoPGR.value,'E'))
	  {
		alert("El campo -Fecha de ingreso PGR- debe ser de tipo: DD/MM/AAAA");
		FormAltas.Fecha_IngresoPGR.focus();
		return false;
	  }	
  }
 
 
  if (FormAltas.FechaFiliacion.value != "")
  {
	  if (!esFecha(FormAltas.FechaFiliacion.value,'E'))
	  {
		alert("El campo - Fecha de filiación- debe ser de tipo: DD/MM/AAAA");
		FormAltas.FechaFiliacion.focus();
		return false;
	  }	
  }
  
  
  var FechaNacimiento = FormAltas.FechaNacimiento.value
  var Fecha_IngresoPGR = FormAltas.Fecha_IngresoPGR.value
  var FechaFiliacion = FormAltas.FechaFiliacion.value
    aFechaNacimiento = FechaNacimiento.substr(6,4)
*/	
	
    //alert(aFechaNacimiento)
	
	
/*   FechaNacimiento = Date.parse(FechaNacimiento)
   Fecha_IngresoPGR = Date.parse(Fecha_IngresoPGR)
   FechaFiliacion = Date.parse(FechaFiliacion)
   
   if (Fecha_IngresoPGR<=FechaNacimiento)
     {
		alert("La fecha de ingreso a la PGR no puede ser menor o igual a la fecha de nacimiento");
		FormAltas.Fecha_IngresoPGR.focus();
		return false;
	  }	
	  
	  
	if (FechaFiliacion<=FechaNacimiento)
     {
		alert("La fecha de filiación no puede ser menor o igual  a la fecha de nacimiento");
		FormAltas.Fecha_IngresoPGR.focus();
		return false;
	  }	
*/    
	
	
	
	   /*alert(FechaNacimiento)
		alert(Fecha_IngresoPGR)
		alert(FechaFiliacion)
		return false;*/
		
	
   
  
  
  
  
  
  	 
FormAltas.B1.disabled = true;  
document.FormAltas.submit();	  
   /*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=Jaissiel VI <>}}}}}}*>=-=-=-=-=-=-=-=-=-=-=-=-*/

}

</script>
