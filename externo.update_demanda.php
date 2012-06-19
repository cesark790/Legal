<?
error_reporting(0);
include("conexion.php");
include("top.php");
if($proceso==2){
	$fecha_cierre= ', id_estatus_proceso = "2" , fecha_cierre = CURRENT_TIMESTAMP';
}else{
	$fecha_cierre = '';
}
mysql_query("UPDATE legal_principal SET resolucion = '$resolucion' , pago = '$pago' $fecha_cierre WHERE id_demanda = '$id_demanda'");
?>
