<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<!--<title>Reporte de Gestiones Inmediatas Realizadas</title>-->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
	<script type="text/javascript" src="js/functions.js"></script>
    <link type="text/css" rel="stylesheet" href="src/css/jscal2.css" />
    <link type="text/css" rel="stylesheet" href="src/css/border-radius.css" />
    <link id="skin-steel" title="Steel" type="text/css" rel="alternate stylesheet" href="src/css/steel/steel.css" />
    
    <script src="src/js/jscal2.js"></script>
    <script src="src/js/unicode-letter.js"></script>
    
    <!-- you actually only need to load one of these; we put them all here for demo purposes -->
    <script src="src/js/lang/es.js"></script>
    
    <!-- this must stay last so that English is the default one -->
    <script src="src/js/lang/en.js"></script>
    <script type="text/javascript" src="js/DateCalender.js"></script>

<body>
<?php	
$v_fecha_ini=date(d)."/".date(m)."/".date(Y);
$v_fecha_fin=date(d)."/".date(m)."/".date(Y);
//echo print_r($_SESSION);
include("funciones.php");
$dbCon = $dbCon = conectasqlserver("BDSaqmed8");
?>   
<style type="text/css">
	<!--
	.Estilo1 {font-weight: bold}
	.Estilo2 {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 17px;
	}
	-->
</style>
<br/>
 
<script language="javascript">

	function validaFecha(fechaini,fechafin) 
	{
		var validaFecha = false;
	
			var fechaIniVal = fechaini;
			var fechaFinVal = fechafin;
	
			var inicio = fechaIniVal.split("/");
			var fin = fechaFinVal.split("/");
			
			if(inicio[2] < fin[2])
				{
					validaFecha = true;
				}
				else if(inicio[2] > fin[2])
				{
					validaFecha = false;
				}
				else if(inicio[2] == fin[2])
				{
					if(inicio[1] < fin[1])
					{
						validaFecha = true;
					}
					else if(inicio[1] > fin[1])
					{
						validaFecha = false;
					}
					else if(inicio[1] == fin[1])
					{
						if(inicio[0] <= fin[0])
						{
							validaFecha = true;
						}
						else if(inicio[0] > fin[0])
						{
							validaFecha = false;
						}
					}
				}
		return validaFecha;
	}
 

	function valida()
	{ 
		if(document.form1.fecha_ini.value == '')
		{
			alert("Favor de seleccionar una Fecha Inicial");
			document.form1.f_FechaInicio.focus(); 
			return 0; 
		}
		else if(document.form1.fecha_fin.value == '')
		{
			alert("Favor de seleccionar una Fecha Final");
			document.form1.f_FechaFin.focus(); 
			return 0; 
		}
		else if(!validaFecha(document.form1.fecha_ini.value, document.form1.fecha_fin.value ))
		{
			alert("La Fecha Inicial debe ser menor o igual a la Fecha Final");
			document.form1.f_FechaInicio.focus(); 
			return 0;
		}
		else
			document.form1.submit();
	}
</script> 
<form action="ejemplo_listado.php" method="POST" name="form1" >

<?php
/*if (conecta_sql2($link))
{*/
?>
    <table width="750" border="0" cellpadding="3" cellspacing="2" bordercolor="6699CC" align="center" >
    	<tr>
        	<td>
            	  <br/>
                  <table width="750" border="1" align="center"  class="borde_inf">
                     <tr>
                        <td class="Estilo2 Estilo1" align="center">
                            <br/>
                            <strong>REPORTE DE SEGUIMIENTO</strong>
                         </td>
                    </tr>
                  </table>
                  <br/><br/>
                
                  <table width="500" border="1" align="center" bgcolor="#FFFFFF" bordercolor="6699CC" cellpadding="2">
                            <tr bgcolor="#6699CC">
                                <td align="center" colspan="6"><strong>REPORTE DE SEGUIMIENTO</strong></td>
                            </tr>    
                            <tr>
                                <td bgcolor="#DAE4F3" style="border:hidden"><strong><br/>
                                &nbsp;Consultor M&eacute;dico<br/>
                                <br/></strong></td>
                                <td colspan="2"><select id="NumMedico" name="NumMedico">
                                  <option value="0" selected> -- Selecciona una opci&oacute;n -- </option>
                                  <option value="1">Todos</option>
                                  <option value="2">Dr. Ricardo </option>
                                  <option value="3">Dr. Fernando </option>
                                  <option value="4">Dr. Arturo </option>
                                </select>                                  
                                </td>
                            
                                <td bgcolor="#DAE4F3" style="border:hidden"><strong><br/>
                                &nbsp;Consultor Jur&iacute;dico<br/>
                                <br/></strong></td>
                                <td colspan="2"><select id="NumJuridico" name="NumJuridico">
                              <option value="0" selected> -- Selecciona una opci&oacute;n -- </option>
                                      <option value="1">Todos</option>
                                      <option value="2">Lic. Alejandra </option>	
                                      <option value="3">Lic. Juan </option>
                                 	</select>
                                     <br/>
                                </td>
                            </tr>                                     
                            <tr>	
                                <td bgcolor="#DAE4F3"><strong><br/><br/>
                                Fecha de Registro<br/><br/><br/></strong></td>
                                <td align="center" colspan="1">
                                            <strong><br/>Inicial<br/></strong>
                                            <input id="fecha_registro_ini" name="fecha_registro_ini" type="text" size="10" maxlength="10" readonly >&nbsp;<button id="f_FechaRegistroInicio">...</button>
                                                    <script type="text/javascript">
                                                              RANGE_CAL_FechaRegistroInicio = new Calendar({
                                                                      inputField: "fecha_registro_ini",
                                                                      dateFormat: "%d-%m-%Y",
                                                                      trigger: "f_FechaRegistroInicio",
                                                                      bottomBar: false,
                                                                      opacity: 3,
                                                                      onSelect: function() {
                                                                              this.hide();
                                                                      }
                                                              });
                                                              RANGE_CAL_FechaRegistroInicio.setLanguage('es');
                                                      </script>
                                             <br/>
                                </td>       
                                <td align="center" colspan="1">
                                            <strong><br/>Final<br/></strong>
                                            <input id="fecha_registro_fin" name="fecha_registro_fin" type="text" size="10" maxlength="10" readonly >&nbsp;<button id="f_FechaRegistroFin">...</button>
                                                    <script type="text/javascript">
                                                              RANGE_CAL_FechaRegistroFin = new Calendar({
                                                                      inputField: "fecha_registro_fin",
                                                                      dateFormat: "%d-%m-%Y",
                                                                      trigger: "f_FechaRegistroFin",
                                                                      bottomBar: false,
                                                                      opacity: 3,
                                                                      onSelect: function() {
                                                                              this.hide();
                                                                      }
                                                              });
                                                              RANGE_CAL_FechaRegistroFin.setLanguage('es');
                                                            </script>
                                            <br/>
                                  </td> 
                           	
                                <td bgcolor="#DAE4F3"><strong><br/><br/>
                                Fecha en la que trabaj&oacute; Consultor M&eacute;dico<br/>
                                <br/><br/></strong></td>
                                <td align="center" colspan="1">
                                            <strong><br/>Inicial<br/></strong>
                                            <input id="fecha_cMedico_ini" name="fecha_cMedico_ini" type="text" size="10" maxlength="10" readonly >&nbsp;<button id="f_FechacMedicoInicio">...</button>
                                                    <script type="text/javascript">
                                                              RANGE_CAL_FechacMedicoInicio = new Calendar({
                                                                      inputField: "fecha_cMedico_ini",
                                                                      dateFormat: "%d-%m-%Y",
                                                                      trigger: "f_FechacMedicoInicio",
                                                                      bottomBar: false,
                                                                      opacity: 3,
                                                                      onSelect: function() {
                                                                              this.hide();
                                                                      }
                                                              });
                                                              RANGE_CAL_FechacMedicoInicio.setLanguage('es');
                                                            </script>
                                             <br/>
                                </td>       
                                <td align="center" colspan="1">
                                            <strong><br/>Final<br/></strong>
                                            <input id="fecha_cMedico_fin" name="fecha_cMedico_fin" type="text" size="10" maxlength="10" readonly >&nbsp;<button id="f_FechacMedicoFin">...</button>
                                                    <script type="text/javascript">
                                                              RANGE_CAL_FechacMedicoFin = new Calendar({
                                                                      inputField: "fecha_cMedico_fin",
                                                                      dateFormat: "%d-%m-%Y",
                                                                      trigger: "f_FechacMedicoFin",
                                                                      bottomBar: false,
                                                                      opacity: 3,
                                                                      onSelect: function() {
                                                                              this.hide();
                                                                      }
                                                              });
                                                              RANGE_CAL_FechacMedicoFin.setLanguage('es');
                                                            </script>
                                            <br/>
                                  </td> 
                            </tr>
                              <tr>
                                <td bgcolor="#DAE4F3" style="border:hidden"><strong><br/>
                                Tipo de Asunto<br/><br/></strong></td>
                                <td colspan="2">
                                	<br/>
                                    <select id="asunto" name="asunto">
                                          <option value=0 selected>-- Todos los asuntos --</option>
                                         <?php
												$sqlTA="select Id_tipo_asunto, Nombre_tipo_asunto
														from tipo_asunto
														where Estado ='A' ";
												$q_TA=sqlsrv_query($dbCon,$sqlTA);
												while ($registroTA = sqlsrv_fetch_array($q_TA))
		      									{ 
                                          ?>                                          
                                          		<option value=<?php echo $registroTA['Id_tipo_asunto']; ?>> <?php echo $registroTA['Nombre_tipo_asunto'];  ?></option>                                          
                                          <?php 
												}
											
										  ?>                                                                                                                             
                                     </select>
                                     <br/>
                                </td>
                            
                                <td bgcolor="#DAE4F3" style="border:hidden"><strong><br/>
                                Forma Recepci&oacute;n<br/>
                                <br/></strong></td>
                                <td colspan="2">
                                	<br/>
                                    <select id="forma_recep" name="forma_recep">
                                          <option value=0 selected>-- Todos las formas --</option>
                                          <?php
												$sqlFR="select Id_forma_recepcion, Descripcion_forma_recepcion
														from forma_recepcion
														where Estado ='A' ";
												$q_FR=sqlsrv_query($dbCon,$sqlFR);
												while ($registroFR = sqlsrv_fetch_array($q_FR))
		      									{ 
                                          ?>                                          
                                          		<option value=<?php echo $registroFR['Id_forma_recepcion']; ?>> <?php echo $registroFR['Descripcion_forma_recepcion'];  ?></option>                                          
                                          <?php 
												}
											
										  ?>
                                     </select>
                                     <br/>
                                </td>
                            </tr>
                            <tr>
                            	 <td bgcolor="#DAE4F3"><strong>Nombre del Servidor P&uacute;blico<br/></strong></td>
                                 <td align="left" colspan="5">
                                 	<label><input type="text" name="servidor_publico" id="servidor_publico" size="50" maxlength="50" ></label>
                                 </td>                                 
                            </tr>   
                    </table>
                    <table width="500" border="0" align="center" >
                  <tr>
                            <td align="center"><br/><br/><input type="submit" value=":: Consultar ::" onclick="valida();">
                                &nbsp;&nbsp;&nbsp;
                                <input type="button" name="Cancelar" value=":: Cancelar ::" onClick="javascript:window.location.href='http://om/saqm/comunes/limpia_atencion.php?archivo=http://om/saqm/inicio.php';">
                                <br/><br/>
                            </td>
                        </tr>
                     </table>
          		</td>
			</tr>      
    </table>
<?php  //}   ?>    
</form>    
</body>

</html>

