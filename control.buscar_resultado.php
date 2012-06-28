<?
error_reporting(0);
include("conexion.php");
include("top.php");
date_default_timezone_set('America/Mexico_City');
$sql_datos = mysql_query("SELECT id_demanda, no_nomina, fecha_inicio, fecha_cierre,id_abogado_asignado, abogado_externo,  abogado_ci, fecha_asignacion, id_empresa, empresa, gerente, proceso, actor, demandado, expediente,  fecha_junta, comentarios, estado, entidad, observacion, resolucion, id_estatus_proceso,pago FROM vista_legal_principal WHERE id_demanda = '$id_demanda' or expediente = '$expediente'");
$num=mysql_num_rows($sql_datos);
if ($num == "0") {
	echo "<br><br><br><div style='height:120px; valign='bottom'>No se encontro el registro buscado.</div>";
}else{
while ($reg=mysql_fetch_array($sql_datos)) {
?>
<input type="hidden" value="<? echo $demandado;?>" id="demandado">
<link rel="stylesheet" type="text/css" href="css/nueva.css">
<div id="aviso" style="font-size:18px"> <strong></strong></div>
<div style="background:white;margin:10px auto; border:1px solid #ccc; width=auto;">
<table align="center" width="100%">
	<tr>
		<th colspan="4"> REGISTRO ENCONTRADO</th>
		<th><img style="cursor:pointer;" id="close" src="img/cerrar.jpg" align="center" width="15" height="15" alt="Cerrar" title="Cerrar"> </th>
	</tr>
	<tr height="50px">
		<td width="10%" align="right"> ID del Sistema:</td>
		<td align="left" width="10%">
			<input size="30" id="id"  style="text-align:center;" type="text" value="<? echo $reg['id_demanda'];?>" readonly="readonly">
		</td>
		<td width="15%" align="right">No. Nomina: </td>
		<td width="10%">
			<input size="30" id="no_nomina" style="text-align:center;" type="text" readonly="readonly" value="<? echo $reg['no_nomina'];?>"></td> 
		<td width="5%"></td>
	</tr>
	<tr height="30px">
		<td width="10%" align="right"> Actor:</td>
		<td width="10%">
			<input size="30" style="text-align:center;" type="text" value="<? echo $reg['actor'];?>" readonly="readonly">
		</td>
		<td width="15%" align="right">Empresa : </td>
		<td width="10%"><input size="30"  style="text-align:center;" type="text" readonly="readonly" value="<? echo $reg['empresa'];?>"></td> 
		<td width="5%"></td>
	</tr>
	<tr height="50px">
		<td width="10%" align="right"> Demandado:</td>
		<td width="10%">
			<input size="30" type="text" style="text-align:center;"  value="<? echo $reg['demandado'];?>" readonly="readonly">
		</td>
		<td width="15%" align="right">Expediente : </td>
		<td width="10%"><input size="30" readonly="readonly"  style="text-align:center;" type="text" id="expedientedos" value="<? echo $reg['expediente'];?>"></td> 
		<td width="5%"></td>
	</tr>
		<tr height="50px">
		<td width="10%" align="right"> Fecha de apertura:</td>
		<td width="10%">
			<input size="30" type="text" style="text-align:center;"  value="<? echo convierte_f($reg['fecha_inicio']);?>" readonly="readonly">
		</td>
		<td width="15%" align="right">Fecha de Cierrre : </td>
		<td width="10%"><input size="30" id="fecha_cierre"  style="text-align:center;" type="text" readonly="readonly" value="<? echo comprobar_f($reg['fecha_cierre']);?>"></td> 
		<td width="5%"></td>
	</tr>
		<tr height="50px">
		<td width="10%" align="right"> Abogado de CI:</td>
		<td width="10%">
			<input size="30" type="text" style="text-align:center;"  value="<? echo $reg['abogado_ci'];?>" readonly="readonly">
		</td>
		<td width="15%" align="right">Abogado Asignado : </td>
		<td width="10%">
		<?
		if($reg['id_abogado_asignado']!=1){
			?>
			<input type="text" readonly="readonly" style="text-align:center;" size="30" value="<?echo $reg['abogado_externo'];?>">
			<input type="hidden" id="abogado_asignado" value="" >
			<?
		}else{
			?>
		<select style="width:218px;text-align:center;background:rgb(250,250,250);" id="abogado_asignado">
			<?
		$sql_abo=mysql_query("SELECT idadm_tbl_user,concat(nombre,' ',ap_pat_) as nombre FROM legal_user WHERE tipo_usuario IN (3,4) ");
		while ($row=mysql_fetch_array($sql_abo)) {
			if ($reg['id_abogado_asignado']==$row['idadm_tbl_user']) {
			?><option selected="selected" value="<? echo $row['idadm_tbl_user'];?>"><? echo $row['nombre'];?></option><?
			}else{
				?><option value="<? echo $row['idadm_tbl_user'];?>"><? echo $row['nombre'];?></option><?
			}
		}
	}

		?>
		</select>
		</td> 
		<td width="5%"></td>
	</tr>
		<tr height="50px">
		<td width="10%" align="right"> Gerente:</td>
		<td width="10%">
			<input size="30" type="text" style="text-align:center;"  value="<? echo $reg['gerente'];?>" readonly="readonly">

		</td>
		<td width="15%" align="right">Proceso : </td>
		<td width="10%">
		
			<?
		if($reg['id_estatus_proceso']==2){
			?><input size="30" type="text" style="text-align:center;"  value="<? echo $reg['proceso'];?>" readonly="readonly">
			<input type="hidden" value="" id="proceso">
			<?
		}else{
			?>
			<select style="width:218px;text-align:center;background:rgb(250,250,250);" id="proceso">
			<?
		$sql_proceso=mysql_query("SELECT id_proceso,proceso FROM legal_estatus_proceso");
		while ($row=mysql_fetch_array($sql_proceso)) {
			if ($reg['id_estatus_proceso']==$row['id_proceso']) {
			?><option selected="selected" value="<? echo $row['id_proceso'];?>"><? echo $row['proceso'];?></option><?
			}else{
				?><option value="<? echo $row['id_proceso'];?>"><? echo $row['proceso'];?></option><?
			}
		}
	}
		?>
		</select>

		</td> 
		<td width="5%"></td>
	</tr>

	</tr>
		<tr height="50px">
		<td width="10%" align="right"> Estado :</td>
		<td width="10%">
			<input size="30" type="text" style="text-align:center;"  value="<? echo $reg['estado'];?>" readonly="readonly">
		</td>
		<td width="15%" align="right"> Entidad : </td>
		<td width="10%"><input size="30"  style="text-align:center;" type="text" readonly="readonly" value="<? echo $reg['entidad'];?>"></td> 
		<td width="5%"></td>
	</tr>

	</tr>
		<tr height="50px">
		<td width="10%" align="right"> Ultima Junta:</td>
		<td width="10%">
			<input size="30" type="text" style="text-align:center;" readonly="readonly"  value="<? echo $reg['fecha_junta'];?>" id="junta">
		</td>
		<td width="15%" align="right">Resulucion : </td>
		<td width="10%"><input size="30"  style="text-align:center;background:rgb(250,250,250);" type="text" id="resolucion" value="<? echo $reg['resolucion'];?>"></td> 
		<td width="5%"></td>
	</tr>

		</tr>
		<tr height="50px">
		<td width="10%" align="right"> Pago:</td>
		<td width="10%">
			<input size="30" type="text" style="text-align:center;background:rgb(250,250,250);"  value="<? echo $reg['pago'];?>" id="pago">
		</td>
		<td width="15%" align="right"> </td>
		<td width="10%" align="center"><div id="guardar" class="boton">Guardar</div> </td> 
		<td width="5%"></td>
	</tr>
	</tr>

		</tr>
		<tr height="50px">
		<td colspan="5" width="100%" align="center"> 
			<span onclick="comentarios(<? echo $reg['id_demanda'];?>);" style="color:blue;cursor:pointer;margin:auto 5px;">Ver todo el historial de comentarios</span> 
		</td>
 
	</tr>



</table>
<?
if($r==1){?>
<script type="text/javascript">
function recargar(){
	$('#tabla_datos').hide(200,function(){
		$('#tabla_datos').empty();
	});
	$.ajax({
		url : 'control.buscar_resultado.php',
		type : 'POST',
		cache : false ,
		data : 'no_nomina=<?echo $no_nomina;?>&demandado=' + $('#demandado').val() ,
		beforeSend : function(){
			$('#tabla_datos').html('<br><br><br> Cargando..');
		},
		success : function(data){
			$('#tabla_datos').show(200,function(){
				$('#tabla_datos').html(data);
			});			
		}
	})
}
	
	$('#guardar').click(function(){
		$('#aviso').slideDown(500).delay(800);
		$.ajax({
			url : 'control.actualizando.inc.php',
			type : 'POST',
			cache : false ,
			data : "id=" + $('#id').val() + "&expedientedos=" + $('#expedientedos').val() + "&abogado_asignado=" + $('#abogado_asignado').val() + "&proceso=" + $('#proceso').val()  + "&resolucion=" + $('#resolucion').val() + "&pago=" + $('#pago').val() ,
			beforeSend : function(){
				$('#aviso').html('<div>Guardando..</div>');
			},
			success : function(data){
				$('#aviso').html('<div>Guardado Correctamente</div>').delay(500);	
				
			}
		})

	});




	$('#close').click(function(){
				$('#tabla_datos').empty();
			$('#tabla_datos').load('control.demandas_tabla.inc.php',function(data){
					$('#tabla_datos').html(data);
			});
		})

function comentarios(numero){
	$('body').append("<div align='center' id='coment'></div>")
	$.ajax({
		url : 'control.comentarios.php',
		type : 'POST',
		cache : false ,
		data : 'n=4&id=' + numero ,
		beforeSend : function(){
			$('#coment').html('<br><br><br> Cargando..');
		},
		success : function(data){
			$('#coment').show(200,function(){
				$('#coment').html(data);
			});			
		}
	})

}
</script>
<?


/*

Esta parte es la que viene de la busqueda si viene del formulario de busqueda entonces este script se ejecuta

*/
}elseif($r==2){?>

<script type="text/javascript">
function recargar(){
	$('#tabla_datos').hide(200,function(){
		$('#tabla_datos').empty();
	});
	$.ajax({
		url : 'control.buscar_resultado.php',
		type : 'POST',
		cache : false ,
		data : 'no_nomina=<?echo $no_nomina;?>&demandado=' + $('#demandado').val() ,
		beforeSend : function(){
			$('#tabla_datos').html('<br><br><br> Cargando..');
		},
		success : function(data){
			$('#tabla_datos').show(200,function(){
				$('#tabla_datos').html(data);
			});			
		}
	})
}
	
	$('#guardar').click(function(){
		$('#aviso').slideDown(500).delay(800);
		$.ajax({
			url : 'control.actualizando.inc.php',
			type : 'POST',
			cache : false ,
			data : "id=" + $('#id').val() + "&expedientedos=" + $('#expedientedos').val() + "&abogado_asignado=" + $('#abogado_asignado').val() + "&proceso=" + $('#proceso').val()  + "&resolucion=" + $('#resolucion').val() + "&pago=" + $('#pago').val() ,
			beforeSend : function(){
				$('#aviso').html('<div>Guardando..</div>');
			},
			success : function(data){
			$('#aviso').html('<div>Guardado Correctamente</div>').delay(500);
				
			}
		})

	});




	$('#close').click(function(){
				$('#tabla_info').empty();
				$('#expediente').focus();
		})

function comentarios(numero){
	$('body').append("<div align='center' id='coment'></div>")
	$.ajax({
		url : 'control.comentarios.php',
		type : 'POST',
		cache : false ,
		data : 'n=4&id=' + numero ,
		beforeSend : function(){
			$('#coment').html('<br><br><br> Cargando..');
		},
		success : function(data){
			$('#coment').show(200,function(){
				$('#coment').html(data);
			});			
		}
	})

}
</script>

<?}?>

</div>
<?
	}
}
?>