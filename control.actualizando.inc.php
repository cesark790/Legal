<?
include("conexion.php");
include("top.php");
session_start();
$ab=$_SESSION['id_usuario'];
echo $_POST['expediente'];
if($abogado_asignado==""){
	$abogado_asignado="";
	$fecha_asignacion=="";
	$abogadoci="";
}else{
	$abogado_asignado=", id_abogado_asignado = '$abogado_asignado' ";
	$fecha_asignacion=", fecha_asignacion = CURRENT_TIMESTAMP";
	$abogadoci=", id_abogado_ci='$ab' ";

}

if($proceso==2){
	$fecha_cierre = ", fecha_cierre = CURRENT_TIMESTAMP , id_estatus_proceso = '$proceso'";
}else{
	$fecha_cierre =" ";
}

$abogado_ci = $_SESSION['id_usuario'];
mysql_query("UPDATE  legal_principal SET expediente = '$expedientedos'  , resolucion = '$resolucion' , pago = '$pago' $fecha_cierre $fecha_asignacion $abogado_asignado $abogadoci WHERE id_demanda = '$id' ");
echo "UPDATE  legal_principal SET expediente = '$expedientedos'  , resolucion = '$resolucion' , pago = '$pago' $fecha_cierre $fecha_asignacion $abogado_asignado $abogadoci WHERE id_demanda = '$id' ";
?>