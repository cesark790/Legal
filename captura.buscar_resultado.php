<?
error_reporting(0);
include("conexion.php");
include("top.php");
$sql_datos = mysql_query("SELECT id_demanda, no_nomina, fecha_inicio, fecha_cierre, abogado_externo,  abogado_ci, fecha_asignacion, id_empresa, empresa, gerente, proceso, actor, demandado, expediente,  fecha_junta, comentarios, estado, entidad, observacion, resolucion FROM vista_legal_principal WHERE id_demandado = '$demandado' and  no_nomina = '$no_nomina' or expediente = '$expediente'");
$num=mysql_num_rows($sql_datos);
if ($num == "0") {
	echo "<br><br><br><div style='height:120px; valign='bottom'>No se encontro el registro buscado.</div>";
}else{
while ($reg=mysql_fetch_array($sql_datos)) {
?>
<div style="background:white;margin:40px auto; border:1px solid #ccc; width=auto;">
<table align="center" width="100%">
	<tr>
		<th colspan="5"> REGISTRO ENCONTRADO</th>
	</tr>
	<tr height="50px">
		<td width="10%" align="right"> ID del Sistema:</td>
		<td align="left" width="10%">
			<input size="30"  style="text-align:center;" type="text" value="<? echo $reg['id_demanda'];?>" readonly="readonly">
		</td>
		<td width="15%" align="right">No. Nomina: </td>
		<td width="10%">
			<input size="30" style="text-align:center;" type="text" readonly="readonly" value="<? echo $reg['no_nomina'];?>"></td> 
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
		<td width="10%"><input size="30"  style="text-align:center;" type="text" readonly="readonly" value="<? echo $reg['expediente'];?>"></td> 
		<td width="5%"></td>
	</tr>
		<tr height="50px">
		<td width="10%" align="right"> Fecha de apertura:</td>
		<td width="10%">
			<input size="30" type="text" style="text-align:center;"  value="<? echo convierte_f($reg['fecha_inicio']);?>" readonly="readonly">
		</td>
		<td width="15%" align="right">Fecha de Cierrre : </td>
		<td width="10%"><input size="30"  style="text-align:center;" type="text" readonly="readonly" value="<? echo comprobar_f($reg['fecha_cierre']);?>"></td> 
		<td width="5%"></td>
	</tr>
		<tr height="50px">
		<td width="10%" align="right"> Abogado de CI:</td>
		<td width="10%">
			<input size="30" type="text" style="text-align:center;"  value="<? echo $reg['abogado_ci'];?>" readonly="readonly">
		</td>
		<td width="15%" align="right">Abogado Asignado : </td>
		<td width="10%"><input size="30"  style="text-align:center;" type="text" readonly="readonly" value="<? echo $reg['abogado_externo'];?>"></td> 
		<td width="5%"></td>
	</tr>
		<tr height="50px">
		<td width="10%" align="right"> Gerente:</td>
		<td width="10%">
			<input size="30" type="text" style="text-align:center;"  value="<? echo $reg['gerente'];?>" readonly="readonly">
		</td>
		<td width="15%" align="right">Proceso : </td>
		<td width="10%"><input size="30"  style="text-align:center;" type="text" readonly="readonly" value="<? echo $reg['proceso'];?>"></td> 
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
			<input size="30" type="text" style="text-align:center;"  value="<? echo $reg['fecha_junta'];?>" readonly="readonly">
		</td>
		<td width="15%" align="right">Resulucion : </td>
		<td width="10%"><input size="30"  style="text-align:center;" type="text" readonly="readonly" value="<? echo $reg['resulucion'];?>"></td> 
		<td width="5%"></td>
	</tr>

		</tr>
		<tr height="50px">
		<td width="10%" align="right"> Pago:</td>
		<td width="10%">
			<input size="30" type="text" style="text-align:center;"  value="<? echo $reg['pago'];?>" readonly="readonly">
		</td>
		<td width="15%" align="right"> </td>
		<td width="10%"></td> 
		<td width="5%"></td>
	</tr>
	</tr>

		</tr>
		<tr height="50px">
		<td colspan="5" width="100%" align="center"> Ultima Observacion :
			<textarea cols="50" readonly="readonly"><? echo $reg['observacion'];?></textarea>
			<span onclick="comentarios(<? echo $reg['id_demanda'];?>);" style="color:blue;cursor:pointer;margin:auto 5px;">Ver Mas</span> 
		</td>
 
	</tr>



</table>
<script type="text/javascript">
function comentarios(numero){
	$('body').append("<div align='center' id='coment'></div>")
	$.ajax({
		url : 'captura.comentarios.php',
		type : 'POST',
		cache : false ,
		data : 'n=1&id=' + numero ,
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
</div>
<?
	}
}
?>