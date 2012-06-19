<?
include('conexion.php');
error_reporting(0);
$estado=$_POST['id_estado'];
$sql_entidades=mysql_query("SELECT id_estado,id_entidad,entidad FROM legal_entidad WHERE id_estado = '$estado'");
while($reg=mysql_fetch_array($sql_entidades)){
	?>
	<option value="<? echo $reg['id_entidad'];?>"><? echo $reg['entidad'];?></option>
	<?
}
?>