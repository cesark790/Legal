<?
error_reporting(0);
$id=$_POST['id'];
$empresa=$_POST['empresa'];
if ($empresa==1) {
	$base="credenciales";
}else{
	$base="recremex";
}
$conexion = odbc_connect ($base, "", ""); 
$sql= odbc_exec($conexion,"SELECT NOMBRE,APATERNO,AMATERNO FROM principal WHERE NONOMINA = $id ");
$reg=odbc_fetch_array($sql);


if($reg['NOMBRE']!=""){
?>
	<strong>Actor:</strong>

			<input style="margin:5px 15px;" value="<?echo $reg['APATERNO'].' '.$reg['AMATERNO'].' '.$reg['NOMBRE']; ?>" name="actor" id="actor_dos" size="40" readonly>
		</td>
		<script type="text/javascript">
		var actor = $('#actor_dos').val();
		</script>
		<?
	}
	else{
		?>

		<td colspan="5">No se encontro el numero de nomina <? echo $n;?> </td>

			<?
	}
