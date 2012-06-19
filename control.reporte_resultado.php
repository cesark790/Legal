<?
error_reporting(0);
include("conexion.php");
include("top.php");
$fechauno=fecha_inicio($fecha_uno);
$fechados=fecha_final($fecha_dos);

/* Formamos la setencia SQL comprobando cada uno de los elementos quer recibimos*/
if($abogado_ci==""){
	$abogadoci="";
}else{
	$abogadoci="id_abogado_ci = '$abogado_ci' ";
}
if($abogado_externo==""){
	$abogadoexterno = "";
}elseif($abogadoci==""){
	$abogadoexterno = "id_abogado_asignado = '$abogado_externo' ";
}else{
	$abogadoexterno = " and id_abogado_asignado = '$abogado_externo' ";
}

if($estatus==""){
	$status="";
}elseif($abogado_ci == "" and $abogado_externo ==""){
	$status=" id_estatus_proceso = '$estatus' ";
}else{
	$status=" and id_estatus_proceso = '$estatus' ";

}
if ($fecha_uno=="") {
	$fecha="";
}elseif($abogado_ci == "" and $abogado_externo =="" and $estatus==""){
	$fecha = "fecha_inicio BETWEEN '$fechauno' and '$fechados' ";
}else{
	$fecha = " and fecha_inicio BETWEEN '$fechauno' and '$fechados' ";
}

if ($estado=="") {
	$state="";
}elseif($abogado_ci == "" and $abogado_externo =="" and $estatus=="" and $fecha_uno==""){
	$state = "id_estado = '$estado' ";
}else{
	$state = " and id_estado = '$estado' ";
}
if ($empresa=="") {
	$emp="";
}elseif($abogado_ci == "" and $abogado_externo =="" and $estatus=="" and $fecha_uno=="" and $estado==""){
	$emp = "id_demandado = '$empresa' ";
}else{
	$emp = " and id_demandado = '$empresa' ";
}


if($abogado_ci == "" and $abogado_externo =="" and $estatus=="" and $fecha_uno=="" and $estado=="" and $empresa=="" ){
	$condicion = "";
}else{
	$condicion = " WHERE ";
}

$sql="SELECT id_demanda, no_nomina, fecha_inicio, fecha_cierre,abogado_externo,abogado_ci, empresa, gerente, proceso, actor, demandado, expediente,estado, entidad, observacion, resolucion, pago, id_ultimo_gasto, monto, saldo FROM vista_legal_principal";

$datos=mysql_query($sql.$condicion.$abogadoci.$abogadoexterno.$status.$fecha.$state.$emp);

?>
<link rel="stylesheet" type="text/css" href="css/nueva.css">
<div style="width:99%; height:98%; border:4px solid; border-color:rgb(251,228,59);border-radius:15px;">
	<table width="100%" border="0" cellpading="0" cellspacing="0">
		<tr>
			<td align="right" colspan="3">
				<img style="cursor:pointer; margin:5px 5px;" width="20" height="20" src="img/cerrar.jpg" id="cerrar" align="right"></td>
		</tr>
	</table>
<table align="center" width="100%" boder="1" cellspacing="0">
	<tr>	
		<td width="300px">
			<table align="center" width="100%" cellspacing="0" style="border:1px solid;">
			<tr>
				<th>GASTOS</th>
			</tr>
			<tr align="left">
				<td align="right">TOTAL:</td>
			</tr>
			<tr>
				<th>DEMANAS</th>
			</tr>
			<td align="left">
				Abiertas
			</td>
			<tr>
			<td align="left">
				Cerradas
			</td>
			</tr>
			</table>

		</td>
		<td valign="top">
		<table width="800px" style="border:1px solid;" align="center">
			<tr height="50px">
				<th>REPORTE DE DEMANDAS</th>
			</tr>
		</table>
		</td>
	</tr>
</table>
<script type="text/javascript">
	$('#cerrar').click(function(){
		$('#abogado_ci').val("");
		$('#abogado_externo').val("");
		$('#estatus').val("");
		$('#fecha_uno').val("");
		$('#fecha_dos').val("");
		$('#estado').val("");
		$('#empresa').val("");
		$('#coment').remove();
	})
	
</script>