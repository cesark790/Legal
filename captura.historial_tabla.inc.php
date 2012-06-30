<link rel="stylesheet" type="text/css" href="css/nueva.css">
<script type="text/javascript" src="tabla/tablefilter_compressed.js"></script>
<link rel="stylesheet" type="text/css" href="tabla/filtergrid.css">
<?
/*
 -----ID ESTATUS----
 1=Alta ---Si aparece en la lista ---
 0=Baja ---No aparece en la lista ---

 ------FILTRO------
 1=Activo
 2=Terminado
*/
 error_reporting(0);
include('conexion.php');
include('top.php');
if(!(isset($filtro))){
	$filtro="1";
}
$sql_datos=mysql_query("SELECT id_demanda,id_demandado,no_nomina, fecha_inicio, fecha_cierre, abogado_externo, abogado_ci,id_ultima_observacion, empresa, gerente,proceso, actor, demandado, expediente, id_estado, estado, id_entidad, entidad, observacion, resolucion, pago FROM vista_legal_principal WHERE id_estatus = '1' and id_estatus_proceso = '$filtro'  ORDER BY id_demanda DESC LIMIT 0,10");

if($filtro==1){
?>
<style type="text/css">


</style>
<table id="tabla" class="letra" align="center" width="100%" cellspacing="0" border="1" align="center" >
	<tr>
		<th class="th" width="10%">Fecha de apertura</th>
		<th class="th" width="5%">No. Nomina</th>
		<th class="th" width="20%">Actor</th>
		<th class="th" width="15%">Demandado</th>
		<th class="th" width="10%">Abogado</th>
		<th class="th" width="25%">Observaciones</th>
		<th class="th" width="10%">Opciones</th>
	</tr>
	<?
	while($reg=mysql_fetch_array($sql_datos)){
		?>
		<tr height="10px" align="center">
			<td><? echo $reg['fecha_inicio']; ?></td>
			<td><? echo $reg['no_nomina']; ?></td>
			<td><? echo utf8_encode($reg['actor']); ?></td>
			<td><? echo utf8_encode($reg['demandado']); ?></td>
			<td><? echo utf8_encode($reg['abogado_ci']); ?></td>
			<td style="cursor:pointer;" onclick="comentarios(<?echo $reg['id_demanda']; ?>)"><? echo utf8_encode(recortar($reg['observacion'])); ?></td>
			<td>
				<img onclick="ver(<?echo $reg['id_demanda']; ?>,<?echo $reg['id_demandado']; ?>)" align="center" style="cursor:pointer;" alt="Ver" src="img/ver.png" width="25" height="25"></td>
		</tr>
		<?
	}
	?>
</table>

<?
}
else{
	?>
	<style type="text/css">
	.letra{
	font-size:12px;
}
.th{	
	color:black;
	background:rgb(230,255,80);
}

</style>
	<table id="tabla" class="letra" align="center" width="100%" cellspacing="0" border="1" align="center" >
	<tr>
		<th class="th" width="10%">Fecha de Cierre</th>
		<th class="th" width="5%">No. Nomina</th>
		<th class="th" width="20%">Actor</th>
		<th class="th" width="15%">Demandado</th>
		<th class="th" width="10%">Abogado</th>
		<th class="th" width="25%">Observaciones</th>
		<th class="th" width="10%">Opciones</th>
	</tr>
	<?
	while($reg=mysql_fetch_array($sql_datos)){
		?>
		<tr height="10px" align="center">
			<td><? echo $reg['fecha_inicio']; ?></td>
			<td><? echo $reg['no_nomina']; ?></td>
			<td><? echo utf8_encode($reg['actor']); ?></td>
			<td><? echo utf8_encode($reg['demandado']); ?></td>
			<td><? echo utf8_encode($reg['abogado_ci']); ?></td>
			<td style="cursor:pointer;" onclick="comentarios(<?echo $reg['id_demanda']; ?>)"><? echo utf8_encode(recortar($reg['observacion'])); ?></td>
			<td>
				<img onclick="ver(<?echo $reg['id_demanda']; ?>,<?echo $reg['id_demandado']; ?>)" align="center" style="cursor:pointer;" alt="Ver" src="img/ver.png" width="25" height="25"></td>
		</tr>
		<?
	}
	?>
</table>


	<?
}

?>
<script type="text/javascript">
var props = {
		popup_filters: true,
		mark_active_columns: true,
		filters_row_index:1,
		remember_grid_values: false,
		remember_page_number: false,
		alternate_rows: true,
		rows_counter: true,
		btn_reset: true,
		btn_reset_text: "Mostrar todo",
		loader: true,		 
        loader_html: '<h4 style="color:red;">Cargando, por favor espere...</h4>',
		status_bar: true,
		col_number_format: [null,null,'US','US','US','US','US','US','US'],
	
		col_4: "select",
		col_5: "none",
		col_6: "none",
		col_2:"select",
		//col_width: ["40px","120px","120px","120px","40px","120px","120px","120px","120px"],
		paging: true,
		paging_length: 20,		
		//Grid layout properties
		selectable: true,
		grid_layout: false,
		grid_width: '80%',
		grid_height: '50%',
		
		/*** Extensions manager ***/
		
		btn_showHide_cols_text: 'Columns?'
	}
	setFilterGrid("tabla",props);

</script>