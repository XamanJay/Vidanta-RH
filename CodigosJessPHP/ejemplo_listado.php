<?php
	include("funciones.php");

     //FILTROS
          $v_NumMedico              = $_REQUEST['NumMedico'];
          $v_NumJuridico            = $_REQUEST['NumJuridico'];
          $v_fecha_registro_ini     = date($_REQUEST['fecha_registro_ini'], 'm-d-Y');
          $v_fecha_registro_fin     = date($_REQUEST['fecha_registro_fin'], 'm-d-Y');        
          $v_fecha_cMedico_ini      = date($_REQUEST['fecha_cMedico_ini'], 'm-d-Y');  
          $v_fecha_cMedico_fin      = date($_REQUEST['fecha_cMedico_fin'], 'm-d-Y');                     
          $v_asunto                 = $_REQUEST['asunto'];
          $v_forma_recep            = $_REQUEST['forma_recep'];          
          $v_servidor_publico       = $_REQUEST['servidor_publico'];
          
          
           //CONSULTOR MÉDICO
             if($v_NumMedico == 1 or $v_NumMedico == 0)
             {
                 $fCM = " ";
             }           
             else if($v_NumMedico > 1)
             {
                  $fCM = " and pa.id_user = ".$v_NumMedico." and pt.id_user = ".$v_NumMedico;
             }
        
             //CONSULTOR JURÍDICO
             if($v_NumJuridico == 1 or $v_NumJuridico == 0)
             {
                 $fCJ = " ";
             }           
             else if($v_NumJuridico > 1)
             {
                  $fCJ = "and pa.id_user = ".$v_NumJuridico." and pt.id_user = ".$v_NumJuridico;
             }
             
          
          //FECHA REGISTRO 
             if($v_fecha_registro_ini != '1900-01-01 00:00:00.000' and $v_fecha_registro_ini != NULL and $v_fecha_registro_ini != ' ' and
                $v_fecha_registro_fin != '1900-01-01 00:00:00.000' and $v_fecha_registro_fin != NULL and $v_fecha_registro_fin != ' ' )
             {
                 $FRG = "and fecha_registro between '".$v_fecha_registro_ini."' and '".$v_fecha_registro_fin."'";
             }
             else 
             {
                  $FRG = " ";
             }
             
             
           //FECHA CONSULTOR MÉDICO
             if($v_fecha_cMedico_ini != '1900-01-01 00:00:00.000' and $v_fecha_cMedico_ini != NULL and $v_fecha_cMedico_ini != ' ' and
                $v_fecha_cMedico_fin != '1900-01-01 00:00:00.000' and $v_fecha_cMedico_fin != NULL and $v_fecha_cMedico_fin != ' ' )
             {
                 $fCM = "and fecha_ingreso between '".$v_fecha_cMedico_ini."' and '".$v_fecha_cMedico_fin."' OR fecha_conclusion between '".$v_fecha_cMedico_ini."' and '".$v_fecha_cMedico_fin."'";
             }
             else 
             {
                 $fCM = " ";
             }
          
          //FECHA CONSULTOR JURÍDICO
             if($v_fecha_cJuridico_ini != '1900-01-01 00:00:00.000' and $v_fecha_cJuridico_ini != NULL and $v_fecha_cJuridico_ini != ' ' and
                $v_fecha_cJuridico_fin != '1900-01-01 00:00:00.000' and $v_fecha_cJuridico_fin != NULL and $v_fecha_cJuridico_fin != ' ' )
             {
                 $FCJ = "and fecha_ingreso between '".$v_fecha_cJuridico_ini."' and '".$v_fecha_cJuridico_fin."' OR fecha_conclusion between '".$v_fecha_cJuridico_ini."' and '".$v_fecha_cJuridico_fin."'";
             }
             else 
             {
                 $FCJ = " ";
             }
        
        //TIPO DE ASUNTO
             if($v_asunto > 0)
             {
                $TPA = " and ta.Id_tipo_asunto=".$v_asunto;
             }
             else
             {
                $TPA = " ";
             }
        //TIPO DE FORMA RECEPCION 
             if($v_forma_recep > 0)
             {
                $TFR = " and forma_recepcion=".$v_forma_recep;
             }
             else
             {
                $TFR = " ";
             }
        
        //NOMBRE DEL SERVIDOR PUBLICO
             if($v_servidor_publico != "")
             {
                $NSP = " and servidor_publico=".$v_servidor_publico;
             }
             else
             {
                $NSP = " ";
             }
        
          

    //Ejecucion de Querys
	$dbCon = conectasqlserver("BDSaqmed8");
    $sql_datosquenoserepiten = "select *
                    from maestro m 
                    where m.id_maestro in (3612,4940, 4556) ".$FRG.$TPA."
                    order by consecutivo, forma_recepcion,folio_atn, s.folio_expediente, s.anio_expediente";
        //echo $sql_datosquenoserepiten;
                $sql_etapas="";
                $options = array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                $params = array();  
                $resultado = sqlsrv_query($dbCon,$sql_datosquenoserepiten,$params,$options);
                $total_registros = sqlsrv_num_rows($resultado);

	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
		.Estilo1 {font-weight: bold}
		.Estilo2 {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 17px;
		}
		.CeldasTitulo1     { font-size: 12px; color:#FFF; font:bold; border:double; background-color:"#1C83BD"; text-align:center; }
		.CeldasTitulo      { font-size: 9px; color:#FFF; font:bold; }
		.Celdas            { font-size: 9px; }
		.FechasTitulo      { font-size: 12px; }
		.AnchoFechas       { width:"50"; text-align:center; }
		.AnchoNums         { width:"25"; text-align:center; }
		.AnchoTextoCorto   { width:"60"; }
		.AnchoTextoMediano { width:"100"; }
		.AnchoTextoAmplio  { width:"170"; }
</style>
<script LANGUAGE="JavaScript" src="..js/functions.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<link href="lib/default.css" rel="stylesheet" type="text/css" />
</head>
<body>
   
	<table width="1850" border="0" align="center" class="borde_inf">
		<tr>
			<td class="Estilo2 Estilo1" align="center">
				<strong> REPORTE DE SEGUIMIENTO</strong>
                <br>
		  </td>
		</tr>
        <tr>
        	<td class="FechasTitulo" align="right"><strong>Fecha del Reporte: </strong><?php echo date("d/m/Y");?></td>
        </tr>
	</table>
	
	<br>

		 <table border="0" align="center" width="1850">
            <tr align="left">             
                <td class="FechasTitulo" width="1050"><strong>Total de registros: </strong> <?php echo $total_registros; ?></td>
            </tr>
         </table>        
	    <table border="1" cellpadding="2" cellspacing="2" width="1850" align="center">     
        	<tr>
                <td class="CeldasTitulo1" colspan="3">INFORMACI&Oacute;N DEL ASUNTO</td>
                <td class="CeldasTitulo1" colspan="5">TIPO ASUNTO</td>
            </tr>       
            <tr bgcolor="#1C83BD">
                <td align="center" class="CeldasTitulo">Consecutivo</td>
                <td align="center" class="CeldasTitulo">Folio Exp.</td>
                <td align="center" class="CeldasTitulo">A&ntilde;o Exp.</td>
                <td align="center" class="CeldasTitulo">Fecha<br/>Registro</td>                
                <td align="center" class="CeldasTitulo">Tipo<br/>de<br/>Asunto</td>
                <td align="center" class="CeldasTitulo">Forma<br/>de<br/>Recepci&oacute;n</td>
                <td align="center" class="CeldasTitulo">Servidor<br/>P&uacute;blico</td>
            </tr>
            <?php
            
            	while ($row = sqlsrv_fetch_array($resultado)) {
            	
            ?>

								<tr>
                                    <td class="Celdas AnchoNums" ><?php echo $row['consecutivo'];?></td>
                                    <td class="Celdas AnchoNums" ><?php echo $row['folio_expediente'];?></td>
                                    <td class="Celdas AnchoNums" ><?php echo $row['anio_expediente'];?></td>                           
                                    <td class="Celdas AnchoFechas" ><?php echo $row['fecha_registro']; ?></td>
                                    <td class="Celdas AnchoTextoCorto" ><?php echo $row['tipo_asunto']; ?></td>
                                    <td class="Celdas AnchoTextoCorto" ><?php echo $row['forma_recepcion']; ?></td>					
                                    <td class="Celdas AnchoTextoAmplio" ><?php echo $row['servidor_publico']; ?></td>
								</tr>
			<?php
				}
			?>							
        </td>
    </tr>
</table>
<br/>
<table border="0" cellpadding="2" cellspacing="2" width="750" align="center">
	<tr>
		<td align="center"><input type="button" value=":: Imprimir ::" onClick="javascript:window.print();" align="middle"></td>
        <td align="center"><input type="button" value=":: Cancelar ::" onClick="javascript:limpiar();" align="middle"></td>
	</tr>
</table>
<script language="javascript">
function limpiar()
		{    
			 window.location.href='http://om/saqm/comunes/limpia_atencion.php?archivo=http://om/saqm/inicio.php';
		}

/*PARA IMPLEMENTAR DESPUÉS NO BORRAR*/
function consultar(id_salida_generada)
		{
			window.open('http://om/saqm/comunes/consulta_salida.php?id_salida_generada='+id_salida_generada,'','scrollbars=yes,height=600,width=800,location=no,directories=no,status=no,menubar=yes,toolbar=yes,resizable=yes')
		}
	
</script>	
</body>
</html>