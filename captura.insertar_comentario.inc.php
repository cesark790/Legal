<?error_reporting(0);
include("top.php");
include("conexion.php");
$id=$_POST['id'];
session_start();
$id_usuario = $_SESSION['id_usuario'];
$user=$_SESSION['usuario'];
$observacion=$_POST['observacion'];
if($c==1){
$p=explode(" ", $fecha_evento);
$fe=explode("/", $p[0]);
$fecha_evento=$fe[2].'-'.$fe[0].'-'.$fe[1].' '.$p[1].':00';

mysql_query("INSERT INTO legal_observaciones(id_demanda,observacion,capturo,fecha_evento,evento,id_usuario) VALUES ('$id','$observacion','$user','$fecha_evento','$evento','$id_usuario')");

$ultima=mysql_insert_id();
mysql_query("UPDATE legal_principal SET id_ultima_observacion ='$ultima' WHERE id_demanda = '$id' ");
}else{
mysql_query("INSERT INTO legal_observaciones(id_demanda,observacion,capturo,id_usuario) VALUES ('$id','$observacion','$user','$id_usuario')");
$ultima=mysql_insert_id();
mysql_query("UPDATE legal_principal SET id_ultima_observacion ='$ultima' WHERE id_demanda = '$id' ");

}
?>