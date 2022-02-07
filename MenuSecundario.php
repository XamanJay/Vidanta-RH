<?php 
//include 'Includes\PCI_EncabezadoConecta.php';

session_start();
$servername = "localhost";
$dbname = "deseocar_pcividantarm"; 
$username = "deseocar_root";
$password = "**********";

$Id_PCIdDatosPersonales = trim($_GET['Id_PCIdDatosPersonales']);
?>
<html><head><title>Documento sin t&iacute;tulo</title>
</head>

<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" vlink="ffffff">

<TABLE border="0" widTD="995" align="center">

<TR bgcolor="#1C83BD">
<TD  width="88"><font color="ffffff" >Datos Generales</font> </TD>
<TD width="90"><font color="ffffff" >Expectativas </font></TD>
<TD width="60"><font color="ffffff" >Estilo de Vida </font></TD>
<TD width="89"><font color="ffffff" >Datos Familiares </font></TD>
<TD width="98"><font color="ffffff" ><a href="PCI_Grid_NivelEstudios.php?Id_PCIdDatosPersonales=<?php echo $Id_PCIdDatosPersonales;?>" target="Cuerpazo">Estudios</a> </font></TD> 
<TD width="85"><font color="ffffff" >Referencias </font></TD>
<TD width="102"><font color="ffffff" ><a href="PCI_Grid_Idiomas.php?Id_PCIdDatosPersonales=<?php echo $Id_PCIdDatosPersonales;?>" target="Cuerpazo">Idiomas</a> </font></TD>
<TD width="74"><font color="ffffff" >Domicilios </font></TD>

 </TR>


</TABLE>

</body>
</html>
