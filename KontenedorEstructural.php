<?php   $Id_PCIdDatosPersonales = trim($_GET['Id_PCIdDatosPersonales'])   ?>

<html><head><title>KontenedorEstructural</title></head><body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<!--<p>&nbsp;</p>  <p>&nbsp;</p>-->

<TABLE align="center" border="0">
<TR><TD>
<iframe align="middle" name="Encabezado" allowtransparency="yes" frameborder="0" src="PCI_DatosFijos.php?Id_PCIdDatosPersonales=<?php echo $Id_PCIdDatosPersonales;?>" height="150" width="1000">  	</iframe>
</TD></TR>
<TR><TD>

<iframe align="middle" name="Menus" allowtransparency="yes" frameborder="0" src="MenuPrincipal.php?Id_PCIdDatosPersonales=<?php echo $Id_PCIdDatosPersonales;?>" height="45" width="1000">  	</iframe>
</TD></TR>
<TR><TD>

<iframe align="middle" name="Submenus" allowtransparency="yes" frameborder="0" src="MenuSecundario.php?Id_PCIdDatosPersonales=<?php echo $Id_PCIdDatosPersonales;?>" height="45" width="1000">  	</iframe>
</TD></TR>
<TR><TD>

<iframe align="middle" name="Cuerpazo" allowtransparency="yes" frameborder="0" src="PCI_PaginaenFondoVidanta.php?Id_PCIdDatosPersonales=<?php echo $Id_PCIdDatosPersonales;?>" height="400" width="1000">  	</iframe>
</TD></TR>
</TABLE>


											 
											
											
											
										
										
										
											
											




</body>
</html>
