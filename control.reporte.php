<?
include("conexion.php");
$sql_aboci=mysql_query("SELECT idadm_tbl_user, concat(nombre,' ', ap_pat_) as nombre FROM legal_user WHERE tipo_usuario = '2'");
$sql_aboext=mysql_query("SELECT idadm_tbl_user, concat(nombre,' ', ap_pat_) as nombre FROM legal_user WHERE tipo_usuario = '3'");
$sql_estatus=mysql_query("SELECT id_proceso,proceso FROM legal_estatus_proceso");
$sql_estados=mysql_query("SELECT id_estado,estado FROM legal_estados");
$sql_empresa=mysql_query("SELECT id_demandado,empresa FROM legal_demandado")
?>
<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sunny/jquery-ui-1.8.17.custom.css">
<div style="border:2px solid black;">
	<link rel="stylesheet" type="text/css" href="css/nueva.css">
<table width="80%" border="0" cellspacing="0">
	<tr height="20">
		<td></td>
	</tr>
	<tr height="30" class="title"	>
		<th colspan="5" class="title" align="center"> Selecciona los parametros de busqueda</th>
	</tr>
	<tr height="50">
		<td width="20%"></td>
		<td align="right" width="20%">Abogado Ci :</td>
		<td width="20%">
			<select class="sin_borde" style="width:150px" id="abogado_ci">
				<option value=""></option>
				<?
				while ($res=mysql_fetch_array($sql_aboci)) {?>
					<option value="<? echo $res['idadm_tbl_user'];?>"><? echo $res['nombre'];?></option>
				<?}
				?>
			</select>
		</td>
		<td width="40%"></td>
	</tr>
	<tr height="50">
		<td width="20%"></td>
		<td align="right" width="20%">Abogado Externo :</td>
		<td width="20%">
			<select class="sin_borde" style="width:150px" id="abogado_externo">
				<option value=""></option>
				<?
				while ($res=mysql_fetch_array($sql_aboext)) {?>
					<option value="<? echo $res['idadm_tbl_user'];?>"><? echo $res['nombre'];?></option>
				<?}
				?>
			</select>
		</td>
		<td width="40%"></td>
	</tr>
	<tr height="50">
		<td width="20%"></td>
		<td align="right" width="20%">Estatus  :</td>
		<td width="20%">
			<select class="sin_borde" style="width:150px;" id="estatus">
				<option value=""></option>
				<?
				while ($res=mysql_fetch_array($sql_estatus)) {?>
					<option value="<? echo $res['id_proceso'];?>"><? echo $res['proceso'];?></option>
				<?}
				?>
			</select>
		</td>
		<td width="40%"></td>
	</tr>
	<tr height="50">
		<td width="20%"></td>
		<td align="right" width="20%">Fecha:</td>
		<td align="left" colspan="2" width="20%">
			<input style="text-align:center;" type="text" id="fecha_uno"> a
			<input style="text-align:center;" id="fecha_dos">
		</td>
	
	</tr>
	<tr height="50">
		<td width="20%"></td>
		<td align="right" width="20%">Estado  :</td>
		<td width="20%">
			<select class="sin_borde" style="width:150px;" id="estado">
				<option value=""></option>
				<?
				while ($res=mysql_fetch_array($sql_estados)) {?>
					<option value="<? echo $res['id_estado'];?>"><? echo $res['estado'];?></option>
				<?}
				?>
			</select>
		</td>
		<td width="40%"></td>
	</tr>
	<tr height="50">
		<td width="20%"></td>
		<td align="right" width="20%">Empresa  :</td>
		<td width="20%">
			<select class="sin_borde" style="width:150px;" id="empresa">
				<option value=""></option>
				<?
				while ($res=mysql_fetch_array($sql_empresa)) {?>
					<option value="<? echo $res['id_demandado'];?>"><? echo $res['empresa'];?></option>
				<?}
				?>
			</select>
		</td>
		<td width="40%"></td>
	</tr>
	<tr>
		<td colspan="5" align="center">
			<div id="guardar" class="boton"> Generar </div>
		</td>
	</tr>
</table>
</div>
<script type="text/javascript">
	$(function() {
		$( "#fecha_uno" ).datepicker();
		$( "#fecha_dos" ).datepicker();
	});

	$('#guardar').click(function(){
		$('body').append("<div id='coment'></div>");
		$.ajax({
			url : 'control.reporte_resultado.php',
			cache : false,
			type : 'POST',
			data : "abogado_ci=" + $('#abogado_ci') .val() + "&abogado_externo=" + $('#abogado_externo').val() + "&estatus=" + $('#estatus').val() + "&fecha_uno=" + $('#fecha_uno').val() + "&fecha_dos=" + $('#fecha_dos').val() + "&estado=" + $('#estado').val() + "&empresa=" + $('#empresa').val() ,
			beforeSend : function() {
				x=0;
				$('#coment').html('<p>Cargando..</p>');
				while(x<=10){
				$('p').fadeOut(650);
				$('p').fadeIn(650);
				x++;
				}
			},
			success : function(data){
				$('#coment').html(data);
			}
		})

	})

</script>