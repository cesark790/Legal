<?
error_reporting(0);
include("conexion.php");
include('top.php');
session_start();
$id_usuario = $_SESSION['id_usuario'];
$sql_datos=mysql_query("SELECT id_demanda,id_demandado,no_nomina, fecha_inicio, fecha_cierre, abogado_externo, abogado_ci,id_ultima_observacion, empresa, gerente,proceso, actor, demandados, expediente, id_estado, estado, id_entidad, entidad, observacion, resolucion, pago, junta FROM vista_legal_principal WHERE id_estatus = '1' and id_estatus_proceso = '2' and id_abogado_asignado = '$id_usuario'  ORDER BY fecha_inicio DESC ");


?>


<table style="background:white;" id="tabla_cerradas" class="letra" align="center" width="80%" cellspacing="0" border="1" align="center" >
	<tr>
		<th class="th" width="10%">Fecha de apertura</th>
		<th class="th" width="15%">Actor</th>
		<th class="th" width="15%">Demandado</th>
		<th class="th" width="10%">Abogado</th>
		<th class="th" width="20%">Junta</th>
		<th class="th" width="20%">Observaciones</th>
		<th class="th" width="10%">Opciones</th>
	</tr>
	<?
	while($reg=mysql_fetch_array($sql_datos)){
		?>
		<tr height="10px" align="center">
			<td><? echo utf8_encode($reg['fecha_inicio']); ?></td>
			<td><? echo utf8_encode($reg['actor']); ?></td>
			<td title="<? echo $reg['demandados'];?>"><? echo recortar(utf8_encode($reg['demandados'])); ?></td>
			<td><? echo utf8_encode($reg['abogado_ci']); ?></td>
			<td><? echo utf8_encode(recortar($reg['junta'])); ?></td>
			<td title="<? echo utf8_encode($reg['observacion']);?>" style="cursor:pointer;" onclick="comentarios(<?echo $reg['id_demanda']; ?>)"><? echo utf8_encode(recortar($reg['observacion'])); ?></td>
			<td>
				<img onclick="ver(<?echo $reg['id_demanda']; ?>,<?echo $reg['id_demandado']; ?>)" align="center" style="cursor:pointer;" alt="Ver" title="Mas informacion" src="img/ver.png" width="25" height="25">
				<img onclick="gasto(<?echo $reg['id_demanda']; ?>)" align="center" style="cursor:pointer;" alt="Agregar Gasto" title="Ver total de gastos" src="img/gasto.png" width="25" height="25">
			</td>
		</tr>
		<?
	}
	?>
</table>

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
	setFilterGrid("tabla_cerradas",props);

</script>